<?php

namespace Tests\Feature;

use App\Livewire\DeleteUserForm;
use App\Livewire\UpdateProfileInformationForm;
use App\Mail\ContactFormEmail;
use App\Models\ContactTicket;
use App\Notifications\EmailChanged;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Laravel\Jetstream\Http\Livewire\UpdatePasswordForm;
use Livewire\Livewire;
use Tests\TestCase;

class SecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_uploads_are_refused_before_anything_is_stored(): void
    {
        Storage::fake(config('filesystems.default'));
        $this->actingAs($this->makeUser());
        $url = URL::temporarySignedRoute('livewire.upload-file', now()->addMinutes(5), absolute: false);

        $this->postJson($url, ['files' => [UploadedFile::fake()->create('photo.png', 100, 'image/png'), UploadedFile::fake()->create('big.bin', 5000)]])
            ->assertUnprocessable();

        $this->assertSame([], Storage::disk(config('filesystems.default'))->allFiles());
    }

    public function test_changing_email_needs_the_current_password_and_tells_the_old_address(): void
    {
        Notification::fake();
        $user = $this->makeUser('old@example.com');
        $this->actingAs($user);

        Livewire::test(UpdateProfileInformationForm::class)
            ->set('state.email', 'new@example.com')
            ->call('updateProfileInformation')
            ->assertHasErrors('current_password');
        $this->assertSame('old@example.com', $user->fresh()->email);

        Livewire::test(UpdateProfileInformationForm::class)
            ->set('state.email', 'new@example.com')
            ->set('state.current_password', 'password')
            ->call('updateProfileInformation')
            ->assertHasNoErrors()
            ->assertSet('state.current_password', '');
        $this->app->terminate();

        $this->assertSame('new@example.com', $user->fresh()->email);
        Notification::assertSentOnDemand(EmailChanged::class, fn ($notification, $channels, $notifiable) => $notifiable->routes['mail'] === 'old@example.com');
    }

    public function test_a_new_name_alone_needs_no_password(): void
    {
        $user = $this->makeUser();
        $this->actingAs($user);

        Livewire::test(UpdateProfileInformationForm::class)
            ->set('state.name', 'Ada')
            ->call('updateProfileInformation')
            ->assertHasNoErrors();

        $this->assertSame('Ada', $user->fresh()->name);
    }

    public function test_password_guesses_are_limited_once_signed_in(): void
    {
        $user = $this->makeUser();
        $this->actingAs($user);

        for ($i = 0; $i < 5; $i++) {
            Livewire::test(DeleteUserForm::class)->set('password', "wrong$i")->call('deleteUser')->assertHasErrors('password');
        }
        Livewire::test(DeleteUserForm::class)->set('password', 'password')->call('deleteUser')->assertHasErrors(['password' => __('passwords.throttled')]);
        Livewire::test(UpdatePasswordForm::class)
            ->set('state', ['current_password' => 'password', 'password' => 'a-new-long-password', 'password_confirmation' => 'a-new-long-password'])
            ->call('updatePassword')
            ->assertHasErrors('current_password');

        $this->assertModelExists($user);
        $this->assertTrue(password_verify('password', $user->fresh()->password));
    }

    public function test_confirming_a_password_is_limited(): void
    {
        $this->actingAs($this->makeUser());

        for ($i = 0; $i < 5; $i++) {
            $this->post('/user/confirm-password', ['password' => "wrong$i"])->assertSessionHasErrors();
        }

        $this->post('/user/confirm-password', ['password' => 'password'])->assertTooManyRequests();
    }
}
