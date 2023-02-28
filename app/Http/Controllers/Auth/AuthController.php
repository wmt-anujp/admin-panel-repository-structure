<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signUp(Request $request)
    {
        try {
            $user = User::create([
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'slug' => $request->slug,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobile_number' => $request->mobile,
            ])->assignRole('customer');
            Auth::login($user);
            return redirect()->route('get.Dashboard')->with(['success' => __('messages.user.signUpSuccess')]);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('messages.serverError'));
        }
    }

    public function login(Request $request)
    {
        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('get.Dashboard')->with(['success' => __('messages.user.loginSuccess')]);
            } else {
                return redirect()->back()->with('error', __('messages.user.unauthorized'));
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('messages.serverError'));
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            return redirect()->route('login');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('messages.serverError'));
        }
    }
}
