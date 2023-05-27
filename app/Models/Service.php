<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'no',
        'name',
        'branch',
        'date_enlistment',
        'date_commission',
        'date_of_birth',
        'blood_group',
        'present_appointment',
        'user_id'
    ];
}
