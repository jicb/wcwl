<?php

namespace App\Http\Controllers\Wechat\H5\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;

class RegisterController extends Controller
{
    //
    public function register(Request $request, $openid)
    {
        return view('wechat.auth.register')->with('openid', $openid);
    }

    public function validatecode(Request $request)
    {
        $client = new Client();
        $postUrl = "http://115.28.143.178:8080/sms/Send.do";
        $data = [
            'mobiles' => $request->input('tel'),
        ];
        dd($request->input('tel'));
        try{
            $response = $this->client->post($postUrl, ['body' => $data]);
            $contents = $response->getBody()->getContents();
        }catch (ClientException $ce){

        }catch (ConnectException $ce){

        }
    }
}
