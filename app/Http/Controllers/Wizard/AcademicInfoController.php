<?php

namespace App\Http\Controllers\Wizard;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AcademicEduInfoRequest;
use App\Models\AcademicEducation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AcademicInfoController extends Controller
{


    public function index()
    {
        $academicEduInfo = AcademicEducation::where('user_id','=',Auth::id())->get();

        return response()->json([
            'academic_edu_info' => $academicEduInfo,
        ], 200);


    }

    public function save(AcademicEduInfoRequest $academicEduInfoRequest)
    {

        $userId = Auth::id();
        $serialNos = $academicEduInfoRequest->get('serial_no');
        $academicQualification = $academicEduInfoRequest->get('academic_qualification');
        $instituteName = $academicEduInfoRequest->get('institute_name');
        $yearOfAward = $academicEduInfoRequest->get('year_of_award');
        $scannedCertificates = $academicEduInfoRequest->file('scanned_certificate'); //Get Scanned Certificate


        foreach ($scannedCertificates as $indexNo => $sc) {
            //Upload Image
            $scannedCertificateImageName = $sc->getClientOriginalName();
            $scannedCertificateImageName = str_replace(' ', '_', $scannedCertificateImageName);
            $scannedCertificateImagePath =$userId . '/' . $scannedCertificateImageName;
            $sc->storeAs('uploads/scanned_certificates/' .$userId, $scannedCertificateImageName);

            AcademicEducation::updateOrCreate([
                'serial_no' => $serialNos[$indexNo],
                'user_id' =>$userId

            ], [
                'academic_qualification' => $academicQualification[$indexNo],
                'institute_name' => $instituteName[$indexNo],
                'award_year' => $yearOfAward[$indexNo],
                'scanned_certificate' => $scannedCertificateImagePath,
                'institute_name' => $instituteName[$indexNo],




            ]);
        }


        return response()->json([
            'alert' => [
                'type' => 'success',
                'message' => 'Academic Education has been saved successfully'
            ]
        ], 200);

    }

    public function delete($id)
    {
        $academicEducation = AcademicEducation::find($id);
        $scannedCertificatePath = "uploads/scanned_certificates/" . $academicEducation->scanned_certificate;

        if (Storage::delete($scannedCertificatePath)) {
            AcademicEducation::destroy($id);
            return response()->json([
                'alert' => [
                    'type' => 'danger',
                    'message' => 'Academic Education has been deleted successfully'
                ]
            ], 200);
        }


    }
}
