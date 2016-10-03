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
use App\Wechat\Order;


class MyselfService
{
    public function employee($request)
    {
        /*if (!$request->input('openid')) {
            $code = $request->input('code');
            $openid = CommonService::getOpenidFromCode($code);
        } else {
            $openid = $request->input('openid');
        }*/
        $openid = CommonService::getOpenidFromCode($request->input('code'));
        $openid = "oLsBZxNMEZQEL8STHlrEaSu5mwD8";
        $member_id = CommonService::getMemberid($openid);
        $pricingData = Member::find($member_id)->Order()->where('order_status','1')->orderBy('created_at', 'desc')->get();
        if(!empty($pricingData)){
            $pricingData = $this->getPricingData($pricingData);
        }else{
            $pricingData = "";
        }

        return view('wechat.myself.employee')->with('pricing',$pricingData)
            ->with('member_id',$member_id);
    }

    public function myOrder($request)
    {
        //$code = $request->input('code');
        //$openid = CommonService::getOpenidFromCode($code);
        //$openid = "oLsBZxNMEZQEL8STHlrEaSu5mwD8";
        //$member_id = CommonService::getMemberid($openid);
        $member_id = $request->input('member_id');
        $orders = Member::find($member_id)->Order()->orderBy('created_at', 'desc')->get();
        $data = $this->getOrderData($orders);
        return view('wechat.myself.myorder')->with('data',$data)
                ->with('member_id',$member_id);
    }

    private function switchOrderStatus($status)
    {
        $data = "待核价";
        switch ($status) {
            case 1:
                $data = "待核价";
                break;
            case 2:
                $data = "待确定";
                break;
            case 3:
                $data = "已确认";
                break;
            case 4:
                $data = "运输中";
                break;
            case 5:
                $data = "已签收";
                break;
            case 6:
                $data = "已完成";
                break;
        }
        return $data;
    }

    private function getPricingData($orders){
        $data = [];
        foreach ($orders as $order) {
            $wayBill = Order::find($order->order_id)->Waybill;
            $temp = [];
            $temp['order_code'] = $order->order_code;
            $temp['price'] = $order->price;
            $temp['pay_status'] = $order->pay_status ? "已支付" : "未支付";
            $temp['order_status'] = $this->switchOrderStatus($order->order_status);
            $temp['employee_get'] = $wayBill->from_name;
            $temp['employee_send'] = $wayBill->to_name;
            $temp['created_at'] = $order->created_at;
            $temp['end_at'] = $order->end_at;
            $data[] = $temp;
        }
        return json_encode($data);
    }

    private function getOrderData($orders)
    {
        $notend = [];
        $ended = [];
        foreach ($orders as $order) {
            $wayBill = Order::find($order->order_id)->Waybill;
            $temp = [];
            $temp['order_code'] = $order->order_code;
            $temp['price'] = $order->price;
            $temp['pay_status'] = $order->pay_status ? "已支付" : "未支付";
            $temp['order_status'] = $this->switchOrderStatus($order->order_status);
            $temp['employee_get'] = $wayBill->from_name;
            $temp['employee_send'] = $wayBill->to_name;
            $temp['created_at'] = $order->created_at;
            $temp['end_at'] = $order->end_at;
            if($order->order_status == 6){
                $ended[] = $temp;
            }else{
                $notend[] = $temp;
            }
        }
        return json_encode(array('notend'=>$notend,'ended'=>$ended));
    }

    public function myself($request)
    {
        //$openid = "";
        if (!$request->input('openid')) {
            $code = $request->input('code');
            $openid = CommonService::getOpenidFromCode($code);
        } else {
            $openid = $request->input('openid');
        }

        $openid = "oLsBZxNMEZQEL8STHlrEaSu5mwD8";
        $member_id = CommonService::getMemberid($openid);
        //$orders = Member::find($member_id)->Order;        
        return view('wechat.myself.myself')
            ->with('member_id', $member_id)
            ->with('openid', $openid);
    }

    public function addressTotop($request)
    {
        $type = $request->input('type');
        $addr_id = $request->input('addr_id');
        $priority = $request->input('priority');
        $member_id = $request->input('member_id');

        $addr = Address::find($addr_id);
        $addr->priority = $priority;
        $addr->save();

        $data = Address::where('type', $type)->where('member_id', $member_id)->orderBy('priority', 'desc')->get();
        $data = CommonService::getData($data);
        $data = json_encode(array('data' => $data));
        return $data;
    }

    public function addressDelete($request)
    {
        $type = $request->input('type');
        $addr_id = $request->input('addr_id');
        $member_id = $request->input('member_id');
        Address::destroy($addr_id);

        $data = Address::where('type', $type)->where('member_id', $member_id)->orderBy('priority', 'desc')->get();
        $data = CommonService::getData($data);
        $data = json_encode(array('data' => $data));
        return $data;
    }

    public function addressCreate($request)
    {
        $member_id = $request->input('member_id');
        $type = $request->input('type');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $pca = $request->input('pca');
        $street = $request->input('street');
        $priority = $this->getMaxPriotity($member_id, $type);
        Address::firstOrCreate([
            'member_id' => $member_id,
            'type' => $type,
            'name' => $name,
            'phone' => $phone,
            'pca' => $pca,
            'street' => $street,
            'priority' => $priority,
        ]);

        $data = Address::where('member_id', $member_id)->where('type', $type)->orderBy('priority', 'desc')->get();
        $data = CommonService::getData($data);
        $data = json_encode(array('data' => $data, 'type' => $type));
        return $data;
    }

    public function viewAddress($openid)
    {
        $data = CommonService::getAllAddress($openid);
        return view('wechat.myself.address')->with('data', $data);
    }

    public function viewCommonAddress($request)
    {
        $data = CommonService::getAllAddress($request->input('openid'));
        return view('wechat.myself.commonaddress')->with('data', $data)->with('openid', $request->input('openid'));
    }

    private function getMaxPriotity($member_id, $type)
    {
        $priority = 1;
        $address = Address::where('member_id', $member_id)->where('type', $type)->orderBy('priority', 'desc')->first();
        if ($address) {
            return $address->priority + 2;
        }
        return $priority;
    }
}