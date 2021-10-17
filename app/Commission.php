<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'phone', 'bank_name', 'commission', 'transformation_time', 'transformer_name', 'notes', 'ads_no', 'user_id', 'status', 'bill'];
}
