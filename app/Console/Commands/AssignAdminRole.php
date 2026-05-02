<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class AssignAdminRole extends Command
{
    protected $signature = 'user:admin';

    protected $description = 'Assign admin role to first user';

    public function handle()
    {
        $user = User::first();

        if (!$user) {
            $this->error('User not found');
            return;
        }

        $user->assignRole('admin');

        $this->info('Admin role assigned: '.$user->email);
    }
}