<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = fopen(base_path('database/data/provinces.csv'), 'r');

        while (($data = fgetcsv($csv, 2000, ',')) !== false) {
            Province::create([
                'id' => $data['0'],
                'province_name' => $data['1']
            ]);    
        }

        fclose($csv);
    }
}
