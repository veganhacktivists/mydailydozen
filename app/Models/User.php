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

    /**
     * Handle a check event on the dashboard.
     * @param Group $group
     * @param $checkStatus
     * @return bool
     */
    public function checkEvent(Group $group, $checkStatus)
    {
        $change = 0;
        if ($checkStatus && $group->times <= $group->per_day) {
            $change = $group->checked + 1;
        }
        else if ($group->times > 0) {
            $change = $group->checked - 1;
        }
        $didUpdate = $this->groups()->updateExistingPivot($group, [
            'checked' => $change,
            'recorded_at' => Carbon::today()
        ]);

        if (!$didUpdate) {
            $this->groups()->attach($group, [
                'checked' => $change,
                'recorded_at' => Carbon::today()
            ]);
        }
        return true;
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
}
