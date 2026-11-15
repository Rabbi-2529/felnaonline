<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Create the first admin account.
     * Set ADMIN_EMAIL and ADMIN_PASSWORD in .env; if no password is set, a random one is generated and printed once.
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@example.com');
        $password = env('ADMIN_PASSWORD') ?: Str::password(16);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => $email,
            'password' => Hash::make($password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if (!env('ADMIN_PASSWORD') && $this->command) {
            $this->command->warn("Admin account {$email} created with password: {$password}");
            $this->command->warn('Save it now and change it after your first login.');
        }
    }
}
