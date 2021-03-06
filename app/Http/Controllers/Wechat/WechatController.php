<?php

namespace App\Http\Controllers\Wechat;

use App\Wechat\Member;
use EasyWeChat\Message\Text;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WechatController extends Controller
{
    //


    public function expect(){
        return view('wechat.expect');
    }
    public function template(Request $request)
    {
        $wechat = app('wechat');
        $notice = $wechat->notice;
        //$notice->setIndustry(14,15);


        $userId = 'oLsBZxNMEZQEL8STHlrEaSu5mwD8';
        $templateId = 'waQfGFsYkAkn3o-601lZ4oohHIIMet30Lod5vIWgGKo';
        $url = 'http://wx.wancheng.org/wechat/expect';
        $color = '#FF0000';
        $data = array(
            "first" => "订单已生成",
            "keyword1" => "1234567890",
            "keyword2" => "待揽件",
            "remark" => "您已生成订单，请耐心等待揽件！",
        );
        $result = $notice->uses($templateId)->withUrl($url)->withColor($color)->andData($data)->andReceiver($userId)->send();
        dd($result);
    }

    public function menuadd(Request $request)
    {

        $config = config('wechat');
        $wechat = app('wechat');
        $menu = $wechat->menu;
        $menu->destroy();
        $urlPre = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $config['app_id'] . "&redirect_uri=";
        $urlEnd = "&action=viewtest&response_type=code&scope=snsapi_base&state=1#wechat_redirect";
        $button = [
            [
                "name" => "物流服务",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "我要发货",
                        "url" => "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $config['app_id'] . "&redirect_uri=http://wx.wancheng.org/button/logistics/delivery&action=viewtest&response_type=code&scope=snsapi_base&state=1#wechat_redirect"
                    ],
                    [
                        "type" => "view",
                        "name" => "运单查询",
                        "url" => "http://tydwx.1008656.com/LQWeiXin/index.jsp?id=58311",
                    ],
                    [
                        "type" => "view",
                        "name" => "运费计算",
                        "url" => "http://wx.wancheng.org/button/logistics/freightaging",
                    ],
                    [
                        "type" => "view",
                        "name" => "网点查询",
                        "url" => "http://wx.wancheng.org/button/logistics/netquery",
                    ],
                    [
                        "type" => "view",
                        "name" => "收货范围",
                        "url" => "http://wx.wancheng.org/button/logistics/takerange",
                    ],
                ],
            ],
            [
                "name" => "优惠活动",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "积分商城",
                        "url" => "http://wx.wancheng.org/button/benefit/numericalmall",
                    ],
                    [
                        "type" => "view",
                        "name" => "领取大厅",
                        "url" => "http://wx.wancheng.org/button/benefit/dolehall",
                    ],
                ],
            ],
            [
                "name" => "个人中心",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "个人首页",
                        "url" => "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $config['app_id'] . "&redirect_uri=http://wx.wancheng.org/button/myself/myself&action=viewtest&response_type=code&scope=snsapi_base&state=1#wechat_redirect",
                    ],
                    [
                        "type" => "view",
                        "name" => "员工入口",
                        "url" => "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $config['app_id'] . "&redirect_uri=http://wx.wancheng.org/button/myself/employee&action=viewtest&response_type=code&scope=snsapi_base&state=1#wechat_redirect",
                    ],

                    /*[
                        "type" => "view",
                        "name" => "我的余额",
                        "url" => "http://wx.wancheng.org/button/myself/balance",
                    ],
                    [
                        "type" => "view",
                        "name" => "我的订单",
                        "url"=>"https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$config['app_id']."&redirect_uri=http://wx.wancheng.org/button/myself/order&action=viewtest&response_type=code&scope=snsapi_base&state=1#wechat_redirect",

                    ],
                    [
                        "type" => "view",
                        "name" => "我的积分",
                        "url" => "http://wx.wancheng.org/button/myself/numerical",
                    ],
                    [
                        "type" => "view",
                        "name" => "我的优惠券",
                        "url" => "http://wx.wancheng.org/button/myself/coupon",
                    ],
                    [
                        "type" => "view",
                        "name" => "常用地址",
                        "url" => "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$config['app_id']."&redirect_uri=http://wx.wancheng.org/button/myself/address&action=viewtest&response_type=code&scope=snsapi_base&state=1#wechat_redirect",
                    ],*/
                ],
            ],

        ];
        $menu->add($button);

        /* $button = [
             [
                 "name" => "物流服务",
                 "sub_button" => [
                     [
                         "type" => "view",
                         "name" => "我要发货",
                         "url"=>"https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$config['app_id']."&redirect_uri=http://wx.wancheng.org/button/logistics/delivery&action=viewtest&response_type=code&scope=snsapi_base&state=1#wechat_redirect"
                     ],
                     [
                         "type" => "view",
                         "name" => "运单查询",
                         "url" => "http://wx.wancheng.org/button/logistics/trackingquery",
                     ],
                     [
                         "type" => "view",
                         "name" => "运费计算",
                         "url" => "http://wx.wancheng.org/button/logistics/freightaging",
                     ],
                     [
                         "type" => "view",
                         "name" => "网点查询",
                         "url" => "http://wx.wancheng.org/button/logistics/netquery",
                     ],
                     [
                         "type" => "view",
                         "name" => "收货范围",
                         "url" => "http://wx.wancheng.org/button/logistics/takerange",
                     ],
                 ],
             ],
             [
                 "name" => "优惠活动",
                 "sub_button" => [
                     [
                         "type" => "view",
                         "name" => "积分商城",
                         "url" => "http://wx.wancheng.org/button/benefit/numericalmall",
                     ],
                     [
                         "type" => "view",
                         "name" => "领取大厅",
                         "url" => "http://wx.wancheng.org/button/benefit/dolehall",
                     ],
                     [
                         "type" => "view",
                         "name" => "收货范围",
                         "url" => "http://wx.wancheng.org/button/logistics/takerange",
                     ],
                 ],
             ],
             [
                 "name" => "个人中心",
                 "sub_button" => [
                     [
                         "type" => "view",
                         "name" => "我的余额",
                         "url" => "http://wx.wancheng.org/button/myself/balance",
                     ],
                     [
                         "type" => "view",
                         "name" => "我的订单",
                         "url" => "http://wx.wancheng.org/button/myself/order",
                     ],
                     [
                         "type" => "view",
                         "name" => "我的积分",
                         "url" => "http://wx.wancheng.org/button/myself/numerical",
                     ],
                     [
                         "type" => "view",
                         "name" => "我的优惠券",
                         "url" => "http://wx.wancheng.org/button/myself/coupon",
                     ],
                     [
                         "type" => "view",
                         "name" => "常用地址",
                         "url" => "http://wx.wancheng.org/button/myself/address",
                     ],
                 ],
             ],

         ];

         $matchRule = [
             "group_id"             => "101",
             "sex"                  => "",
             "country"              => "",
             "province"             => "",
             "city"                 => "",
             "client_platform_type" => ""
         ];
         $menu->add($button,$matchRule);        */

    }

    public function serve()
    {
        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function ($message) {
            return $this->response($message);
        });

        return $wechat->server->serve();
    }

    private function register($message)
    {
        $openid = $message->FromUserName;
        $text = new Text();
        if (!$this->existUser($openid)) {
            $content = "欢迎您的关注，请尽快完成\n";
            $content .= "<a href='http://wx.wancheng.org/h5/auth/register/" . $openid . "'>用户注册</a>";
            $content .= "，以免影响使用";
        } else {
            $content = "欢迎回来";
        }

        $text->content = $content;
        return $text;
    }

    private function existUser($openid)
    {
        $member = Member::where('openid', $openid)->take(1)->get();
        if (count($member) && $member[0]->exists && $member[0]->mobile) {
            return true;
        }
        return false;
    }

    private function clickButtonEvent($message)
    {
        switch ($message->EventKey) {
            case 'CLICK_BUTTON_DELIVERY':
                //return view('welcome');
                return "gaga";
        }
    }

    private function response($message)
    {
        switch ($message->MsgType) {
            case 'event': {
                switch ($message->Event) {
                    case 'subscribe':
                        return $this->register($message);
                    /*case "VIEW":
                        return $this->viewButtonEvent($message);*/
                    default:
                        return "Welcome！";
                }
                break;
            }
            case 'text':
                return $this->replyText($message);
            case 'image':
                # 图片消息...
                break;
            case 'voice':
                # 语音消息...
                break;
            case 'video':
                # 视频消息...
                break;
            case 'location':
                # 坐标消息...
                break;
            case 'link':
                # 链接消息...
                break;
            // ... 其它消息
            default:
                # code...
                return "";
                break;
        }
    }

    private function replyText($message)
    {
        return $this->register($message);
    }
}
