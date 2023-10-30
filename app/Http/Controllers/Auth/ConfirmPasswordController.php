<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ConfirmPasswordController extends Controller
{
    public function get() {
        return view('auth.confirm_password');
    }

    public function post(Request $request) {
        if (! Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors([
                'password' => ['The provided password does not match our records.']
            ]);
        }

        //$request->session()->passwordConfirmed();

        return redirect()->intended();
    }
}
