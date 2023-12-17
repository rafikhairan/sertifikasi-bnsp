<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = fopen(base_path('database/data/countries.csv'), 'r');

        $firstline = true;
        while (($data = fgetcsv($csv, 2000, ',')) !== false) {
            if(!$firstline) {
                Country::create([
                    'code' => $data['0'],
                    'country_name' => $data['3']
                ]);    
            }
            $firstline = false;
        }

        fclose($csv);
    }
}
