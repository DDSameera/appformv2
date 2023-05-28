<?php

namespace App\Http\Controllers\Wizard;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentInfoRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentInfoController extends Controller
{


    public function index()
    {
        $appointmentInfo = Appointment::where('user_id','=',Auth::id())->get();

        return response()->json([
            'appointment_info' => $appointmentInfo,
        ], 200);


    }

    public function save(AppointmentInfoRequest $appointmentInfoRequest)
    {

        $serialNos = $appointmentInfoRequest->get('serial_no');
        $appointments = $appointmentInfoRequest->get('appointment');
        $ranks = $appointmentInfoRequest->get('rank');
        $fromDates = $appointmentInfoRequest->get('from_date');
        $toDates = $appointmentInfoRequest->get('to_date');


        foreach ($serialNos as $sn) {
            $indexNo = $sn - 1;
            Appointment::updateOrCreate([
                'serial_no' => $sn,
                'user_id' => Auth::id(),

            ], [
                'appointment' => $appointments[$indexNo],
                'rank' => $ranks[$indexNo],
                'from_date' => $fromDates[$indexNo],
                'to_date' => $toDates[$indexNo]
            ]);
        }


        return response()->json([
            'alert' => [
                'type' => 'success',
                'message' => 'Appointment Info has been saved successfully'
            ]
        ], 200);

    }

    public function delete($id)
    {

        if (Appointment::destroy($id)) {
            return response()->json([
                'alert' => [
                    'type' => 'danger',
                    'message' => 'Appointment Info has been deleted successfully'
                ]
            ], 200);
        }


    }


}
