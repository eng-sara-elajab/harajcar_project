<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminusermessage extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'sender_id', 'sender_type', 'receiver_id', 'receiver_type', 'chat_room', 'read_status'];
}
