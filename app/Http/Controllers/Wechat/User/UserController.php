<?php

namespace App\Http\Controllers\Wechat\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function adduser(Request $request){

    }

    public function creategroup(Request $request){
        $wechat = app('wechat');
        $group = $wechat->user_group;
        $group->create("收货员");

        dd($group->lists());
    }
}
