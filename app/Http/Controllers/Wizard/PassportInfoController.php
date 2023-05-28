<?php

namespace App\Http\Controllers\Wizard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PassportInfoRequest;
use App\Models\Passport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Generator\StringManipulation\Pass\Pass;

class PassportInfoController extends Controller
{
    public function index(Request $request)
    {

        $passport = Passport::where('user_id','=',Auth::id())->first();
        return response()->json([
            "passport_info" => $passport
        ], 200);
    }

    public function save(PassportInfoRequest $passportInfoRequest)
    {

        $formData = $passportInfoRequest->all();

        $passport = Passport::updateOrCreate([
            'user_id' => Auth::id()
        ], $formData);

        if ($passport) {
            return response()->json([
                'alert' => [
                    'type' => 'success',
                    'message' => 'Passport Info has been saved successfully'
                ]
            ], 200);
        }


    }
}
