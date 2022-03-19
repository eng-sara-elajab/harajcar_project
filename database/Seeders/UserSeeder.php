<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'John Canady',
            'username' => 'john_canady',
			'phone' => '00966587416752',
            'email' => 'johncanady@user.com',
			'country' => 'Qatar',
            'password' => bcrypt(12345678)
        ]);
		
        User::create([
            'name' => 'Ibrahim Khan',
            'username' => 'ibrahim_khan',
			'phone' => '00966585137846',
            'email' => 'ibrahimkhan@user.com',
			'country' => 'Saudi Arabia',
            'password' => bcrypt(12345678)
        ]);
		
        User::create([
            'name' => 'Mohammed Ali',
            'username' => 'mohammed_ali',
			'phone' => '00966585151234',
            'email' => 'mohammedali@user.com',
			'country' => 'United Arab Emarates',
            'password' => bcrypt(12345678)
        ]);
    }
}