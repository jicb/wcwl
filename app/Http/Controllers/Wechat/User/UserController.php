<?php

namespace App\Http\Controllers\Wechat\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function adduser(Request $request){
        $wechat = app('wechat');
        $group = $wechat->user_group;
        $group->moveUser(["oLsBZxF7dknqqY9oGJtEVreG5Ot4"],101);
        dd($group->userGroup("oLsBZxF7dknqqY9oGJtEVreG5Ot4"));
    }

    public function create(Request $request){
        $wechat = app('wechat');
        $group = $wechat->user_group;
        $group->create("揽件员");
    }
}
