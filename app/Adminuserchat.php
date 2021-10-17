<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminuserchat extends Model
{
    use HasFactory;

    protected $fillable = ['admin_id', 'user_id'];
}
