<?php

namespace App\Repositories;

use App\Http\Requests\Auth\SignupRequest;
use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthRepository implements AuthRepositoryInterface
{
    public function userSignup(SignupRequest $request)
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
