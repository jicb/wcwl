<?php
/**
 * Created by PhpStorm.
 * User: jicb
 * Date: 2016/9/27
 * Time: 16:12
 */
namespace App\Services\Wechat;

use App\Wechat\Address;
use App\Wechat\Member;

class MyselfService{
    public function viewAddress($openid){
        $member_id = $this->getMemberid($openid);
        $send = Address::where('member_id',$member_id)->where('type',1)->orderBy('priority','desc')->get();
        $receive = Address::where('member_id',$member_id)->where('type',2)->orderBy('priority','desc')->get();

        $dataSend = $this->getData($send);
        $dataReceive = $this->getData($receive);

        $data = json_encode(array('send'=>$dataSend,'receive'=>$dataReceive,'member_id'=>$member_id));


        return view('wechat.myself.address')->with('data',$data);
    }

    private function getMemberid($openid){
        $member = Member::where('openid',$openid)->first();
        if(!$member){

        }
        return $member->member_id;
    }

    private function getData($data){
        $returnData = [];
        foreach ($data as $item){
            $temp = [];
            $temp['addr_id'] = $item->addr_id;
            $temp['type'] = $item->type;
            $temp['priority'] = $item->priority;
            $temp['name'] = $item->name;
            $temp['phone'] = $item->phone;
            $temp['pca'] = $item->pca;
            $temp['street'] = $item->street;
            $returnData[] = $temp;
        }
        return $returnData;
    }
}