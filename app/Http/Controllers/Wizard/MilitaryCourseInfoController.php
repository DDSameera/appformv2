<?php

namespace App\Http\Controllers\Wizard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MilitaryCourseInfoRequest;
use App\Models\MilitoryCourse;
use Illuminate\Support\Facades\Auth;

class MilitaryCourseInfoController extends Controller
{
    public function index()
    {
        $milCourseInfo = MilitoryCourse::where('user_id','=',Auth::id())->get();

        return response()->json([
            'military_course_info' => $milCourseInfo,
        ], 200);


    }

    public function save(MilitaryCourseInfoRequest $militaryCourseInfoRequest)
    {

        $serialNos = $militaryCourseInfoRequest->get('serial_no');
        $courses = $militaryCourseInfoRequest->get('course');
        $countries = $militaryCourseInfoRequest->get('country');
        $fromDates = $militaryCourseInfoRequest->get('from_date');
        $toDates = $militaryCourseInfoRequest->get('to_date');
        $userId = Auth::id();


        foreach ($serialNos as $m) {
            $indexNo = $m - 1;

            MilitoryCourse::updateOrCreate([
                'serial_no' => $m,
                'user_id' => Auth::id(),

            ], [
                'course' => $courses[$indexNo],
                'country' => $countries[$indexNo],
                'from_date' => $fromDates[$indexNo],
                'to_date' => $toDates[$indexNo],

            ]);
        }


        return response()->json([
            'alert' => [
                'type' => 'success',
                'message' => 'Military Course has been saved successfully'
            ]
        ], 200);

    }

    public function delete($id)
    {
        if (MilitoryCourse::destroy($id)) {
            return response()->json([
                'alert' => [
                    'type' => 'danger',
                    'message' => 'Military Course has been deleted successfully'
                ]
            ], 200);
        }


    }
}
