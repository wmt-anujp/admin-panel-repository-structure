<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface AuthRepositoryInterface
{
    public function userSignup(Request $request);
    public function userLogin(Request $request);
    public function userLogout();
}
