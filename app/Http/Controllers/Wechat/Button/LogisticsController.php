<?php

namespace App\Http\Controllers\Wechat\Button;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;



class LogisticsController extends Controller
{
    //
    public function delivery(Request $request){
        $code = $request->input('code');
        $openid = self::getOpenidFromCode($code);
        dd($openid);
        return view('wechat.logistics.delivery');
    }
}
