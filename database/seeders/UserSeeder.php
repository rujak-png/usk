<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@ini.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Kasir',
            'email' => 'kasir@ini.com',
            'password' => bcrypt('password'),
            'role' => 'kasir'
        ]);
        User::create([
            'name' => 'Waiter',
            'email' => 'waiter@ini.com',
            'password' => bcrypt('password'),
            'role' => 'waiter'
        ]);
        User::create([
            'name' => 'Owner',
            'email' => 'owner@ini.com',
            'password' => bcrypt('password'),
            'role' => 'owner'
        ]);
    }
}
