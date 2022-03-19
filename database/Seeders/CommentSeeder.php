<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Comment;

class CommentSeeder extends Seeder
{
    public function run()
    {
        Comment::create([
            'body' => 'Hi, Is this item is available?',
            'post_id' => '1',
			'user_id' => '2'
        ]);
        Comment::create([
            'body' => 'Hello, Ithink your phone number is incorrect, please contact me...',
            'post_id' => '1',
			'user_id' => '3'
        ]);
		
		
        Comment::create([
            'body' => 'Wow, its so beautiful',
            'post_id' => '2',
			'user_id' => '1'
        ]);
        Comment::create([
            'body' => 'Hi, Is this item is available?',
            'post_id' => '2',
			'user_id' => '3'
        ]);
		
		
        Comment::create([
            'body' => 'Hi, Is this item is available?',
            'post_id' => '3',
			'user_id' => '1'
        ]);
        Comment::create([
            'body' => 'Hello, Ithink your phone number is incorrect, please contact me...',
            'post_id' => '3',
			'user_id' => '2'
        ]);
		
		
        Comment::create([
            'body' => 'Wow, its so beautiful',
            'post_id' => '4',
			'user_id' => '2'
        ]);
        Comment::create([
            'body' => 'Hi, Is this item is available?',
            'post_id' => '4',
			'user_id' => '3'
        ]);
		
		
        Comment::create([
            'body' => 'Hi, Is this item is available?',
            'post_id' => '5',
			'user_id' => '1'
        ]);
        Comment::create([
            'body' => 'Hello, Ithink your phone number is incorrect, please contact me...',
            'post_id' => '5',
			'user_id' => '3'
        ]);
		
		
        Comment::create([
            'body' => 'Wow, its so beautiful',
            'post_id' => '6',
			'user_id' => '1'
        ]);
        Comment::create([
            'body' => 'Hello, Ithink your phone number is incorrect, please contact me...',
            'post_id' => '6',
			'user_id' => '2'
        ]);
    }
}
