<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportelement extends Model
{
    use HasFactory;

    protected $fillable = ['reporter_id', 'post_id', 'post_owner_id'];
}
