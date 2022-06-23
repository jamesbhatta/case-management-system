<?php

namespace Database\Seeders;

use App\District;
use App\Province;
use App\Ward;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $headers = ['PROVINCE', 'DISTRICT'];
        $tableContent = [];

        $this->command->getOutput()->progressStart(7);
        foreach (config('address.provinces') as $province) {

            //create province
            $newProvince = Province::firstOrCreate([
                'name' => $province['name'],
                'name_en' => $province['name_en']
            ]);

            foreach ($province['districts'] as $district) {
                //create district
                District::firstOrCreate([
                    'name' => Str::of($district['name'])->trim(),
                    'name_en' => Str::of($district['name_en'])->trim(),
                    'province_id' => $newProvince->id
                ]);


                $this->command->getOutput()->progressAdvance();
                array_push($tableContent, [$newProvince['name'], $district['name']]);
            }
        }

        // End progressbar
        $this->command->getOutput()->progressFinish();

        // Show table of provinces and districts
        $this->command->table($headers, $tableContent);

        $this->command->getOutput()->progressStart();
        // Create wards
       
        $this->command->getOutput()->progressAdvance();

        $this->command->getOutput()->progressFinish();
    }
}
