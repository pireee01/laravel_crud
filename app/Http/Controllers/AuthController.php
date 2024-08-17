<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Method untuk menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        Log::info('Attempting to log in with email: ' . $request->email);

        $credentials = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        if (Auth::attempt($credentials)) {
            Log::info('Login success for user: ' . $request->email);

            $request->session()->regenerate();

            // Redirect berdasarkan role pengguna
            switch (Auth::user()->role) {
                case 'admin':
                    return redirect()->route('dashboard.' . Auth::user()->role);
                default:
                    Auth::logout();
                    return redirect('login-form')->withErrors([
                        'error' => 'Unauthorized access.'
                    ]);
            }
        } else {
            Log::info('Login failed for user: ' . $request->username);
        }

        return redirect()->back()->with('error', 'The provided credentials do not match our records.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
