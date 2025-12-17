<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'taste',
        'intensity',
        'sweetness',
        'milk_level',
        'beans_type',
        'image_url',
    ];

    //

    public function getCriteriaValue($criteria_id)
    {
        return match ($criteria_id) {

            // 1 = Harga (COST)
            1 => $this->mapPrice($this->price),

            // 2 = Rasa
            2 => $this->mapTaste($this->taste),

            // 3 = Intensitas
            3 => $this->mapIntensity($this->intensity),

            // 4 = Sweetness
            4 => $this->mapSweetness($this->sweetness),

            // 5 = Milk Level
            5 => $this->mapMilkLevel($this->milk_level),

            default => 1
        };
    }

    /* =========================
     * Mapping Harga (COST)
     * ========================= */
    private function mapPrice($price)
    {
        return match (true) {
            $price < 25000 => 5,        // Sangat Murah
            $price <= 30000 => 4,       // Murah
            $price <= 40000 => 3,       // Sedang
            $price <= 50000 => 2,       // Mahal
            default => 1                // Sangat Mahal
        };
    }

    /* =========================
     * Mapping Rasa
     * ========================= */
    private function mapTaste($value)
    {
        return match ($value) {
            'Sangat Pahit' => 1,
            'Pahit' => 2,
            'Seimbang' => 3,
            'Manis' => 4,
            'Sangat Manis' => 5,
            default => 1
        };
    }

    /* =========================
     * Mapping Intensitas
     * ========================= */
    private function mapIntensity($value)
    {
        return match ($value) {
            'Sangat Ringan' => 1,
            'Ringan' => 2,
            'Sedang' => 3,
            'Kuat' => 4,
            'Sangat Kuat' => 5,
            default => 1
        };
    }

    /* =========================
     * Mapping Sweetness
     * ========================= */
    private function mapSweetness($value)
    {
        return match ($value) {
            'Tanpa Gula' => 1,
            'Sedikit Manis' => 2,
            'Sedang' => 3,
            'Manis' => 4,
            'Sangat Manis' => 5,
            default => 1
        };
    }

    /* =========================
     * Mapping Milk Level
     * ========================= */
    private function mapMilkLevel($value)
    {
        return match ($value) {
            'Tanpa Susu' => 1,
            'Sedikit' => 2,
            'Sedang' => 3,
            'Banyak' => 4,
            'Sangat Banyak' => 5,
            default => 1
        };
    }
}
