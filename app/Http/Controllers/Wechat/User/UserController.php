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
        /*$group = $wechat->user_group;
        $group->moveUser("oLsBZxN9JI56Uv8RyD62DEc4_YYQ",101);*/

        $group = $wechat->user_group;
        $menu = $wechat->menu;
        $data = [
            $menu->all(),
            $menu->test("oLsBZxNMEZQEL8STHlrEaSu5mwD8"),
            $group->userGroup("oLsBZxNMEZQEL8STHlrEaSu5mwD8"),
            $menu->test("oLsBZxN9JI56Uv8RyD62DEc4_YYQ"),
            $group->userGroup("oLsBZxN9JI56Uv8RyD62DEc4_YYQ")
        ];
        dd($data);
    }

    public function create(Request $request){
        $wechat = app('wechat');
        $group = $wechat->user_group;
        $group->create("揽件员");
    }
}
