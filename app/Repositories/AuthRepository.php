<?php

namespace App\Repositories;

use App\Http\Requests\Auth\SignupRequest;
use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthRepository implements AuthRepositoryInterface
{
    public function userSignup(SignupRequest $request)
    {
        try {
            if (isset($request->password)) {
                $password = $request->password;
            } else {
                $password = Str::random(20);
            }
            $user = User::create([
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'slug' => $request->slug,
                'email' => $request->email,
                'password' => Hash::make($password),
                'mobile_number' => $request->mobile,
            ])->assignRole('customer');
            if (!Auth::user()) {
                Auth::login($user);
            }
            return $user;
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('messages.serverError'));
        }
    }

    public function userLogin(Request $request)
    {
        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $authUser = Auth::guard('web')->user();
                return $authUser;
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('messages.serverError'));
        }
    }

    public function userLogout()
    {
        try {
            Auth::logout();
            return response()->json(['success' => __('messages.user.logout')]);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('messages.serverError'));
        }
    }
}
