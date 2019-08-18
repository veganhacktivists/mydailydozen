<?php

use App\Models\BackpackUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = BackpackUser::create([
            'name' => 'Admin User',
            'email' => 'admin@'.preg_replace('/https?:\/\//', '', config('app.url')),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $admin->assignRole('admin');

        factory(BackpackUser::class, 50)->create()->each(function ($user) {
            $user->assignRole('user');
        });
    }
}
