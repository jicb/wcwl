<?php

namespace App\Http\Controllers\Wechat\Button;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;



class LogisticsController extends Controller
{
    //
    public function delivery(Request $request){
        /*$code = $request->input('code');
        $openid = self::getOpenidFromCode($code);
        if($openid){
            return view('wechat.logistics.delivery')->with('openid',$openid);
        }
        view('wechat.auth.returnwechat');*/
        return view('wechat.logistics.delivery');
    }
    
    public function useraddress(Request $request){
        return view('wechat.logistics.useraddress');
    }

    public function senduseraddress(Request $request){
        return view('wechat.logistics.senduseraddress');
    }
}
