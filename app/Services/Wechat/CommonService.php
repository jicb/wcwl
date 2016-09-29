<?php
/**
 * Created by PhpStorm.
 * User: jicb
 * Date: 2016/9/29
 * Time: 14:37
 */
namespace App\Services\Wechat;

use App\Wechat\Member;
use App\Wechat\Address;

class CommonService{
    public static function getMemberid($openid){
        $member = Member::where('openid',$openid)->first();
        if(!$member){
            
        }
        return $member->member_id;
    }

    public static function getAllAddress($openid){
        $member_id = CommonService::getMemberid($openid);
        $send = Address::where('member_id',$member_id)->where('type',1)->orderBy('priority','desc')->get();
        $receive = Address::where('member_id',$member_id)->where('type',2)->orderBy('priority','desc')->get();

        $dataSend = self::getData($send);
        $dataReceive = self::getData($receive);

        $data = json_encode(array('send'=>$dataSend,'receive'=>$dataReceive,'member_id'=>$member_id));


        return $data;
    }

    public static function getSendOrReceiveData($member_id,$type){
        $data = Address::where('member_id',$member_id)->where('type',$type)->orderBy('priority','desc')->get();        

        $data = self::getData($data);          
        $data = json_encode(array('data'=>$data,'member_id'=>$member_id));
        return $data;
    }   
    

    private static function getData($data){
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
            $temp['member_id'] = $item->member_id;
            $returnData[] = $temp;
        }
        return $returnData;
    }
}