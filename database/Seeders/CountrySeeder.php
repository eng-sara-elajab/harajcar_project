<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$country = new Country();
		$country->arabic_name = 'قطر',
		$country->english_name = 'Qatar',
		$country->save();
		
		$country = new Country();
		$country->arabic_name = 'السعودية',
		$country->english_name = 'Saudi Arabia',
		$country->save();
		
		$country = new Country();
		$country->arabic_name = 'الإمارات',
		$country->english_name = 'United Arab Emarates',
		$country->save();
    }
}
