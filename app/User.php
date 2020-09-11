<?php

namespace App;

use App\Facades\Mailchimp;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use CrudTrait;
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'checked', 'recorded_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class)->withPivot('checked', 'recorded_at');
    }

    /**
     * Specify guard name, fixes seeder issue.
     *
     * @var string
     */
    protected $guard_name = 'web';

    public function isSubscribedToNewsletter()
    {
        return Mailchimp::isSubscribedToNewsletter($this->email);
    }

    public function subscribeToNewsletter()
    {
        Mailchimp::addToNewsletter($this->email);
    }

    public function updateSettings(Collection $fields)
    {
        $updateFields = $fields->only(['name', 'email']);
        $oldEmail = $this->email;
        $newEmail = $fields->get('email');
        $wantsToSubscribeToNewsletter = $fields->get('subscribe', false);

        $hasEmailChanged = $oldEmail !== $newEmail;
        $isAlreadySubscribedToNewsletter = $this->isSubscribedToNewsletter();

        $oldPassword = $fields->get('old_password', false);
        if ($oldPassword) {
            if ($this->isPasswordCorrect($oldPassword)) {
                $updateFields['password'] = Hash::make($fields->get('password'));
            } else {
                throw ValidationException::withMessages(['old_password' => __('Incorrect password')]);
            }
        }

        if ($hasEmailChanged) {
            $this->email_verified_at = null;
        }

        $this->update($updateFields->toArray());

        if ($hasEmailChanged) {
            $this->sendEmailVerificationNotification();
        }

        if ($wantsToSubscribeToNewsletter) {
            if ($isAlreadySubscribedToNewsletter) {
                if ($hasEmailChanged) {
                    Mailchimp::updateSubscriberEmail($oldEmail, $newEmail);
                }
            } else {
                $this->subscribeToNewsletter();
            }
        } else {
            if ($isAlreadySubscribedToNewsletter) {
                Mailchimp::removeFromNewsletter($oldEmail);
            }
        }
    }

    private function isPasswordCorrect(string $password)
    {
        return Hash::check($password, $this->password);
    }
}
