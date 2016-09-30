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
use GuzzleHttp\Client;

class MyselfService{

    public function myOrder($request){
        $currentUrl = $request->url;
        $client = new Client();
        $config = config('wechat');

        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$config['app_id']."&redirect_uri=".$currentUrl."&action=viewtest&response_type=code&scope=snsapi_base&state=1#wechat_redirect";
        $body =$client
            ->get($url)
            ->getBody();
        dd($body);
    }

    public function addressTotop($request){
        $type = $request->input('type');
        $addr_id = $request->input('addr_id');
        $priority = $request->input('priority');
        $member_id = $request->input('member_id');
        
        $addr = Address::find($addr_id);
        $addr->priority = $priority;
        $addr->save();

        $data = Address::where('type',$type)->where('member_id',$member_id)->orderBy('priority','desc')->get();
        $data = CommonService::getData($data);
        $data = json_encode(array('data'=>$data));
        return $data;
    }

    public function addressDelete($request){
        $type = $request->input('type');
        $addr_id = $request->input('addr_id');
        $member_id = $request->input('member_id');
        Address::destroy($addr_id);

        $data = Address::where('type',$type)->where('member_id',$member_id)->orderBy('priority','desc')->get();
        $data = CommonService::getData($data);
        $data = json_encode(array('data'=>$data));
        return $data;
    }

    public function addressCreate($request){
        $member_id = $request->input('member_id');
        $type = $request->input('type');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $pca = $request->input('pca');
        $street = $request->input('street');
        $priority = $this->getMaxPriotity($member_id,$type);
        Address::firstOrCreate([
            'member_id'=>$member_id,
            'type' =>$type,
            'name'=>$name,
            'phone'=>$phone,
            'pca'=>$pca,
            'street'=>$street,
            'priority'=>$priority,
        ]);        
        
        $data = Address::where('member_id',$member_id)->where('type',$type)->orderBy('priority','desc')->get();
        $data = CommonService::getData($data);
        $data = json_encode(array('data'=>$data,'type'=>$type));
        return $data;
    }

    public function viewAddress($openid){
        $data = CommonService::getAllAddress($openid);     
        return view('wechat.myself.address')->with('data',$data);
    }
    

    

    private function getMaxPriotity($member_id,$type){
        $priority = 1;
        $address = Address::where('member_id',$member_id)->where('type',$type)->orderBy('priority','desc')->first();
        if($address){
            return $address->priority+2;
        }
        return $priority;
    }
}