<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = ['serial_no', 'plate_info_in_arabic', 'plate_info_in_english',
                            'phone_no', 'ads_no', 'report_file_name', 'user_id', 'status'];
}
