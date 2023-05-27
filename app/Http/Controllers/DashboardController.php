<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where("role",'=','user')->paginate(2);
        return view('dashboard.index', compact('users'));
    }


}
