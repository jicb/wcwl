<?php
/**
 * Created by PhpStorm.
 * User: jicb
 * Date: 2016/9/27
 * Time: 16:12
 */
namespace App\Services\Wechat;

use App\Wechat\Address;
use App\Wechat\Bal;
use App\Wechat\Coupon;
use App\Wechat\CouponType;
use App\Wechat\Member;
use App\Wechat\Order;
use App\Wechat\RechargeRule;
use App\Wechat\Vbal;
use DB;

class MyselfService
{

    public function gopay($request){
        $wechat = app('wechat');
        $notice = $wechat->notice;


        //$order_code = Order::find($request->order_id)->order_code;
        $userId = Member::find($request->member_id)->openid;


        $templateId = 'waQfGFsYkAkn3o-601lZ4oohHIIMet30Lod5vIWgGKo';
        $url = 'http://wx.wancheng.org/wechat/expect';
        $color = '#FF0000';
        $data = array(
            "first" => "订单已支付",
            "keyword1" => "123456",
            "keyword2" => "已支付",
            "remark" => "您的订单已支付完成！",
        );
        $notice->uses($templateId)->withUrl($url)->withColor($color)->andData($data)->andReceiver($userId)->send();

        return "";
    }

    /*public function orderCashPay($request){
        $order = Order::find($request->input('order_id'));
        $order->pay_status = 1;
        $order->pay_method = 1;
        $order->save();


    }*/

    public function recharge($request)
    {
        $member_id = $request->member_id;
        $satisfied = $request->satisfied;
        $give = $request->give;
        $member = Member::find($member_id);
        $member->bal += $satisfied;
        $member->vbal += $give;
        $member->save();

        $newBal = Bal::firstOrCreate([
            'member_id' => $member_id,
            'value' => $satisfied,
            'income_type' => 1,
        ]);

        Vbal::firstOrCreate([
            'member_id' => $member_id,
            'value' => $give,
            'income_type' => 1,
            'bal_id' => $newBal->bal_id,
        ]);


        $wechat = app('wechat');
        $notice = $wechat->notice;

        $userId = Member::find($member_id)->openid;
        $templateId = '6jTgOiP_n56lga5Ucw2wwt3u47vU-eQme5XEuXSQ4Lg';
        $url = 'http://wx.wancheng.org/wechat/expect';
        $color = '#FF0000';
        $data = array(
            "first" => "充值成功",
            "keyword1" => "123456789",
            "keyword2" => $satisfied,
            "remark" => "您已充值成功，抵用金" . $give . "已存入您的个人账户！",
        );
        $notice->uses($templateId)->withUrl($url)->withColor($color)->andData($data)->andReceiver($userId)->send();

        return "";
    }

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
        $templateId = 'waQfGFsYkAkn3o-601lZ4oohHIIMet30Lod5vIWgGKo';
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
        $templateId = 'waQfGFsYkAkn3o-601lZ4oohHIIMet30Lod5vIWgGKo';
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
        $templateId = 'waQfGFsYkAkn3o-601lZ4oohHIIMet30Lod5vIWgGKo';
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
                $price = $temp['price'];
                $member_id = $order->member_id;

                //优惠券
                $coupons = Member::find($member_id)->Coupon()->where('status', '1')->get();
                $coupons_data = [];
                foreach ($coupons as $coupon) {
                    $couponInfo = CouponType::find($coupon->ctype_id);
                    $invalid = strtotime($coupon->invalid_time);


                    if ($price >= $couponInfo->satisfied_amount && $invalid >= time()) {
                        $coupon_temp = [];
                        $coupon_temp['satisfied'] = $couponInfo->satisfied_amount;
                        $coupon_temp['reduce'] = $couponInfo->reduce_amount;
                        $coupon_temp['invalid_time'] = substr($coupon->invalid_time, 0, 10);
                        $coupon_temp['coupon_id'] = $coupon->coupon_id;
                        $coupon_temp['discount'] = ($couponInfo->discount)*100;
                        $coupons_data[] = $coupon_temp;
                    }

                }
                $temp['coupons'] = $coupons_data;

                //虚拟余额
                $member =  Member::find($member_id);
                $temp['bal'] = $member->bal;
                $temp['vbal'] = $member->vbal;
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

        //充值规则
        $recharge_rules = RechargeRule::orderBy('satisfied_amount', 'asc')->get();
        $recharge_arr = [];
        foreach ($recharge_rules as $recharge_rule) {
            $temp = [];
            $temp['satisfied'] = $recharge_rule->satisfied_amount;
            $temp['give'] = $recharge_rule->give_amount;
            $temp['rg_id'] = $recharge_rule->rg_id;

            $recharge_arr[] = $temp;
        }
        $recharge = json_encode($recharge_arr);

        //我的优惠券        
        $coupons = Member::find($member_id)->Coupon()->where('status', '<>', '4')->get();
        $coupons_data = [];
        foreach ($coupons as $coupon) {
            $couponInfo = CouponType::find($coupon->ctype_id);
            $temp['satisfied'] = $couponInfo->satisfied_amount;
            $temp['reduce'] = $couponInfo->reduce_amount;
            $temp['invalid_time'] = substr($coupon->invalid_time, 0, 10);
            $temp['coupon_id'] = $coupon->coupon_id;

            $temp['discount'] = ($couponInfo->discount) * 100;
            $coupons_data[] = $temp;
        }
        $coupons = json_encode($coupons_data);


        $member_phone = substr_replace($member_phone, '****', 3, 4);
        $member_name = substr_replace($member_name, '*', 0, 3);
        return view('wechat.myself.myself')
            ->with('member_id', $member_id)
            ->with('openid', $openid)
            ->with('member_name', $member_name)
            ->with('member_phone', $member_phone)
            ->with('member_bal', $member_bal)
            ->with('member_vbal', $member_vbal)
            ->with('member_points', $member_points)
            ->with('recharge_rules', $recharge)
            ->with('coupons', $coupons);
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