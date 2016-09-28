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
    public function addressTotop($request){
        $type = $request->input('type');
        $addr_id = $request->input('addr_id');
        $priority = $request->input('priority');
        $member_id = $request->input('member_id');
        
        $addr = Address::find($addr_id);
        $addr->priority = $priority;
        $addr->save();

        $data = Address::where('type',$type)->where('member_id',$member_id)->orderBy('priority','desc')->get();
        $data = $this->getData($data);
        $data = json_encode(array('data'=>$data));
        return $data;
    }

    public function addressDelete($request){
        $type = $request->input('type');
        $addr_id = $request->input('addr_id');
        $member_id = $request->input('member_id');
        Address::destroy($addr_id);

        $data = Address::where('type',$type)->where('member_id',$member_id)->orderBy('priority','desc')->get();
        $data = $this->getData($data);
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
        $data = $this->getData($data);
        $data = json_encode(array('data'=>$data,'type'=>$type));
        return $data;
    }

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
        $openid = "oLsBZxNMEZQEL8STHlrEaSu5mwD8";
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
            $temp['member_id'] = $item->member_id;
            $returnData[] = $temp;
        }
        return $returnData;
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