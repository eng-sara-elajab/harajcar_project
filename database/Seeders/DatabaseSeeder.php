<?php

use Database\Seeders\AdminSeeder;
use Database\Seeders\SettingSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
