<?php

use Database\Seeders\AdminSeeder;
use Database\Seeders\SettingSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\RegionSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\ImageSeeder;
use Database\Seeders\CommentSeeder;
use Database\Seeders\ReplySeeder;
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
        $this->call(CountrySeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(ReplySeeder::class);
    }
}
