<?php

namespace App\Http\Controllers\Wizard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChildrenInfoRequest;
use App\Models\Children;
use App\Models\MaritalStatus;
use App\Models\Spouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class ChildrenInfoController extends Controller
{
    public function index()
    {
        $children = Children::where('user_id','=',Auth::id())->get();

        return response()->json([
            'children_info' => $children
        ], 200);


    }

    public function save(ChildrenInfoRequest $childrenInfoRequest)
    {
         $userId =Auth::id();


         //Spouse Info
        $name = $childrenInfoRequest->get('name_of_spouse');
        $spouse = Spouse::updateOrCreate([
            'user_id' => $userId
        ], [
            'name' => $name
        ]);


        $serialNos = $childrenInfoRequest->get('serial_no');
        $childrenNames = $childrenInfoRequest->get('children_name');
        $childrenGenders = $childrenInfoRequest->get('children_gender');
        $childrenAges = $childrenInfoRequest->get('children_age');

        foreach ($serialNos as $key => $sn) {

            Children::updateOrCreate([
                'user_id' => $userId,
                'serial_no' => $sn,
                'spouse_id' => $spouse->id
            ], [
                'name' => $childrenNames[$key],
                'gender' => $childrenGenders[$key],
                'age' => $childrenAges[$key],
            ]);

        }

        return response()->json([
            'alert' => [
                'type' => 'success',
                'message' => 'Marital Info has been saved successfully'
            ]
        ], 200);


    }

    public function delete($id)
    {

        if (Children::destroy($id)) {
            return response()->json([
                'alert' => [
                    'type' => 'danger',
                    'message' => 'Children Info has been deleted successfully'
                ]
            ], 200);
        }


    }
}
