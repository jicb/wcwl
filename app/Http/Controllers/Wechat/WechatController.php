<?php

namespace App\Http\Controllers\Wechat;

use EasyWeChat\Message\Text;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WechatController extends Controller
{
    //

    public function menuadd(Request $request)
    {
        $wechat = app('wechat');
        $menu = $wechat->menu;
        $menu->destroy();
        $button = [
            [
                "type" => "view",
                "name" => "我要发货",
                "url" => "http://123.206.198.227/wechat/h5/delivery"
            ],
            [
                "name" => "帮助",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "网点查询",
                        "url" => "http://123.206.198.227/wechat/h5/help/netquery",
                    ],
                    [
                        "type" => "view",
                        "name" => "运单号查询",
                        "url" => "http://123.206.198.227/wechat/h5/help/trackingquery",
                    ],
                    [
                        "type" => "view",
                        "name" => "运费时效",
                        "url" => "http://123.206.198.227/wechat/h5/help/freightaging",
                    ],
                ],
            ],
            [
                "name" => "个人中心",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "地址管理",
                        "url" => "http://123.206.198.227/wechat/h5/help/addressmanagement",
                    ],
                    [
                        "type" => "view",
                        "name" => "我的订单",
                        "url" => "http://123.206.198.227/wechat/h5/help/myorder",
                    ],
                    [
                        "type" => "view",
                        "name" => "积分商城",
                        "url" => "http://123.206.198.227/wechat/h5/help/integralshop",
                    ],
                ],
            ],

        ];
        $menu->add($button);
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
        $content = "欢迎您的关注，请尽快完成\n";
        $content .= "<a href='http://123.206.198.227/wechat/h5/register/" . $openid . "'>用户注册</a>";
        $content .= "，以免影响使用";
        $text->content = $content;
        return $text;
    }

    private function response($message)
    {
        switch ($message->MsgType) {
            case 'event':
                if ($message->Event == 'subscribe') {
                    return $this->register($message);
                } else {
                    return "欢迎您再次光临！！！";
                }
                break;
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

    private function replyText($message){
        return $this->register($message);
    }
}
