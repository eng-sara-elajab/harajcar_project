<?php

namespace Database\Seeders;

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database Seeders.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'english_name' => 'Website name',
            'arabic_name' => 'إسم الموقع',
            'language' => 0,
        ]);
    }
}
