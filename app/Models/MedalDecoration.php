<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedalDecoration extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_no',
        'medal',
        'decoration',
        'user_id'

    ];
}
