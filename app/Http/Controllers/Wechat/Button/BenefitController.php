<?php

namespace App\Http\Controllers\Wechat\Button;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BenefitController extends Controller
{
    //
    public function numericalmall(Request $request){
        return view('wechat.expect');
    }

    public function dolehall(Request $request){
        return view('wechat.expect');
    }
}
