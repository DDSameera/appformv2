<?php

namespace App\Http\Controllers\Wizard;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodInfoRequest;
use App\Models\FoodPreference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodInfoController extends Controller
{
    public function index(Request $request)
    {
        $foodPref = FoodPreference::where('user_id','=',Auth::id())->get();
        return response()->json([
            "food_pref_info" => $foodPref
        ], 200);
    }

    public function save(FoodInfoRequest $foodInfoRequest)
    {

        $formData = $foodInfoRequest->all();


        //1.Student Officer
        $foodPref = FoodPreference::updateOrCreate([
            'user_id' => Auth::id(),
            'member_type' => 'student_officer'
        ], [
            'food_type' => $formData['student_officer_food_type']
        ]);


        //2.Spouse
        $foodPref = FoodPreference::updateOrCreate([
            'user_id' => Auth::id(),
            'member_type' => 'spouse'
        ], [
            'food_type' => $formData['spouse_food_type']
        ]);

        //3. Children
        $foodPref = FoodPreference::updateOrCreate([
            'user_id' => Auth::id(),
            'member_type' => 'children'
        ], [
            'food_type' => $formData['children_food_type']
        ]);


        return response()->json([
            'alert' => [
                'type' => 'success',
                'message' => 'Food Pref Info has been saved successfully'
            ]
        ], 200);


    }
}
