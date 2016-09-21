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
        $tag = $wechat->user_tag;
        //$tag->batchTagUsers("oLsBZxNMEZQEL8STHlrEaSu5mwD8",100);
    }

    public function createtag(Request $request){
        $wechat = app('wechat');
        $tag = $wechat->user_tag;
        $tag->create("揽件员");

        dd($tag->lists());
    }
}
