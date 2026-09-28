<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'namamenu' => 'Nasi Goreng',
            'harga' => 20000,
            'kategori' => 'makanan',
        ]);

        Menu::create([
            'namamenu' => 'Ayam Goreng',
            'harga' => 15000,
            'kategori' => 'makanan',
        ]);

        Menu::create([
            'namamenu' => 'Ayam Bakar',
            'harga' => 15000,
            'kategori' => 'makanan',
        ]);

        Menu::create([
            'namamenu' => 'Lele Goreng',
            'harga' => 15000,
            'kategori' => 'makanan',
        ]);
    }
}
