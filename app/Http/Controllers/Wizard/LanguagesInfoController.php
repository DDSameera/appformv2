<?php

namespace App\Http\Controllers\Wizard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguagesInfoRequest;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanguagesInfoController extends Controller
{

    public function index(){
       $language =  Language::where('user_id','=',Auth::id())->get();
        return response()->json([
            "lang_info" => $language
        ], 200);
    }

    public function save(LanguagesInfoRequest $languagesInfoRequest)
    {
        //1.Sinhala
        $speakSinFluency = $languagesInfoRequest->get('speak_sin_fluency');
        $writingSinFluency = $languagesInfoRequest->get('writing_sin_fluency');
        $readingSinFluency = $languagesInfoRequest->get('reading_sin_fluency');

        //2.English
        $speakEnFluency = $languagesInfoRequest->get('speak_en_fluency');
        $writingEnFluency = $languagesInfoRequest->get('writing_en_fluency');
        $readingEnFluency = $languagesInfoRequest->get('reading_en_fluency');

        //3.Tamil
        $speakTmFluency = $languagesInfoRequest->get('speak_tm_fluency');
        $writingTmFluency = $languagesInfoRequest->get('writing_tm_fluency');
        $readingTmFluency = $languagesInfoRequest->get('reading_tm_fluency');

        //4.Other
        $speakOtherFluency = $languagesInfoRequest->get('speak_other_fluency');
        $writingOtherFluency = $languagesInfoRequest->get('writing_other_fluency');
        $readingOtherFluency = $languagesInfoRequest->get('reading_other_fluency');

        //1.Sinhala
        Language::updateOrCreate([
            'user_id' => Auth::id(),
            'type_name'=>'sinhala',

        ], [
            'speaking'=>$speakSinFluency,
            'writing'=>$writingSinFluency,
            'reading'=>$readingSinFluency,


        ]);

        //2.English
        Language::updateOrCreate([
            'user_id' => Auth::id(),
            'type_name'=>'english',
        ], [

            'speaking'=>$speakEnFluency,
            'writing'=>$writingEnFluency,
            'reading'=>$readingEnFluency,


        ]);



        //3.Tamil
        Language::updateOrCreate([
            'user_id' => Auth::id(),
            'type_name'=>'tamil',
        ], [

            'speaking'=>$speakTmFluency,
            'writing'=>$writingTmFluency,
            'reading'=>$readingTmFluency,

        ]);

        //4. Other
        Language::updateOrCreate([
            'user_id' => Auth::id(),
            'type_name'=>'other',
        ], [

            'speaking'=>$speakOtherFluency,
            'writing'=>$writingOtherFluency,
            'reading'=>$readingOtherFluency,

        ]);


        return response()->json([
            'alert' => [
                'type' => 'success',
                'message' => 'Language Info has been saved successfully'
            ]
        ], 200);



    }
}
