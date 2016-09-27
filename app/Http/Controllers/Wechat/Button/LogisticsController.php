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
        dd($code);
        $openid = self::getOpenidFromCode($code);
        if($openid){
            return view('wechat.logistics.delivery')->with('openid',$openid);
        }
        view('wechat.auth.returnwechat');
        return view('wechat.logistics.delivery')->with('openid','123456');
        //return view('wechat.logistics.vuetest');
    }
    
    public function useraddress(Request $request){
        return view('wechat.logistics.useraddress')
            ->with('openid',$request->input('openid'))
            ->with('method',$request->input('method'));
    }

    public function useraddressselect(Request $request){
        return view('wechat.logistics.useraddressselect')
            ->with('testArray',json_encode(['hello'=>'guizi','hehe'=>'gaga']));
    }
}
