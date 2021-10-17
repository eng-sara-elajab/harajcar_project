<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['phone', 'username', 'money_amount', 'bank_name', 'transformation_time', 'transformer_name', 'notes', 'status', 'user_id'];
}
