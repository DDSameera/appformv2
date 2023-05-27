<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilitoryCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_no',
        'course',
        'country',
        'from_date',
        'to_date',
        'user_id'

    ];
}
