<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@beasiswa.com',
            'password' => bcrypt('12345678'),
        ]);

        $superadmin->assignRole('admin');

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@beasiswa.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@beasiswa.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('user');
    }
}
