<?php

namespace App\Http\Controllers\Wizard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactInfoRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactInfoController extends Controller
{
    public function index(Request $request)
    {
        $contact= Contact::where('user_id','=',Auth::id())->first();
        return response()->json([
            "contact_info" => $contact
        ], 200);
    }

    public function save(ContactInfoRequest  $contactInfoRequest)
    {

        $formData = $contactInfoRequest->all();

        $service = Contact::updateOrCreate([
            'user_id' => Auth::id(),
        ], $formData);

        if ($service) {
            return response()->json([
                'alert' => [
                    'type' => 'success',
                    'message' => 'Contact Info has been saved successfully'
                ]
            ], 200);
        }


    }
}
