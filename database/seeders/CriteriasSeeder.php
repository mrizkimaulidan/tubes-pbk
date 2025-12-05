<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class CriteriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criterias = [
            ['name' => 'Rasa', 'weight' => 0.25, 'type' => 'benefit'],
            ['name' => 'Intensitas', 'weight' => 0.15, 'type' => 'benefit'],
            ['name' => 'Harga', 'weight' => 0.1, 'type' => 'cost'],
            ['name' => 'Tingkat Kemanisan', 'weight' => 0.2, 'type' => 'benefit'],
            ['name' => 'Level Susu', 'weight' => 0.3, 'type' => 'benefit'],
        ];

        foreach ($criterias as $index => $criteria) {
            Criteria::create([
                'code' => 'K' . ($index + 1),
                'name' => $criteria['name'],
                'weight' => $criteria['weight'],
                'attribute' => $criteria['type'],
            ]);
        }
    }
}
