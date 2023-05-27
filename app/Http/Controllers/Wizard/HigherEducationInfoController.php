<?php

namespace App\Http\Controllers\Wizard;

use App\Http\Controllers\Controller;
use App\Http\Requests\HigherEducationInfoRequest;
use App\Models\HigherEducation;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HigherEducationInfoController extends Controller
{
    public function index()
    {
        $higherEduInfo = HigherEducation::where('user_id','=',Auth::id())->get();

        return response()->json([
            'higher_edu_info' => $higherEduInfo,
        ], 200);


    }

    public function save(HigherEducationInfoRequest $higherEducationInfoRequest)
    {

        $school = $higherEducationInfoRequest->get('school');
        $serialNos = $higherEducationInfoRequest->get('serial_no');
        $higherEducation = $higherEducationInfoRequest->get('higher_education');
        $qualification = $higherEducationInfoRequest->get('qualification');




        foreach ($serialNos as $m) {
            $indexNo = $m - 1;
            HigherEducation::updateOrCreate([
                'serial_no' => $m,
                 'user_id' => Auth::id(),

            ], [
                'school'=>$school[$indexNo],
                'higher_education' => $higherEducation[$indexNo],
                'qualification' => $qualification[$indexNo],
            ]);
        }


        return response()->json([
            'alert' => [
                'type' => 'success',
                'message' => 'Higher Education has been saved successfully'
            ]
        ], 200);

    }

    public function delete($id)
    {
        if (HigherEducation::destroy($id)) {
            return response()->json([
                'alert' => [
                    'type' => 'danger',
                    'message' => 'Higher Education has been deleted successfully'
                ]
            ], 200);
        }


    }
}
