<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bank;

class BankSeeder extends Seeder
{
    public function run(): void
    {
        Bank::create([
            'title' => 'Bank Al Habib',
            'description' => '<p>Account No : 12312132132132</p><p>IBAN : 112233445566</p><p>Account Title : Luxus Global Pvt Ltd</p>',
            'image' => 'bankalhabib.jpg',
            'status' => 1,
        ]);

        Bank::create([
            'title' => 'Meezan Bank',
            'description' => '<p>Account No : 12312132132132</p><p>IBAN No : PK123334445556</p><p>Account Title : Luxus Global PVt Ltd</p>',
            'image' => 'meezan.jpg',
            'status' => 1,
        ]);
    }
}
