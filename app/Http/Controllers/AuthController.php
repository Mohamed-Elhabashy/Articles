<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return View('login');
    }

    public function SubmitLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:191',
            'password' => 'required|max:191',
        ]);
        if (! auth()->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return back();
        }
        return redirect(route('HomeDashboard.index'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('login'));
    }
}
