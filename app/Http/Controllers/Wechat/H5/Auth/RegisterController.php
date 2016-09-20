<?php

namespace App\Http\Controllers\Wechat\H5\Auth;

use App\Wechat\Member;
use EasyWeChat\Message\Text;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;

use Illuminate\Support\Facades\Redis;
use Log;

class RegisterController extends Controller
{
    private static $spid = '4891';
    private static $loginName = 'aijiexiyi';
    private static $password = 'aijiexiyi';
    private static $msgUrl = "http://115.28.143.178:8080/sms/sendUtf.do";
    //
    public function testmysql(){
        $member = Member::find(3);
        //dd($member);
        /*$app = app('wechat');
        $broadcast = $app->broadcast;
        $broadcast->previewText("你好，注册成功", $member->openid);*/

        return view('wechat.auth.returnwechat');
    }
    
    public function registered(Request $request){
        $app = app('wechat');
        $broadcast = $app->broadcast;
        $broadcast->previewText("你好，注册成功", $request->input('openid'));
    }

    public function regsend(Request $request){
        //validate msg
        if(!$this->validateMsg($request)){
            return view('wechat.auth.register')
                ->with('alert','验证码不正确！')
                ->with('openid',$request->openid)
                ->with('name',$request->name)
                ->with('phone',$request->phone);
        }else{
            Member::firstOrCreate(['name'=>$request->name,'mobile'=>$request->phone,'openid'=>$request->openid,'role'=>1]);
            return view('wechat.auth.returnwechat')->with('openid',$request->openid);
        }

        /*$member = new Member();
        $member->name = $request->name;
        $member->mobile = $request->phone;
        $member->openid = $request->openid;
        $member->role = 1;
        $member->save();*/


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

            $response = $client->request('GET', $this::$msgUrl, ['query' => $data]);
            $content = $response->getBody()->getContents();

            if(strstr($content,'result=1033')){
                return array('flag'=>false,'msg' => '您操作太频繁了，休息一下吧！');
            }

        } catch (ClientException $ce) {            
            Log::error($ce);
            return array('flag'=>false,'msg' => '出错了，请稍后再试');
        } catch (ConnectException $ce) {            
            Log::error($ce);
            return array('flag'=>false,'msg' => '出错了，请稍后再试');
        }
        return array('flag'=>true);
    }

    private function getContent($tel){
        $code = $this->getCode($tel);
        return  '【万程物流】您的验证码为：'.$code.'，请于5分钟内进行验证。';
    }

    private function getCode($tel){        
        Redis::del($tel);
        $time = date('hms');
        Redis::setex($tel,28000,$time);
        return $time;
    }

}
