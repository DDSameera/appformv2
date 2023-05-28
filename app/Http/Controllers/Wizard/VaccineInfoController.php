<?php

namespace App\Http\Controllers\Wizard;

use App\Http\Controllers\Controller;
use App\Http\Requests\VaccineInfoRequest;
use App\Models\Vaccination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VaccineInfoController extends Controller
{
    public function index()
    {
        $vaccineInfo = Vaccination::where('user_id','=',Auth::id())->get();

        return response()->json([
            'vaccine_info' => $vaccineInfo,
        ], 200);


    }

    public function save(VaccineInfoRequest $vaccineInfoRequest)
    {

        $serialNos = $vaccineInfoRequest->get('serial_no');
        $persons = $vaccineInfoRequest->get('person_type');
        $vaccineTypes = $vaccineInfoRequest->get('vaccine_type');
        $vaccineFirstDates = $vaccineInfoRequest->get('first_date');
        $vaccineSecondDates = $vaccineInfoRequest->get('second_date');


        foreach ($serialNos as $key => $sn) {
            Vaccination::updateOrCreate([
                'serial_no' => $sn,
                'user_id' => Auth::id(),

            ], [
                'person_type' => $persons[$key],
                'vaccine_type' => $vaccineTypes[$key],
                'first_date' => $vaccineFirstDates[$key],
                'second_date' => $vaccineSecondDates[$key]

            ]);
        }


        return response()->json([
            'alert' => [
                'type' => 'success',
                'message' => 'Vaccination info has been saved successfully'
            ]
        ], 200);

    }

    public function delete($id)
    {
        if (Vaccination::destroy($id)) {
            return response()->json([
                'alert' => [
                    'type' => 'danger',
                    'message' => 'Vaccination info has been deleted successfully'
                ]
            ], 200);
        }


    }
}
