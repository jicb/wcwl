<?php

namespace App\Http\Controllers\Wechat\H5\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //
    public function register(Request $request, $openid)
    {
        return view('wechat.auth.register')->with('openid', $openid);
    }
}
