<?php

namespace App\Http\Controllers\Wizard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedDecoRequest;
use App\Models\MedalDecoration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedDecoInfoController extends Controller
{

    public function index()
    {
        $medDecoInfo = MedalDecoration::where('user_id','=',Auth::id())->get();

        return response()->json([
            'med_deco_info' => $medDecoInfo,
        ], 200);


    }

    public function save(MedDecoRequest $medDecoRequest)
    {

        $medals = $medDecoRequest->get('medals');
        $decorations = $medDecoRequest->get('decorations');
        $serialNos = $medDecoRequest->get('serial_no');


        foreach ($serialNos as $m) {
            $indexNo = $m - 1;
            MedalDecoration::updateOrCreate([
                'serial_no' => $m,
                'user_id' => Auth::id(),

            ], [
                'medal' => $medals[$indexNo],
                'decoration' => $decorations[$indexNo],

            ]);
        }


        return response()->json([
            'alert' => [
                'type' => 'success',
                'message' => 'Medals & decoration has been saved successfully'
            ]
        ], 200);

    }

    public function delete($id)
    {
        if (MedalDecoration::destroy($id)) {
            return response()->json([
                'alert' => [
                    'type' => 'danger',
                    'message' => 'Medals & decoration has been deleted successfully'
                ]
            ], 200);
        }


    }
}
