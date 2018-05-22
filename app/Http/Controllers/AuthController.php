<?php

namespace App\Http\Controllers;

use App\Service\Application;
use App\Service\Constants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    public function __construct()
    {
        $this->middleware('auth:stuff',['except' => ['login']]);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|max:16',
            'password' => 'required|min:6',
        ]);
        $credentials = [
            'phone' => $request->input('phone'),
            'password' => md5($request->input('password').Constants::USER_PASSWORD_SALT),
        ];

        $stuff_service = (new Application())->stuff_service;
        $id = $stuff_service->create($credentials);
        if ($id) {
            $token = Auth::guard($this->getGuard())->attempt($credentials); // 也可以直接guard('staffs')
            return response()->json(['result' => $token]);
        }
    }

    /*登录*/
    public function login(Request $request)
    {
        $credentials = $request->only('phone','password');
        $credentials['password'] = md5($credentials['password'].Constants::USER_PASSWORD_SALT);
        if ( $token = auth('stuff')->attempt($credentials) ) {
            return response()->json(['result' => $token]);
        } else {
            return response()->json(['result'=>false]);
        }
    }


}
