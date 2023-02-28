<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function userSignup(Request $request)
    {
        $this->authRepository->userSignup($request);
        return redirect()->route('get.Dashboard')->with(['success' => __('messages.user.signUpSuccess')]);
    }

    public function login(Request $request)
    {
        $resposne = $this->authRepository->userLogin($request);
        if ($resposne) {
            return redirect()->route('get.Dashboard')->with(['success' => __('messages.user.loginSuccess')]);
        } else {
            return redirect()->back()->with('error', __('messages.user.unauthorized'));
        }
    }

    public function logout()
    {
        $resposne = $this->authRepository->userLogout();
        if ($resposne) {
            return redirect()->route('login');
        }
    }
}
