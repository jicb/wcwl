<?php

namespace App\Http\Controllers\Wechat\Button;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MyselfController extends Controller
{
    //
    public function address(Request $request){
        return view('wechat.myself.address');
    }
}
