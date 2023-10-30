<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostLoginRequest;


class LoginController extends Controller
{
    public function get(): View
    {
        return view('auth.login');
    }

    public function post(PostLoginRequest $request): RedirectResponse
    {
        $rememberMe = $request->filled('rememberme');
        /*
        $isLogged = Auth::attemptWhen([
        'email' => $email,
        'password' => $password,
        'active' => 1,
        fn (Builder $query) => $query->has('activeSubscription'), //sql query level
        ], function (User $user) {
        return $user->isNotBanned(); //resul level
        });
        */
        $isLogged = Auth::attempt($request->only('email', 'password'), $rememberMe);

        //Auth::once($credentials);

        if ($isLogged) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('login_status', 'You are logged.');
        }

        /*throw ValidationException::withMessages([
        'email' => __('auth.failed')
        ]);*/

        //return redirect()->intended('login')->with('login_status', 'Login failed.');

        return back()->withErrors([
            'login_status' => 'Login failed.'
        ]);
    }
}
