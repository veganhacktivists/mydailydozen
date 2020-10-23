<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class)->withPivot(
            'checked',
            'recorded_at',
        );
    }

    public function currentGroups()
    {
        return $this->belongsToMany(Group::class, 'use_tracker');
    }

    public function notSelectedGroups()
    {
      return Group::all()->whereNotIn('id', $this->currentGroups()->pluck('id'));
    }


    public function getCheckCountForGroupAndDate($group, $date)
    {
      $pivot = $this->groups()->wherePivot('recorded_at', $date)->wherePivot('group_id', $group->id)->first();
      if($pivot != null){
        return $pivot->pivot->checked;
      }
      return null;
    }

    public function incrementCheckCountForGroupAndDate($group, $date)
    {

      $currentCount = $this->getCheckCountForGroupAndDate($group, $date);
      if($currentCount === null)
      {
        $this->groups()->attach($group, [
          'checked' => 1,
          'recorded_at' => $date
        ]);
        return 1;
        
      }else
      {
        $newCount = min($currentCount + 1, $group->per_day);
        if($newCount != $currentCount){
          $this->groups()->wherePivot('recorded_at', $date)->updateExistingPivot($group->id, [
            'checked' => $newCount
          ]);
          return $newCount;
        }
        return $newCount;
        
      }
    }

    public function decrementCheckCountForGroupAndDate($group, $date)
    {
      $currentCount = $this->getCheckCountForGroupAndDate($group, $date);

      if($currentCount !== null)
      {
        $newCount = max($currentCount - 1, 0);
        if($newCount != $currentCount){
          $this->groups()->wherePivot('recorded_at', $date)->updateExistingPivot($group->id, [
            'checked' => $newCount
          ]);
          return $newCount;
          
        }
        return $newCount;
        
      }
    }

    public function hasGroup(Group $group)
    {
      return $this->currentGroups()->pluck('id')->contains(function($g) use ($group) {
        return $g == $group['id'];
      });

    }

    public function toggleGroup(Group $group)
    {
      if($this->hasGroup($group)){
        $this->currentGroups()->detach($group);
      }else{
        $this->currentGroups()->attach($group);
      }
    }

    public function unselectAllGroups()
    {
      $this->currentGroups()->detach($this->currentGroups()->pluck('id'));
    }

    public function selectAllGroups()
    {
      $this->currentGroups()->attach($this->notSelectedGroups()->pluck('id'));
    }

    /**
     * Used to determine whether the current user is allowed to edit groups
     * and access the admin interface.
     * @return bool
     */
    public function isAdmin()
    {
        return $this->email === env('ADMIN_EMAIL');
    }
}
