<?php
/**
 * Created by PhpStorm.
 * User: jicb
 * Date: 2016/9/29
 * Time: 14:36
 */
namespace App\Services\Wechat;

use App\Wechat\Address;
use App\Wechat\Member;
use Illuminate\Http\Request;

class LogisticsService{
    public function delivery($openid){
        $member_id = CommonService::getMemberid($openid);
        return view('wechat.logistics.delivery')->with('member_id',$member_id);        
    }

    public function userAddress($request){
        $member_id = $request->input('member_id');
        $type = $request->input('type');
        $data = CommonService::getSendOrReceiveData($member_id,$type);        
        $info = $type == 1 ? "发货方信息":"收货方信息";
        $all = CommonService::getAllAddress("oLsBZxNMEZQEL8STHlrEaSu5mwD8");

        return view('wechat.logistics.useraddress')
            ->with('data',$data)
            ->with('title',$info)
            ->with('type',$type)
            ->with('all',$all);
    }
}