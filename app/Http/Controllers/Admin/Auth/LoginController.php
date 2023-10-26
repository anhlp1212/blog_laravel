<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('admin.auth.login');
        }
        else if ($request->getMethod() == 'POST') {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = $request->only(['email', 'password']);
            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->withInput()->with('error_pw_e', 'Email or Password not true');
            }
        }
    }
}
