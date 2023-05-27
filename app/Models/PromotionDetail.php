<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'promotion_date',
        'present_rank',
        'substantive_rank',
        'user_id',
    ];
}
