<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratingfaq extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'answer'];
}
