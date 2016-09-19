<?php

namespace App\Http\Controllers\Wechat\H5\Auth;

use EasyWeChat\Message\Text;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;

use Illuminate\Support\Facades\Redis;

class RegisterController extends Controller
{
    private static $spid = '4891';
    private static $loginName = 'aijiexiyi';
    private static $password = 'aijiexiyi';
    private static $msgUrl = "http://115.28.143.178:8080/sms/sendUtf.do";
    //
    public function regsend(Request $request){
        //validate msg
        if(!$this->validateMsg($request)){
            return view('wechat.auth.register')
                ->with('alert','验证码不正确！')
                ->with('openid',$request->openid)
                ->with('name',$request->name)
                ->with('phone',$request->phone);
        }

        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function ($message) {
            return "注册成功";
        });

        return $wechat->server->serve();

    }

    public function registeruser(Request $request, $openid)
    {
        return view('wechat.auth.register')->with('openid', $openid);
    }

    public function validatecode(Request $request)
    {
        return $this->postMsgToUser(strval($request->input('tel')));
    }

    private function validateMsg($request){
        $backMsg = Redis::get($request->phone);
        if($backMsg == $request->identifying){
            return true;
        }
        return false;
    }

    private function postMsgToUser($tel){
        try {
            $content = $this->getContent($tel);
            $data = array(
                'mobiles' => $tel,
                'spId' => $this::$spid,
                'loginName' => $this::$loginName,
                'password' => $this::$password,
                'content' => $content,
                'subPort' => '',
            );
            $client = new Client();
            $client->request('GET', $this::$msgUrl, ['query' => $data]);
            return array('flag'=>true);
        } catch (ClientException $ce) {
            return array('flag'=>false);
        } catch (ConnectException $ce) {
            return array('flag'=>false);
        }
    }

    private function getContent($tel){
        $code = $this->getCode($tel);
        return  '【万程物流】您的验证码为：'.$code.'，请于5分钟内进行验证。';
    }

    private function getCode($tel){        
        Redis::del($tel);
        $time = date('hms');
        Redis::setex($tel,280,$time);
        return $time;
    }


}
