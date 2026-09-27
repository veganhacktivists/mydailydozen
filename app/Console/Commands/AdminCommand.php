<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AdminCommand extends Command
{
    protected $signature = 'user:admin {email} {--revoke}';

    protected $description = 'Let a user edit the food groups, or stop them';

    public function handle()
    {
        $user = User::whereRaw('lower(email) = ?', [strtolower($this->argument('email'))])->first();

        if ($user === null) {
            $this->error("No user has the email {$this->argument('email')}.");

            return self::FAILURE;
        }

        $user->forceFill(['is_admin' => ! $this->option('revoke')])->save();
        $this->info($user->is_admin ? "{$user->email} is now an admin." : "{$user->email} is no longer an admin.");

        return self::SUCCESS;
    }
}
