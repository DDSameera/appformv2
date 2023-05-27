<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_no',
        'academic_qualification',
        'institute_name',
        'award_year',
        'scanned_certificate',
        'user_id'
    ];
}
