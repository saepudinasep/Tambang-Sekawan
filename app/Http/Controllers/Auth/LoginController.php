<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'login' => 'required',
            'password' => 'required|min:8',
        ], [
            'login.required' => 'Username or Email is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
        ]);

        if ($validator->fails()) {
            // toastr()->error('username or password is incorrect');
            return redirect()->route('login');
        }


        // login with email or username
        $login = request()->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        if (auth()->attempt(array($field => $input['login'], 'password' => $input['password']))) {
            $role = auth()->user()->role;

            if (isset($role)) {
                return redirect()->route(auth()->user()->getRole->nama_role . '.dashboard')->with('success', 'Login Successfully');
            } else {
                auth()->logout();
                return redirect()->route('login')->with('error', 'username or password is incorrect');
            }
        } else {
            Auth::logout();
            return redirect()->route('login')->with('error', 'username or password is incorrect');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Successfully');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
}
