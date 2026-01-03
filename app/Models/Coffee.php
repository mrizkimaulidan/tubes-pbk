<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    use HasFactory;

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
    public function mapPrice($price)
    {
        return match (true) {
            $price < 25000 => 5,        // Sangat Murah: < 25,000
            $price <= 30000 => 4,       // Murah: 25,000 - 30,000
            $price <= 40000 => 3,       // Sedang: 30,001 - 40,000
            $price <= 50000 => 2,       // Mahal: 40,001 - 50,000
            default => 1                // Sangat Mahal: > 50,000
        };
    }

    /* =========================
     * Mapping Rasa
     * ========================= */
    public function mapTaste($value)
    {
        return match ($value) {
            'Sangat Pahit' => 5,
            'Pahit' => 4,
            'Seimbang' => 3,
            'Manis' => 2,
            'Sangat Manis' => 1,
            default => 1
        };
    }

    /* =========================
     * Mapping Intensitas
     * ========================= */
    public function mapIntensity($value)
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
    public function mapSweetness($value)
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
    public function mapMilkLevel($value)
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

    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => 'Rp '.number_format($this->price, 0, ',', '.')
        );
    }

    protected function mappedCoffeeCharacteristics(): Attribute
    {
        return Attribute::make(
            get: fn () => [
                'taste' => $this->mapTaste($this->taste),
                'intensity' => $this->mapIntensity($this->intensity),
                'price' => $this->mapPrice($this->price),
                'sweetness' => $this->mapSweetness($this->sweetness),
                'milk_level' => $this->mapMilkLevel($this->milk_level),
            ]
        );
    }
}
