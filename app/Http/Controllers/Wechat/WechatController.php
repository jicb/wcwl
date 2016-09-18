<?php

namespace App\Http\Controllers\Wechat;

use EasyWeChat\Message\Text;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WechatController extends Controller
{
    //
    private $openid = null;

    public function serve(){
        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function($message){
            return $this->response($message);
        });
        
        return $wechat->server->serve();
    }

    public function registeruser(){
        dd($this->openid);
        return view('auth.login');
    }

    private function register($message){
        $this->openid = $message->FromUserName;

        $text = new Text();
        $content = "欢迎关注，请尽快完成\n";
        $content .= "<a href='http://123.206.198.227/wechat/register'>新用户注册</a>";
        $text->content = $content;
        return $text;
    }

    private function response($message){
        switch ($message->MsgType) {
            case 'event':
                if($message->Event == 'subscribe'){
                    return $this->register($message);
                }else{
                    return "欢迎再次光临 jcb的小窝！";
                }
                break;
            case 'text':
                $text = new Text();
                $text->content = $message->FromUserName;
                return $text;
                break;
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
}
