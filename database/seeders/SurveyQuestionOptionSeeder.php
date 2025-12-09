<?php

namespace Database\Seeders;

use App\Models\QuestionOption;
use App\Models\SurveyQuestionOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveyQuestionOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criteriaOptions = [
            1 => [ // K1 - Rasa
                ['value' => 1, 'label' => 'Sangat Manis', 'description' => 'Sangat creamy, manis mendominasi seperti dessert'],
                ['value' => 2, 'label' => 'Manis', 'description' => 'Creamy dengan rasa karamel atau vanilla'],
                ['value' => 3, 'label' => 'Seimbang', 'description' => 'Campuran seimbang antara manis, asam dan pahit'],
                ['value' => 4, 'label' => 'Pahit', 'description' => 'Rasa kopi kuat dan jelas, sedikit pahit'],
                ['value' => 5, 'label' => 'Sangat Pahit', 'description' => 'Kopi hitam pekat, rasa pahit sangat dominan'],
            ],
            2 => [ // K2 - Intensitas
                ['value' => 1, 'label' => 'Sangat Ringan', 'description' => 'Hanya sedikit rasa kopi'],
                ['value' => 2, 'label' => 'Ringan', 'description' => 'Rasa kopi ringan'],
                ['value' => 3, 'label' => 'Sedang', 'description' => 'Kekuatan kopi standar'],
                ['value' => 4, 'label' => 'Kuat', 'description' => 'Rasa kopi kuat dan jelas'],
                ['value' => 5, 'label' => 'Sangat Kuat', 'description' => 'Seperti espresso, sangat kuat'],
            ],
            3 => [ // K3 - Harga
                ['value' => 1, 'label' => 'Sangat Mahal', 'description' => '> Rp 50,000'],
                ['value' => 2, 'label' => 'Mahal', 'description' => 'Rp 41,000 - Rp 50,000'],
                ['value' => 3, 'label' => 'Sedang', 'description' => 'Rp 31,000 - Rp 40,000'],
                ['value' => 4, 'label' => 'Murah', 'description' => 'Rp 25,000 - Rp 30,000'],
                ['value' => 5, 'label' => 'Sangat Murah', 'description' => '< Rp 25,000'],
            ],
            4 => [ // K4 - Kemanisan
                ['value' => 1, 'label' => 'Tanpa Gula', 'description' => 'Tanpa gula, rasa kopi alami'],
                ['value' => 2, 'label' => 'Sedikit Manis', 'description' => 'Hanya sedikit manis'],
                ['value' => 3, 'label' => 'Sedang', 'description' => 'Kemanisan standar'],
                ['value' => 4, 'label' => 'Manis', 'description' => 'Manis, seperti minuman dessert'],
                ['value' => 5, 'label' => 'Sangat Manis', 'description' => 'Sangat manis, seperti dessert'],
            ],
            5 => [ // K5 - Level Susu
                ['value' => 1, 'label' => 'Tanpa Susu', 'description' => 'Kopi hitam, tanpa susu'],
                ['value' => 2, 'label' => 'Sedikit', 'description' => 'Hanya sedikit susu'],
                ['value' => 3, 'label' => 'Sedang', 'description' => 'Jumlah susu standar'],
                ['value' => 4, 'label' => 'Banyak', 'description' => 'Banyak susu, creamy'],
                ['value' => 5, 'label' => 'Sangat Banyak', 'description' => 'Sangat banyak susu, seperti latte'],
            ]
        ];

        foreach ($criteriaOptions as $surveyQuestionID => $options) {
            foreach ($options as $option) {
                SurveyQuestionOption::create([
                    'survey_question_id' => $surveyQuestionID,
                    'value' => $option['value'],
                    'label' => $option['label'],
                    'description' => $option['description'],
                    'locale' => 'id'
                ]);
            }
        }
    }
}
