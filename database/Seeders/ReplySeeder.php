<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Reply;

class ReplySeeder extends Seeder
{
    public function run()
    {
        Reply::create([
            'body' => 'Yes, Please contact for more details',
            'comment_id' => '1',
			'user_id' => '1'
        ]);
        Reply::create([
            'body' => 'A message is sent to you, please check inbox',
            'comment_id' => '2',
			'user_id' => '1'
        ]);
		
		
        Reply::create([
            'body' => 'Thank You!..',
            'comment_id' => '3',
			'user_id' => '2'
        ]);
        Reply::create([
            'body' => 'Yes, Please contact for more details',
            'comment_id' => '4',
			'user_id' => '2'
        ]);
		
		
        Reply::create([
            'body' => 'Yes, Please contact for more details',
            'comment_id' => '5',
			'user_id' => '3'
        ]);
        Reply::create([
            'body' => 'A message is sent to you, please check inbox',
            'comment_id' => '6',
			'user_id' => '3'
        ]);
		
		
		Reply::create([
            'body' => 'Thank You!..',
            'comment_id' => '7',
			'user_id' => '1'
        ]);
        Reply::create([
            'body' => 'Yes, Please contact for more details',
            'comment_id' => '8',
			'user_id' => '1'
        ]);
		
		
        Reply::create([
            'body' => 'Yes, Please contact for more details',
            'comment_id' => '9',
			'user_id' => '2'
        ]);
        Reply::create([
            'body' => 'A message is sent to you, please check inbox',
            'comment_id' => '10',
			'user_id' => '2'
        ]);
		
		
        Reply::create([
            'body' => 'Thank You!..',
            'comment_id' => '11',
			'user_id' => '3'
        ]);
        Reply::create([
            'body' => 'A message is sent to you, please check inbox',
            'comment_id' => '12',
			'user_id' => '3'
        ]);
    }
}
