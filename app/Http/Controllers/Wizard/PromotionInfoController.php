<?php

namespace App\Http\Controllers\Wizard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromotionInfoRequest;
use App\Models\PromotionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromotionInfoController extends Controller
{
    public function index(Request $request)
    {
        $user = PromotionDetail::where('user_id','=',Auth::id())->first();
        return response()->json([
            "promotion_info" => $user
        ], 200);
    }

    public function save(PromotionInfoRequest $promotionInfoRequest)
    {
        $formData = $promotionInfoRequest->all();
        $passport = PromotionDetail::updateOrCreate([
            'user_id' => Auth::id(),
        ], $formData);

        if ($passport) {
            return response()->json([
                'alert' => [
                    'type' => 'success',
                    'message' => 'Promotion Info has been saved successfully'
                ]
            ], 200);

        }


    }
}
