<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;

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
 * @property-read Collection|Group[] $currentGroups
 * @property-read int|null $current_groups_count
 * @property-read string $profile_photo_url
 * @property-read Collection|Group[] $groups
 * @property-read int|null $groups_count
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereCurrentTeamId($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereProfilePhotoPath($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static Builder|User whereTwoFactorSecret($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
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
     * @param $group
     * @param $date
     * @return int|mixed
     */
    public function setCheckCountForGroupAndDate($group, $date, $count)
    {
        $currentCount = $this->getCheckCountForGroupAndDate($group, $date);
        if ($currentCount === null) {
            $this->groups()->attach($group, [
                'checked' => $count,
                'recorded_at' => $date
            ]);
            return 1;
        }

        $newCount = min($count, $group->per_day);
        if ($newCount !== $currentCount) {
            $this->groups()->wherePivot('recorded_at', $date)
                ->updateExistingPivot($group->id, [
                    'checked' => $newCount
                ]);
            return $newCount;
        }
        return $newCount;
    }

    /**
     * @param $group
     * @param $date
     * @return void
     */
    public function getCheckCountForGroupAndDate($group, $date)
    {
        $pivot = $this->groups()
            ->wherePivot('recorded_at', $date)
            ->wherePivot('group_id', $group->id)
            ->first();
        if ($pivot !== null) {
            return $pivot->pivot->checked;
        }
    }

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

    /**
     * @return int|mixed
     */
    public function totalCheckForToday()
    {
        return $this->totalCheckForDate(Carbon::today());
    }

    /**
     * @param $date
     * @return int|mixed
     */
    public function totalCheckForDate($date)
    {
        return $this->groups()
            ->wherePivot('recorded_at', $date)
            ->sum('checked');
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

    public function hasGroup(Group $group)
    {
        return $this->currentGroups->contains($group);
    }

    /**
     * The food groups that show up on the home page.
     * Has its own pivot table because we couldn't pollute the MySQL data storing checkmarks.
     * @return BelongsToMany
     */
    public function currentGroups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'use_tracker');
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
     * Food groups that don't show up on home page.
     * @return Group[]|Collection
     */
    public function notSelectedGroups()
    {
        return Group::all()
            ->whereNotIn('id', $this->currentGroups()->pluck('id'));
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
