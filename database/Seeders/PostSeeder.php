<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'type' => 'sell_out',
            'title' => 'Mercedes Benz',
			'status' => 'new',
			'phone' => '00966587416752',
			'price' => '100000',
			'body' => 'The Mercedes-Benz A-Class has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 2143 cc while the Petrol engine is 1595 cc . It is available with Automatic transmission.',
			'region' => 'Riyadhٌ',
			'user_id' => '1',
			'ads_no' => random_int(100, 100000)
        ]);
		
		
        Post::create([
            'type' => 'sell_out',
            'title' => 'LandCruiser LC300',
			'status' => 'second',
			'phone' => '00966585137846',
			'price' => '80000',
			'body' => 'The LandCruiser is a four-wheel drive 4 door with 7 seats, powered by a 3.3L TWIN TURBO V6 engine that has 227 kW of power (at 4000 rpm) and 700 Nm of torque (at 1600 rpm).',
			'region' => 'Abu Dhabi',
			'user_id' => '2',
			'ads_no' => random_int(100, 100000)
        ]);
		
		
        Post::create([
            'type' => 'sell_out',
            'title' => 'Toyota FJ Cruiser',
			'status' => 'new',
			'phone' => '00966585151234',
			'price' => '110000',
			'body' => 'The Toyota FJ Cruiser is offered Petrol engine in the UAE. The new SUV from Toyota comes in a total of 4 variants. FJ Cruiser is available with Automatic transmission.',
			'region' => 'Riyadhٌ',
			'user_id' => '3',
			'ads_no' => random_int(100, 100000)
        ]);
		
		
        Post::create([
            'type' => 'sell_out',
            'title' => 'BMW',
			'status' => 'second',
			'phone' => '00966585137846',
			'price' => '100000',
			'body' => 'The BMW 7 Series has 1 Diesel Engine and 2 Petrol Engine on offer. The Diesel engine is 2993 cc while the Petrol engine is 2998 cc and 6592 cc . It is available with Automatic transmission.',
			'region' => 'Qatar',
			'user_id' => '1',
			'ads_no' => random_int(100, 100000)
        ]);
		
		
        Post::create([
            'type' => 'sell_out',
            'title' => 'Isuzu D-Max V-Cross',
			'status' => 'second',
			'phone' => '00966587416752',
			'price' => '85000',
			'body' => 'The Isuzu D-Max V-Cross 2019-2021 has 2 Diesel Engine on offer. The Diesel engine is 2499 cc and 1999 cc . It is available with Manual & Automatic transmission.',
			'region' => 'Riyadhٌ',
			'user_id' => '2',
			'ads_no' => random_int(100, 100000)
        ]);
		
		
        Post::create([
            'type' => 'sell_out',
            'title' => 'Rolls-Royce',
			'status' => 'new',
			'phone' => '00966585151234',
			'price' => '100000',
			'body' => 'As the flagship model in the Rolls-Royce lineup, the stately Phantom features a twin-turbocharged 6.75-litre V12 engine that delivers 563 horsepower.',
			'region' => 'Abu Dhabi',
			'user_id' => '3',
			'ads_no' => random_int(100, 100000)
        ]);
    }
}