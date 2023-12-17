<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = fopen(base_path('database/data/districts.csv'), 'r');

        while (($data = fgetcsv($csv, 2000, ',')) !== false) {
            District::create([
                'id' => $data['0'],
                'regency_id' => $data['1'],
                'district_name' => $data['2']
            ]);    
        }

        fclose($csv);
    }
}
