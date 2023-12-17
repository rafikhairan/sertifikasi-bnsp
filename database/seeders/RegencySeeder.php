<?php

namespace Database\Seeders;

use App\Models\Regency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = fopen(base_path('database/data/regencies.csv'), 'r');

        while (($data = fgetcsv($csv, 2000, ',')) !== false) {
            Regency::create([
                'id' => $data['0'],
                'province_id' => $data['1'],
                'regency_name' => $data['2'],
            ]);    
        }

        fclose($csv);
    }
}
