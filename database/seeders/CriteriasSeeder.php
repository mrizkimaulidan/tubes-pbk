<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Seeder;

class CriteriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criterias = [
            ['name' => 'Rasa', 'type' => 'benefit'],
            ['name' => 'Intensitas', 'type' => 'benefit'],
            ['name' => 'Harga', 'type' => 'cost'],
            ['name' => 'Tingkat Kemanisan', 'type' => 'benefit'],
            ['name' => 'Level Susu', 'type' => 'benefit'],
        ];

        foreach ($criterias as $index => $criteria) {
            Criteria::create([
                'code' => 'K'.($index + 1),
                'name' => $criteria['name'],
                'attribute' => $criteria['type'],
            ]);
        }
    }
}
