<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SecureDownloadController extends Controller
{
    public function certificate( $view = false,$userId, $fileName)
    {

        try {
            $filePath = storage_path('app/uploads/scanned_certificates/' . $userId . '/' . $fileName);

            if ($view) {
                return response()->file($filePath);
            } else {
                return response()->download($filePath);
            }


        } catch (\Exception $exception) {
            return "Certificate Not Found";
        }

    }

    public function profileImage($fileName)
    {
        try {
            $filePath = storage_path('app/uploads/images/' . $fileName);
            return response()->file($filePath);
        } catch (\Exception $exception) {
            return "Profile image Not Found";
        }

    }
}
