<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'username', 'phone', 'email', 'country', 'profile_photo', 'cover_photo',
        'password', 'followers', 'following', 'favourite', 'no_of_likes', 'no_of_dislikes',
        'documentation_status', 'user_id'
    ];
}
