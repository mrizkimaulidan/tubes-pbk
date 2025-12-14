<?php

namespace App\Imports;

use App\Models\Coffee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CoffeesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Coffee([
            'name' => $row['nama'],
            'price' => $row['harga'],
            'description' => $row['deskripsi'],
            'taste' => $row['rasa'],
            'intensity' => $row['intensitas'],
            'sweetness' => $row['tingkat_kemanisan'],
            'milk_level' => $row['level_susu'],
            'beans_type' => $row['jenis_kopi'],
            'image_url' => $row['gambar'],
        ]);
    }
}
