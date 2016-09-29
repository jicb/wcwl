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
        if($openid){
            return view('wechat.logistics.delivery')->with('openid',$openid);
        }       
        
    }
    
    public function useraddress(Request $request){
        return view('wechat.logistics.useraddress')
            ->with('openid',$request->input('openid'))
            ->with('method',$request->input('method'));
    }

    public function useraddressselect(Request $request){
        return view('wechat.logistics.useraddressselect');
    }

    public function freightaging(Request $request){
        return view('wechat.expect');
    }

    public function netquery(Request $request){
        return view('wechat.expect');
    }

    public function takerange(Request $request){
        return view('wechat.expect');
    }
}
