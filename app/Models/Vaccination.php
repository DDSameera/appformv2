<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_no',
        'person_type',
        'vaccine_type',
        'first_date',
        'second_date',
        'user_id'
    ];
}
