<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
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
        'is_admin' => 'boolean',
    ];

    // This is overridden so the response isn't slowed down.
    public function sendPasswordResetNotification($token): void
    {
        dispatch(fn () => $this->notify(new ResetPasswordNotification($token)))->afterResponse();
    }

    public function setCheckCountForGroupAndDate($group, $date, $count)
    {
        $newCount = max(0, min((int) $count, $group->per_day));

        // One statement, so two tabs ticking the first box of a day can't both insert the row
        DB::table('group_user')->upsert(
            ['group_id' => $group->id, 'user_id' => $this->id, 'recorded_at' => $date, 'checked' => $newCount, 'created_at' => now(), 'updated_at' => now()],
            ['group_id', 'user_id', 'recorded_at'],
            ['checked', 'updated_at'],
        );

        return $newCount;
    }

    public function getCheckCountForGroupAndDate($group, $date): int
    {
        $pivot = $this->groups()
            ->wherePivot('recorded_at', $date)
            ->wherePivot('group_id', $group->id)
            ->first();

        return $pivot?->pivot?->checked ?? 0;
    }

    // The ticks: one row per food per day, with how many servings were ticked. The foods on the dashboard are currentGroups().
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class)->withPivot(
            'checked',
            'recorded_at',
        );
    }

    /**
     * Today in the user's own timezone, or UTC until their browser has sent it.
     */
    public function today(): Carbon
    {
        return Carbon::today($this->timezone ?? config('app.timezone'));
    }

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

    // The foods the user tracks, shown on the dashboard. They get their own table because a flag
    // on group_user would be repeated on every day's row, and that table holds thousands of rows.
    public function currentGroups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'use_tracker');
    }

    public function unselectAllGroups(): void
    {
        $this->currentGroups()->detach($this->currentGroups()->pluck('id'));
    }

    public function selectAllGroups(): void
    {
        $this->currentGroups()->attach($this->notSelectedGroups()->pluck('id'));
    }

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
        return (bool) $this->is_admin;
    }
}
