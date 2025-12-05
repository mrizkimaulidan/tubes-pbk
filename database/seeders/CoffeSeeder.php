<?php

namespace Database\Seeders;

use App\Models\Coffee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoffeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coffee::create([
            'name' => 'kopi aren',
            'price' => 10000,
            'description' => 'deskripsi kopi',
            'image_url' => 'foto',
        ]);
    }
}
