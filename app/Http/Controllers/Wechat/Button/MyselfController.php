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

        $service = new MyselfService();
        return $service->viewAddress($openid);
        
    }
}
