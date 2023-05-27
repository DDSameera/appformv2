<?php

namespace App\Http\Controllers\Wizard;

use App\Http\Controllers\Controller;
use App\Http\Requests\HobbyInfoRequest;
use App\Models\Hobby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HobbyInfoController extends Controller
{
    public function index()
    {
        $hobbiesInfo = Hobby::where('user_id','=',Auth::id())->get();

        return response()->json([
            'hobbies_info' =>$hobbiesInfo,
        ], 200);


    }

    public function save(HobbyInfoRequest $hobbyInfoRequest)
    {

        $serialNos = $hobbyInfoRequest->get('serial_no');
        $hobbyNames = $hobbyInfoRequest->get('hobby_name');


        foreach ($serialNos as $key => $sn) {
             Hobby::updateOrCreate([
                'serial_no' => $sn,
                'user_id' => Auth::id(),

            ], [
                'name' => $hobbyNames[$key]

            ]);
        }


        return response()->json([
            'alert' => [
                'type' => 'success',
                'message' => 'Hobby info has been saved successfully'
            ]
        ], 200);

    }

    public function delete($id)
    {
        if (Hobby::destroy($id)) {
            return response()->json([
                'alert' => [
                    'type' => 'danger',
                    'message' => 'Hobby info has been deleted successfully'
                ]
            ], 200);
        }


    }
}
