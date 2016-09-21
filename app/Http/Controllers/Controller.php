<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public static function getOpenidFromCode($code){
        try {
            $config = config('wechat');

            $url = "https://api.weixin.qq.com/sns/oauth2/access_token";

            $data = array(
                'appid' => $config['app_id'],
                'secret' => $config['secret'],
                'code' => $code,
                'grant_type' => 'authorization_code',
            );
            $client = new Client();

            $response = $client->request('GET',$url , ['query' => $data]);
            $content = $response->getBody()->getContents();
            $content = \GuzzleHttp\json_decode($content);
            if(isset($content->openid,$content)){
                return $content->openid;

            }
            Log::error("拉取用户信息错误");
            return "";

        } catch (ClientException $ce) {
            Log::error($ce);
            return "";
        } catch (ConnectException $ce) {
            Log::error($ce);
            return "";
        }        
    }
}
