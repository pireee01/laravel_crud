<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        // ###################### PERMISSION CHECKER ######################
        if (!Auth::check()) {
            return redirect()->route('login-form')->with('error', 'Please login to access the app.');
        }
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard.' . Auth::user()->role)->with('error', 'You do not have access to this url.');
        }
        // ###################### PERMISSION CHECKER ######################
        return view('admin.dashboard');
    }
}