<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;
class PaytestController extends Controller
{
    //
    public function test(Request $request){
        $options = [
            'app_id' => env('WECHAT_APPID', 'wx4f743928e74f464e'),         // AppID
            'secret' => env('WECHAT_SECRET', 'eee0fed22e5e0d429ecad9f5df9c8b8f'),     // AppSecret
            //'token' => env('WECHAT_TOKEN', '85899088'),          // Token
            //'aes_key' => env('WECHAT_AES_KEY', ''),                    // EncodingAESKey
            'payment' => [
                'merchant_id'        => '1390001802',
                'key'                => '',
                'cert_path'          => '/usr/website/wcwl/public/cert/apiclient_cert.pem', // XXX: 绝对路径！！！！
                'key_path'           => '/usr/website/wcwl/public/cert/apiclient_key.pem',      // XXX: 绝对路径！！！！
                'notify_url'         => '',       // 你也可以在下单时单独设置来想覆盖它
                // 'device_info'     => '013467007045764',
                // 'sub_app_id'      => '',
                // 'sub_merchant_id' => '',
                // ...
            ],
        ];

        $app = new Application($options);
        $payment = $app->payment;

        $attributes = [
            'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
            'body'             => 'iPad mini 16G 白色',
            'detail'           => 'iPad mini 16G 白色',
            'out_trade_no'     => '1217752501201407033233368018',
            'total_fee'        => 5388,
            'notify_url'       => 'http://wx.wancheng.org/notify', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            // ...
        ];
        $order = new Order($attributes);

        $result = $payment->prepare($order);
        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS'){
            $prepayId = $result->prepay_id;
        }
    }

    public function notify(Request $request){

    }
}
