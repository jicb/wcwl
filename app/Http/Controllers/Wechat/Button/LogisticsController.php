<?php

namespace App\Http\Controllers\Wechat\Button;

use App\Services\Wechat\LogisticsService;
use EasyWeChat\Support\Log;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;



class LogisticsController extends Controller
{
    //
    public function delivery(Request $request){
        //$code = $request->input('code');
        //$openid = self::getOpenidFromCode($code);
        $openid = "oLsBZxNMEZQEL8STHlrEaSu5mwD8";
        $service = new LogisticsService();
        return $service->delivery($openid);   
    }
    
    public function useraddress(Request $request){
        $service = new LogisticsService();
        return $service->userAddress($request);        
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
