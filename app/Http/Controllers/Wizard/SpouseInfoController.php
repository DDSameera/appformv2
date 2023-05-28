<?php

namespace App\Http\Controllers\Wizard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpouseInfoRequest;
use App\Models\Spouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpouseInfoController extends Controller
{


    public function index(Request $request)
    {
        $userId = Auth::id();
        $spouse = Spouse::where('user_id', '=', $userId)->first();
        return response()->json([
            "spouse_info" => $spouse
        ], 200);
    }



}
