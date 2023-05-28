<?php

namespace App\Http\Controllers\Wizard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceInfoRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceInfoController extends Controller
{
    public function index(Request $request)
    {
        $service = Service::where('user_id','=',Auth::id())->first();
        return response()->json([
            "service_info" => $service
        ], 200);
    }

    public function save(ServiceInfoRequest $serviceInfoRequest)
    {

        $formData = $serviceInfoRequest->all();
        $service = Service::updateOrCreate([
            'user_id' => Auth::id(),
        ], $formData);

        if ($service) {
            return response()->json([
                'alert' => [
                    'type' => 'success',
                    'message' => 'Service Info has been saved successfully'
                ]
            ], 200);
        }


    }
}
