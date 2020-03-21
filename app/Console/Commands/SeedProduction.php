<?php

namespace App\Console\Commands;

use App\Models\BackpackUser;
use App\Role;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SeedProduction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:seed:prod';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the production database with records';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->seedRoles();
        $this->seedFirstUser();
        $this->seedCustomData();
    }

    private function seedRoles()
    {
        /*
         * Feel free to add your own additional roles, but
         * DO NOT change/remove the admin role. It is
         * required for the admin panel to work.
         */
        $roleNames = [
            'admin',
        ];

        $this->info('Creating roles:');
        foreach ($roleNames as $roleName) {
            Role::create(['name' => $roleName]);
            $this->line("* `$roleName` role created");
        }
    }

    private function seedFirstUser()
    {
        $this->info('Creating the initial admin user!');

        $name = $this->ask('Name', 'Admin User');

        $defaultEmail = 'admin@'.preg_replace('/https?:\/\//', '', config('app.url'));
        do {
            $email = $this->ask('Email', $defaultEmail);
        } while (!filter_var($email, FILTER_VALIDATE_EMAIL));

        do {
            $password = $this->secret('Password');
        } while (!$password);

        $user = (new BackpackUser())->fill([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $user->email_verified_at = time();

        try {
            DB::transaction(function () use ($user) {
                $user->save();
                $user->assignRole('admin');
            });

            $this->info('User successfully created');
        } catch (QueryException $e) {
            $this->error($e->getMessage());
            $this->seedFirstUser();
        }
    }

    private function seedCustomData()
    {
        $this->info('No custom data seeded');
    }
}
