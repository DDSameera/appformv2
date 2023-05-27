<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_address',
        'residential_address',
        'mobile_contact',
        'home_contact',
        'whatsapp_contact',
        'viber_contact',
        'user_id'
    ];
}
