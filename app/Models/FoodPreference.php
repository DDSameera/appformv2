<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodPreference extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_type',
        'food_type',
        'user_id'
    ];
}
