<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_no',
        'appointment',
        'rank',
        'from_date',
        'to_date',
        'user_id'
    ];
}
