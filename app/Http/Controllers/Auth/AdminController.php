<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Vonage\Message\Shortcode\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function AdminLoginForm()
    {
        return view('auth.admin.login');
    }

    public function AdminLogin(Request $request)
    {
        $credential = $request->only(['email', 'password']);
        if (Auth::guard('admin')->attempt($credential, $request->filled('remember'))) {
            return redirect()->route('admin.dashboard');
        } else {
            throw ValidationException::withMessages([
                'email' => 'Invalid email or password'
            ]);
        }
    }
    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login.form'));
    }
}
