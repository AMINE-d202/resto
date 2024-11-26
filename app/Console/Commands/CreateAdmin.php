<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    protected $signature = 'admin:create';

    protected $description = 'Create an admin user';

    public function handle()
    {
        $name = $this->ask('Enter admin name');
        $email = $this->ask('Enter admin email');
        $password = $this->secret('Enter admin password');

        $admin = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'is_admin' => true, // Assuming your users table has an 'is_admin' column
        ]);

        $this->info('Admin user created successfully!');
    }
}
