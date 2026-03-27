<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'matchbox:create-admin
                            {--name= : Admin name}
                            {--email= : Admin email}
                            {--password= : Admin password}';

    protected $description = 'Create an admin user for the Filament panel';

    public function handle(): int
    {
        $name = $this->option('name')
            ?: config('matchbox.admin.name')
            ?: $this->ask('Name');

        $email = $this->option('email')
            ?: config('matchbox.admin.email')
            ?: $this->ask('Email');

        $password = $this->option('password')
            ?: config('matchbox.admin.password')
            ?: $this->secret('Password');

        if (! $name || ! $email || ! $password) {
            $this->error('Name, email, and password are all required.');

            return self::FAILURE;
        }

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make($password),
                'is_admin' => true,
            ],
        );

        $this->info("Admin user {$user->email} ".($user->wasRecentlyCreated ? 'created' : 'updated').'.');

        return self::SUCCESS;
    }
}
