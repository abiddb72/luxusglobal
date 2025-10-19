<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Muhammad Abid',
                'email' => 'admin@admin.com',
                'phone' => '00011122233',
                'password' => Hash::make('admin123'),
                'is_admin' => 1,
            ],
            [
                'name' => 'Bilal',
                'email' => 'bilal@admin.com',
                'phone' => '00011122233',
                'password' => Hash::make('admin123'),
                'is_admin' => 1,
            ],
            [
                'name' => 'Rabia',
                'email' => 'rabia@admin.com',
                'phone' => '00011122233',
                'password' => Hash::make('admin123'),
                'is_admin' => 1,
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']], // email unique rakho
                $user                          // baki data update ya create hoga
            );
        }
    }
}
