<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\Auth\SignupRequest;
use Illuminate\Http\Request;

interface AuthRepositoryInterface
{
    public function userSignup(SignupRequest $request);
    public function userLogin(Request $request);
    public function userLogout();
}
