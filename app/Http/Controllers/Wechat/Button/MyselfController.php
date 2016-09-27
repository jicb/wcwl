<?php

namespace App\Http\Controllers\Wechat\Button;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class MyselfController extends Controller
{
    //
    public function address(Request $request){
        $code = $request->input('code');
        dd($code);
        $openid = self::getOpenidFromCode($code);

        return view('wechat.myself.address');
    }
}
