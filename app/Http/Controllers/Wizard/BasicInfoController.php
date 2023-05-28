<?php

namespace App\Http\Controllers\Wizard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BasicInfoRequest;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class BasicInfoController extends Controller
{

    public function index(Request $request)
    {
        $user = User::find(Auth::id());

        return response()->json([
            "basic_info" => $user
        ], 200);
    }

    public function save(BasicInfoRequest $request)
    {

        $formData = $request->except('profile_image'); //Capture form data without profile_img
        $nic = $request->get('nic');

        $password = $request->get('password');
        if (isset($password)){
            $formData["password"] = Hash::make($request->get('password'));
        }else{
           $user =  User::find(Auth::id());
           $formData['password']= $user->password;

        }


        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image'); //Get Profile Image
            $profileImageExtension = $profileImage->getClientOriginalExtension();
            $profileImageName = "$nic.$profileImageExtension";
            $profileImage->storeAs('uploads/images', $profileImageName);
            $formData["profile_img"] = $profileImageName;
        }

        //Add User
        $user = User::updateOrCreate([
            'nic' => $nic
        ], $formData);

        return response()->json([
            'alert' => [
                'type' => 'success',
                'message' => 'Basic Info has been saved successfully'
            ]
        ], 200);
    }

    public function delete($userId)
    {

        if (User::destroy($userId)) {
            return response()->json(true, 200);
        } else {
            return response()->json(false, 400);
        }

    }
}
