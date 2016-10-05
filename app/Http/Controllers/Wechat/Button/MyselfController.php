<?php

namespace App\Http\Controllers\Wechat\Button;

use App\Services\Wechat\MyselfService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class MyselfController extends Controller
{
    //
    public function address(Request $request){
        $code = $request->input('code');
        $openid = self::getOpenidFromCode($code);
        //$openid = "oLsBZxNMEZQEL8STHlrEaSu5mwD8";
        $service = new MyselfService();
        return $service->viewAddress($openid);
        
    }

    public function commonaddress(Request $request){        
        $service = new MyselfService();
        return $service->viewCommonAddress($request);

    }

    public function addressCreate(Request $request){
        $service = new MyselfService();
        return $service->addressCreate($request);
    }

    public function addressDelete(Request $request){
        $service = new MyselfService();        
        return $service->addressDelete($request);
    }
    
    public function addresstotop(Request $request){
        $service = new MyselfService();
        return $service->addressTotop($request);
    }
    
    public function balance(Request $request){
        return view('wechat.expect');
    }

    public function myself(Request $request){
        $service = new MyselfService();
        return $service->myself($request);
    }

    public function order(Request $request){        
        $service = new MyselfService();
        return $service->myOrder($request);
    }

    public function numerical(Request $request){
        return view('wechat.expect');
    }

    public function coupon(Request $request){
        return view('wechat.expect');
    }
    
    public function employee(Request $request){        
        $service = new MyselfService();
        return $service->employee($request);
    }

    public function getOrder(Request $request){
        $service = new MyselfService();
        return $service->getOrder($request);
    }
    
    public function quote(Request $request){
        $service = new MyselfService();
        return $service->quote($request);
    }

    public function ordersure(Request $request){
        $service = new MyselfService();
        return $service->ordersure($request);
    }

    public function sendedsure(Request $request){
        $service = new MyselfService();
        return $service->sendedsure($request);
    }
}
