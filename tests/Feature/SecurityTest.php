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
}
