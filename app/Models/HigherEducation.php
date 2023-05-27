<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HigherEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_no',
        'school',
        'higher_education',
        'qualification',
        'user_id'
    ];
}
