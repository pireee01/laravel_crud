<?php

namespace App\Http\Controllers;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login-form')->with('error', 'Please login to access the app.');
        } else {
            return redirect()->route('dashboard.' . Auth::user()->role);
        }
    }
}
