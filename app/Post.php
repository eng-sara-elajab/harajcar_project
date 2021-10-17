<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'title', 'status', 'phone', 'price', 'body', 'region', 'ads_no', 'user_id', 'reports', 'active_status', 'commission'];
}
