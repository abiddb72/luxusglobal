<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(AdminUserSeeder::class);
        $this->call([
            BannerSeeder::class,
            BlogSeeder::class,
            CategorySeeder::class,
            PackageSeeder::class,
            SettingsSeeder::class,
            PageSeeder::class,
            BankSeeder::class,
            VisaSeeder::class,
            ClientSeeder::class,
        ]);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
