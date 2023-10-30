<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '7858965896',
            'password' => Hash::make('adminpassword'), // Hash the password for security
            'device_token' => '',
            'is_approved' => 1,
            'role' => 'admin', // Assuming 'role' is the column in the users table for storing user roles
        ]);
    }
}
