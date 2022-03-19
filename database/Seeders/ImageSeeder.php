<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Image;

class ImageSeeder extends Seeder
{
    public function run()
    {
        Image::create([
            'name' => 'Mercedes Benz',
			'post_id' => '1',
        ]);
        Image::create([
            'name' => 'Mercedes Benz',
			'post_id' => '1',
        ]);
        Image::create([
            'name' => 'Mercedes Benz',
			'post_id' => '1',
        ]);
		
        Image::create([
            'name' => 'LandCruiser LC300',
			'post_id' => '2',
        ]);
        Image::create([
            'name' => 'LandCruiser LC300',
			'post_id' => '2',
        ]);
        Image::create([
            'name' => 'LandCruiser LC300',
			'post_id' => '2',
        ]);
		
        Image::create([
            'name' => 'Toyota FJ Cruiser',
			'post_id' => '3',
        ]);
        Image::create([
            'name' => 'Toyota FJ Cruiser',
			'post_id' => '3',
        ]);
        Image::create([
            'name' => 'Toyota FJ Cruiser',
			'post_id' => '3',
        ]);
		
        Image::create([
            'name' => 'BMW',
			'post_id' => '4',
        ]);
        Image::create([
            'name' => 'BMW',
			'post_id' => '4',
        ]);
        Image::create([
            'name' => 'BMW',
			'post_id' => '4',
        ]);
		
        Image::create([
            'name' => 'Isuzu D-Max V-Cross',
			'post_id' => '5',
        ]);
        Image::create([
            'name' => 'Isuzu D-Max V-Cross',
			'post_id' => '5',
        ]);
        Image::create([
            'name' => 'Isuzu D-Max V-Cross',
			'post_id' => '5',
        ]);
		
        Image::create([
            'name' => 'Rolls-Royce',
			'post_id' => '6',
        ]);
        Image::create([
            'name' => 'Rolls-Royce',
			'post_id' => '6',
        ]);
        Image::create([
            'name' => 'Rolls-Royce',
			'post_id' => '6',
        ]);
    }
}
