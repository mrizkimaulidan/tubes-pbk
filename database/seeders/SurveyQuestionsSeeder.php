<?php

namespace Database\Seeders;

use App\Models\SurveyQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveyQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questionsMap = [
            1 => ['content' => 'Seberapa kuat rasa kopi yang Anda sukai?', 'sort_order' => 1],
            2 => ['content' => 'Seberapa kuat intensitas kopi yang Anda inginkan?', 'sort_order' => 2],
            3 => ['content' => 'Berapa kisaran harga per cup yang Anda inginkan?', 'sort_order' => 3],
            4 => ['content' => 'Seberapa manis minuman kopi Anda?', 'sort_order' => 4],
            5 => ['content' => 'Seberapa banyak susu dalam kopi Anda?', 'sort_order' => 5],
        ];

        foreach ($questionsMap as $criteriaId => $data) {
            SurveyQuestion::create([
                'criteria_id' => $criteriaId,
                'content' => $data['content'],
                'locale' => 'id',
                'sort_order' => $data['sort_order'],
            ]);
        }
    }
}
