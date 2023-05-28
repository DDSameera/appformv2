<?php

namespace App\Http\Controllers\Wizard;

use App\Http\Controllers\Controller;
use App\Models\AcademicEducation;
use App\Models\Appointment;
use App\Models\Children;
use App\Models\Contact;
use App\Models\FoodPreference;
use App\Models\HigherEducation;
use App\Models\Hobby;
use App\Models\Language;
use App\Models\MedalDecoration;
use App\Models\MilitoryCourse;
use App\Models\Passport;
use App\Models\PromotionDetail;
use App\Models\Service;
use App\Models\Spouse;
use App\Models\User;
use App\Models\Vaccination;
use File;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Http\Request;

class ExportAppFormController extends Controller
{

    // Generate PDF
    public function createPDF($userId)
    {


        $users = User::find($userId);
        $medalsAndDecorations = MedalDecoration::where('user_id', '=', $userId)->get();
        $passport = Passport::where('user_id', '=', $userId)->first();
        $promotionDetails = PromotionDetail::where('user_id', '=', $userId)->first();
        $service = Service::where('user_id', '=', $userId)->first();
        $contacts = Contact::where('user_id', '=', $userId)->first();
        $appointments = Appointment::where('user_id', '=', $userId)->get();
        $higherEducation = HigherEducation::where('user_id', '=', $userId)->get();
        $academicEducation = AcademicEducation::where('user_id', '=', $userId)->get();
        $militaryCourse = MilitoryCourse::where('user_id', '=', $userId)->get();
        $spouse = Spouse::where('user_id', '=', $userId)->first();
        $children = Children::where('user_id', '=', $userId)->get();
        $hobbies = Hobby::where('user_id', '=', $userId)->get();
        $languages = Language::where('user_id', '=', $userId)->get();
        $foodPreferences = FoodPreference::where('user_id', '=', $userId)->get();
        $vaccination = Vaccination::where('user_id', '=', $userId)->get();


        $data = [
            'users' => $users,
            'medals_and_decorations' => $medalsAndDecorations,
            'passport' => $passport,
            'promotionDetails' => $promotionDetails,
            'service' => $service,
            'contacts' => $contacts,
            'appointments' => $appointments,
            'higherEducation' => $higherEducation,
            'academicEducation' => $academicEducation,
            'militaryCourse' => $militaryCourse,
            'spouse' => $spouse,
            'children' => $children,
            'hobbies' => $hobbies,
            'languages' => $languages,
            'foodPreferences' => $foodPreferences,
            'vaccination' => $vaccination
        ];


        $pdf = PDF::loadView('export.index', $data);

        return $pdf->stream("dompdf_out.pdf");

    }
}
