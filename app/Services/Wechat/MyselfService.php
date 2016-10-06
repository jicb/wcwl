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

    /*public function orderCashPay($request){
        $order = Order::find($request->input('order_id'));
        $order->pay_status = 1;
        $order->pay_method = 1;
        $order->save();


    }*/

    public function ordersure($request)
    {
        $order = Order::find($request->input('order_id'));
        $order->order_status = 4;
        $order->save();

        $wechat = app('wechat');
        $notice = $wechat->notice;

        $member_id = $request->member_id;
        $order_code = $request->order_code;
        $userId = Member::find($member_id)->openid;
        $templateId = 'SlhSxAy5WvFB02h9EO7ivzlFAMmv0KwF7XraZbldrGA';
        $url = 'http://wx.wancheng.org/wechat/expect';
        $color = '#FF0000';
        $data = array(
            "first" => "订单已确定成功",
            "keyword1" => $order_code,
            "keyword2" => "运输中",
            "remark" => "您的订单已确定成功，正在运输中，请耐心等待！",
        );
        $notice->uses($templateId)->withUrl($url)->withColor($color)->andData($data)->andReceiver($userId)->send();


        /*$member  = $order->Member;
        $employee_get = Order::find($request->input('order_id'));
        $employee = $employee_get->Member;
        $app = app('wechat');
        $broadcast = $app->broadcast;
        $text = "您好，您的订单已被".$employee->name."报价,单号：".$order->order_code."报价：".$order->price;
        $broadcast->previewText($text, $member->openid);*/

        return "";

    }

    public function sendedsure($request)
    {
        $order = Order::find($request->input('order_id'));
        $order->order_status = 5;
        $order->save();

        $wechat = app('wechat');
        $notice = $wechat->notice;

        $member_id = $request->member_id;
        $order_code = $request->order_code;
        $userId = Member::find($member_id)->openid;
        $templateId = 'SlhSxAy5WvFB02h9EO7ivzlFAMmv0KwF7XraZbldrGA';
        $url = 'http://wx.wancheng.org/wechat/expect';
        $color = '#FF0000';
        $data = array(
            "first" => "订单已签收",
            "keyword1" => $order_code,
            "keyword2" => "已签收",
            "remark" => "您的订单已签收，若未支付，请尽快完成支付！",
        );
        $notice->uses($templateId)->withUrl($url)->withColor($color)->andData($data)->andReceiver($userId)->send();

        //通知揽件员

        $userId = Member::find($order->employee_get)->openid;
        $templateId = 'SlhSxAy5WvFB02h9EO7ivzlFAMmv0KwF7XraZbldrGA';
        $url = 'http://wx.wancheng.org/wechat/expect';
        $color = '#FF0000';
        $data = array(
            "first" => "订单已被用户签收",
            "keyword1" => $order_code,
            "keyword2" => "已签收",
            "remark" => "您的揽件已签收，若对方未支付，请尽快通知对方支付！",
        );
        $notice->uses($templateId)->withUrl($url)->withColor($color)->andData($data)->andReceiver($userId)->send();


        /*$member  = $order->Member;
        $employee_get = Order::find($request->input('order_id'));
        $employee = $employee_get->Member;
        $app = app('wechat');
        $broadcast = $app->broadcast;
        $text = "您好，您的订单已被".$employee->name."报价,单号：".$order->order_code."报价：".$order->price;
        $broadcast->previewText($text, $member->openid);*/

        return "";

    }

    public function quote($request)
    {
        $order = Order::find($request->input('order_id'));
        $order->order_status = 3;
        $order->price = $request->input('price');
        $order->save();


        /*$member  = $order->Member;
        $employee_get = Order::find($request->input('order_id'));
        $employee = $employee_get->Member;
        $app = app('wechat');
        $broadcast = $app->broadcast;
        $text = "您好，您的订单已被".$employee->name."报价,单号：".$order->order_code."报价：".$order->price;
        $broadcast->previewText($text, $member->openid);*/

        return "";

    }

    public function getOrder($request)
    {
        $order = Order::find($request->input('order_id'));
        $order->order_status = 2;
        $order->employee_get = $request->input('member_id');
        $order->save();


        /* $employee_get = Order::find($request->input('order_id'));
         $member  = $order->Member;
         $employee = $employee_get->Member;
         $app = app('wechat');
         $broadcast = $app->broadcast;
         $text = "您好，您的订单已被".$employee->name."收揽,单号：".$order->order_code;
         $broadcast->previewText($text, $member->openid);*/

        return "";

    }

    public function employee($request)
    {

        $openid = CommonService::getOpenidFromCode($request->input('code'));
        //$openid = "oLsBZxNMEZQEL8STHlrEaSu5mwD8";
        $member_id = CommonService::getMemberid($openid);
        $pricingData = Order::where('order_status', '1')->orderBy('created_at', 'desc')->get();
        $moneyData = Order::where('order_status', '2')->where('employee_get', $member_id)->orderBy('created_at', 'desc')->get();
        if (!empty($moneyData)) {
            $moneyData = $this->getPricingData($moneyData);
        } else {
            $moneyData = "";
        }
        if (!empty($pricingData)) {
            $pricingData = $this->getPricingData($pricingData);
        } else {
            $pricingData = "";
        }

        return view('wechat.myself.employee')
            ->with('pricing', $pricingData)
            ->with('member_id', $member_id)
            ->with('money', $moneyData);
    }

    public function myOrder($request)
    {
        $member_id = $request->input('member_id');
        $orders = Member::find($member_id)->Order()->orderBy('created_at', 'desc')->get();
        $data = $this->getOrderData($orders);
        return view('wechat.myself.myorder')->with('data', $data)
            ->with('member_id', $member_id);
    }

    private function switchOrderStatus($status)
    {
        $data = "待核价";
        switch ($status) {
            case 1:
                $data = "待揽件";
                break;
            case 2:
                $data = "待报价";
                break;
            case 3:
                $data = "待确任";
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


    private function getPricingData($orders)
    {
        $data = [];
        foreach ($orders as $order) {
            $wayBill = Order::find($order->order_id)->Waybill;
            $temp = [];
            $temp['order_code'] = $order->order_code;
            $temp['order_id'] = $order->order_id;
            $temp['price'] = $order->price;
            $temp['pay_status_flag'] = $order->pay_status;
            if ($order->pay_status) {
                if ($order->pay_method == 1) {
                    $temp['pay_status'] = "已现金支付";
                } else {
                    $temp['pay_status'] = "已支付";
                }
            } else {
                $temp['pay_status'] = "未支付";
            }
            //$temp['pay_status'] = $order->pay_status ? "已支付" : "未支付";
            $temp['order_status_id'] = $order->order_status;
            $temp['order_status'] = $this->switchOrderStatus($order->order_status);
            $temp['employee_get'] = $order->employee_get;
            $temp['from_name'] = $wayBill->from_name;
            $temp['from_phone'] = $wayBill->from_phone;
            $temp['from_pca'] = $wayBill->from_pca;
            $temp['from_street'] = $wayBill->from_street;
            $temp['to_name'] = $wayBill->to_name;
            $temp['to_phone'] = $wayBill->to_phone;
            $temp['to_pca'] = $wayBill->to_pca;
            $temp['to_street'] = $wayBill->to_street;
            $temp['cargo_name'] = $wayBill->cargo_name;
            $temp['cargo_weight'] = $wayBill->cargo_weight;
            $temp['cargo_count'] = $wayBill->cargo_count;
            $temp['cargo_volume'] = $wayBill->cargo_volume;
            $temp['cargo_insure'] = $wayBill->cargo_insure;
            $temp['exchange_type'] = CommonService::reSwitchExchange($wayBill->exchange_type);
            $temp['receipt_type'] = CommonService::reSwitchReceipt($wayBill->receipt_type);
            $temp['comment'] = $wayBill->comment;
            $temp['employee_send'] = $order->employee_send;
            $temp['created_at'] = date("Y-m-d H:m:s", strtotime($order->created_at));
            $temp['end_at'] = date("Y-m-d H:m:s", strtotime($order->end_at));
            $temp['pay_method'] = CommonService::reSwitchPayMethod($order->pay_method);
            $temp['pay_flag'] = false;
            $temp['sure_flag'] = false;
            $temp['sended_flag'] = false;

            if (!$temp['pay_status_flag'] && ($temp['order_status_id'] == 4 || $temp['order_status_id'] == 5)) {
                $temp['pay_flag'] = true;
            }
            if ($temp['order_status_id'] == 3) {
                $temp['sure_flag'] = true;
            } else if ($temp['order_status_id'] == 4) {
                $temp['sended_flag'] = true;
            }

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
            $temp['order_id'] = $order->order_id;
            $temp['price'] = $order->price;
            $temp['pay_status_flag'] = $order->pay_status;
            if ($order->pay_status) {
                if ($order->pay_method == 1) {
                    $temp['pay_status'] = "已现金支付";
                } else {
                    $temp['pay_status'] = "已支付";
                }
            } else {
                $temp['pay_status'] = "未支付";
            }
            //$temp['pay_status'] = $order->pay_status ? "已支付" : "未支付";
            $temp['order_status_id'] = $order->order_status;
            $temp['order_status'] = $this->switchOrderStatus($order->order_status);
            $temp['employee_get'] = $order->employee_get;
            $temp['from_name'] = $wayBill->from_name;
            $temp['from_phone'] = $wayBill->from_phone;
            $temp['from_pca'] = $wayBill->from_pca;
            $temp['from_street'] = $wayBill->from_street;
            $temp['to_name'] = $wayBill->to_name;
            $temp['to_phone'] = $wayBill->to_phone;
            $temp['to_pca'] = $wayBill->to_pca;
            $temp['to_street'] = $wayBill->to_street;
            $temp['cargo_name'] = $wayBill->cargo_name;
            $temp['cargo_weight'] = $wayBill->cargo_weight;
            $temp['cargo_count'] = $wayBill->cargo_count;
            $temp['cargo_volume'] = $wayBill->cargo_volume;
            $temp['cargo_insure'] = $wayBill->cargo_insure;
            $temp['exchange_type'] = CommonService::reSwitchExchange($wayBill->exchange_type);
            $temp['receipt_type'] = CommonService::reSwitchReceipt($wayBill->receipt_type);
            $temp['comment'] = $wayBill->comment;
            $temp['employee_send'] = $order->employee_send;
            $temp['created_at'] = date("Y-m-d H:m:s", strtotime($order->created_at));
            $temp['end_at'] = date("Y-m-d H:m:s", strtotime($order->end_at));
            $temp['pay_method'] = CommonService::reSwitchPayMethod($order->pay_method);
            $temp['pay_flag'] = false;
            $temp['sure_flag'] = false;
            $temp['sended_flag'] = false;


            if (!$temp['pay_status_flag'] && ($temp['order_status_id'] == 4 || $temp['order_status_id'] == 5)) {
                $temp['pay_flag'] = true;
            }
            if ($temp['order_status_id'] == 3) {
                $temp['sure_flag'] = true;
            } else if ($temp['order_status_id'] == 4) {
                $temp['sended_flag'] = true;
            }

            if ($temp['order_status_id'] == 6) {
                $ended[] = $temp;
            } else {
                $notend[] = $temp;
            }
        }
        return json_encode(array('notend' => $notend, 'ended' => $ended));
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

        //$openid = "oLsBZxNMEZQEL8STHlrEaSu5mwD8";
        $member_id = CommonService::getMemberid($openid);
        
        $member = Member::find($member_id);
        $member_name = $member->name;
        $member_phone = $member->mobile;
        $member_bal = $member->bal;
        $member_vbal = $member->vbal;
        $member_points = $member->points;

        $member_phone = substr_replace($member_phone, '****', 3, 4);      
        $member_name = substr_replace($member_name, '*', 0, 3);        
        return view('wechat.myself.myself')
            ->with('member_id', $member_id)
            ->with('openid', $openid)
            ->with('member_name',$member_name)
            ->with('member_phone',$member_phone)
            ->with('member_bal',$member_bal)
            ->with('member_vbal',$member_vbal)
            ->with('member_points',$member_points);
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