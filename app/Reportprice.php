<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportprice extends Model
{
    use HasFactory;
    protected $fillable = ['price'];
}
