<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membershipfaq extends Model
{
    use HasFactory;
    protected $fillable = ['question', 'answer'];
}
