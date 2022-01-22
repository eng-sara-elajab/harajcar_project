<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$region = new Region();
		$region->arabic_name = 'قطر';
		$region->english_name = 'Qatar';
		$region->save();
		
		$region = new Region();
		$region->arabic_name = 'الرياض';
		$region->english_name = 'Riyadhٌ';
		$region->save();
		
		$region = new Region();
		$region->arabic_name = 'أبو ظبي';
		$region->english_name = 'Abu Dhabi';
		$region->save();
    }
}
