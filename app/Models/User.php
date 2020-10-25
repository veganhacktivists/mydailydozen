<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property string|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Group[] $currentGroups
 * @property-read int|null $current_groups_count
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Group[] $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

    /**
     * The My Daily Dozen food groups.
     * @return BelongsToMany
     */
    public function groups(): BelongsToMany
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
        if ($pivot !== null) {
            return $pivot->pivot->checked;
        }
        return null;
    }

    public function incrementCheckCountForGroupAndDate($group, $date)
    {
        $currentCount = $this->getCheckCountForGroupAndDate($group, $date);
        if ($currentCount === null) {
            $this->groups()->attach($group, [
                'checked' => 1,
                'recorded_at' => $date
            ]);
            return 1;

        } else {
            $newCount = min($currentCount + 1, $group->per_day);
            if ($newCount != $currentCount) {
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

        if ($currentCount !== null) {
            $newCount = max($currentCount - 1, 0);
            if ($newCount != $currentCount) {
                $this->groups()->wherePivot('recorded_at', $date)->updateExistingPivot($group->id, [
                    'checked' => $newCount
                ]);
                return $newCount;

            }
            return $newCount;

        }
    }

    public function totalCheckForToday()
    {
        return $this->totalCheckForDate(Carbon::today());
    }

    public function totalCheckForDate($date)
    {
        $checks = $this->groups()->wherePivot('recorded_at', $date)->pluck('checked');
        return $checks->sum();
    }

    public function hasGroup(Group $group)
    {
        return $this->currentGroups()->pluck('id')->contains(function ($g) use ($group) {
            return $g == $group['id'];
        });

    }

    /**
     * @param Group $group
     */
    public function toggleGroup(Group $group)
    {
        if ($this->hasGroup($group)) {
            $this->currentGroups()->detach($group);
        } else {
            $this->currentGroups()->attach($group);
        }
    }

    /**
     * On toggle / user settings page, unselect every group.
     * @return void
     */
    public function unselectAllGroups(): void
    {
        $this->currentGroups()->detach($this->currentGroups()->pluck('id'));
    }

    /**
     * On toggle / user settings page, select every group.
     * @return void
     */
    public function selectAllGroups(): void
    {
        $this->currentGroups()->attach($this->notSelectedGroups()->pluck('id'));
    }

    /**
     * Used to determine whether the current user is allowed to edit groups
     * and access the admin interface.
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->email === env('ADMIN_EMAIL');
    }
}
