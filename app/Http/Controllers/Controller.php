<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public static function getOpenidFromCode($code){
        try {
            $config = config['wechat'];

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

            dd($content);

        } catch (ClientException $ce) {
            Log::error($ce);
            return "";
        } catch (ConnectException $ce) {
            Log::error($ce);
            return "";
        }
        return "";
    }
}
