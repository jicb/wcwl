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
use App\Wechat\Order;
use App\Wechat\Waybill;
use Illuminate\Http\Request;
use Log;

class LogisticsService{

    public function orderToUser($request){

        $order_id = $request->input('order_id');
        $order = Order::find($order_id);
        $bill = Waybill::where('order_id',$order_id)->first();

        Log::info('hello '.$order->order_code." ".$bill->waybill_code);
        $app = app('wechat');
        $broadcast = $app->broadcast;
        $text = "您好，您已生成订单,单号：".$order->order_code.
                ",运单号：".$bill->waybill_code;
        $broadcast->previewText($text, $request->input('openid'));
    }

    public function createOrder($request){
        //生成运单号
        $orderCode = CommonService::createOrderCode($request->input('member_id'));

        //生成订单
        Order::firstOrCreate([
            'order_code'=>$orderCode,
            'member_id' =>$request->input('member_id'),
            'price'=>$request->input('cargo_fare'),
            'order_status'=>1,
        ]);

        //查找刚才生成的订单id
        $order = Order::where('order_code',$orderCode)->first();
        $order_id = $order->order_id;

        //生成运单
        Waybill::firstOrCreate([
            'waybill_code'=>date('Hms'),
            'order_id'=>$order_id,
            'from_name'=>$request->input('from_name'),
            'from_phone'=>$request->input('from_phone'),
            'from_pca'=>$request->input('from_pca'),
            'from_street'=>$request->input('from_street'),
            'to_name'=>$request->input('to_name'),
            'to_phone'=>$request->input('to_phone'),
            'to_pca'=>$request->input('to_pca'),
            'to_street'=>$request->input('to_street'),
            'cargo_name'=>$request->input('cargo_name'),
            'cargo_count'=>$request->input('cargo_count'),
            'cargo_weight'=>$request->input('cargo_weight'),
            'cargo_volume'=>$request->input('cargo_volume'),
            'cargo_insure'=>$request->input('cargo_insure'),
            'price'=>$request->input('cargo_fare'),
            'exchange_type'=>CommonService::switchExchange($request->input('exchange_type')),
            'receipt_type'=>CommonService::switchReceipt($request->input('receipt_type')),
            'price'=>$request->input('price'),
            'comment'=>$request->input('comment'),
        ]);

        return array('order_id'=>$order_id);
    }

    public function delivery($openid){
        $member_id = CommonService::getMemberid($openid);
        $data = CommonService::getAllAddress($openid);
        return view('wechat.logistics.delivery')
            ->with('member_id',$member_id)
            ->with('openid',$openid)
            ->with('data',$data);        
    }

    /*public function userAddress($request){
        $member_id = $request->input('member_id');
        $type = $request->input('type');
        $data = CommonService::getSendOrReceiveData($member_id,$type);        
        $info = $type == 1 ? "发货方信息":"收货方信息";

        return view('wechat.logistics.useraddress')
            ->with('data',$data)
            ->with('title',$info)
            ->with('type',$type);
    }*/
}