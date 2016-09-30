<?php
/**
 * Created by PhpStorm.
 * User: jicb
 * Date: 2016/9/29
 * Time: 14:37
 */
namespace App\Services\Wechat;

use App\Services\ToPinyin;
use App\Wechat\Area;
use App\Wechat\Member;
use App\Wechat\Address;

class CommonService{
    
    public static function switchReceipt($receipt_type){
        $type = 0;
        switch($receipt_type){
            case '签回单':
                $type=1;
                break;
            case '签托运单':
                $type=2;
                break;
            case '签信封':
                $type=3;
                break;
            case '签回单盖章':
                $type=4;
                break;
            case '1份回单':
                $type=5;
                break;
            case '2份回单':
                $type=6;
                break;
            case '3份回单':
                $type=7;
                break;      
            default:
                break;
        }
        return $type;
    }
    
    public static function switchExchange($exchange_type){
        $data = 2;
        switch($exchange_type){
            case '网点自提':
                $data = 2;
                break;                
            case '送货上门':
                $data = 1;
                break;
            default:
                break;
        }
        
        return $data;
    }
    
    public static function createOrderCode($member_id){
        $member = Member::find($member_id);
        $name = $member->name;

        $toPinyin = new ToPinyin();
        $name = $toPinyin->get_pinyin($name);
        $name = strtoupper($name);
        $date = date('YmdHms');

        return $name.$date;
    }
    
    public static function getMemberid($openid){
        $member = Member::where('openid',$openid)->first();
        if(!$member){
            
        }
        return $member->member_id;
    }

    public static function getAllAddress($openid){
        $member_id = CommonService::getMemberid($openid);
        $send = Address::where('member_id',$member_id)->where('type',1)->orderBy('priority','desc')->get();
        $receive = Address::where('member_id',$member_id)->where('type',2)->orderBy('priority','desc')->get();

        $dataSend = self::getData($send);
        $dataReceive = self::getData($receive);


        $dataSSQ = [];
        $dataSS = [];
        $dataSheng = [];
        $dataShi = [];
        self::getSSQ($dataSS,$dataSSQ,$dataSheng,$dataShi);

        $data = json_encode(array('send'=>$dataSend,'receive'=>$dataReceive,'member_id'=>$member_id,'SSQ'=>$dataSSQ,'SS'=>$dataSS,'Sheng'=>$dataSheng,'Shi'=>$dataShi));


        return $data;
    }

    public static function getSSQ(&$SS,&$SSQ,&$Sheng,&$Shi){
        $source = Area::orderBy('priority','desc')->get();
        $source = $source->groupBy('province');

        $source->each(function ($item1,$key1) use(&$SS,&$SSQ,&$Sheng,&$Shi){
           $item2 = $item1->groupBy('city');
            $Sheng[] = $key1;
            foreach($item2 as $key2 => $value){
                $SS[$key1][] = $key2;
                $SSQ[$key1][$key2] = [];
                foreach ($value as $value2){
                    $SSQ[$key1][$key2][] = $value2->area;
                }
            }
        });

    }

    public static function getSendOrReceiveData($member_id,$type){
        $data = Address::where('member_id',$member_id)->where('type',$type)->orderBy('priority','desc')->get();        

        $data = self::getData($data);          
        $data = json_encode(array('data'=>$data,'member_id'=>$member_id));
        return $data;
    }   
    

    public static function getData($data){
        $returnData = [];
        foreach ($data as $item){
            $temp = [];
            $temp['addr_id'] = $item->addr_id;
            $temp['type'] = $item->type;
            $temp['priority'] = $item->priority;
            $temp['name'] = $item->name;
            $temp['phone'] = $item->phone;
            $temp['pca'] = $item->pca;
            $temp['street'] = $item->street;
            $temp['member_id'] = $item->member_id;
            $returnData[] = $temp;
        }
        return $returnData;
    }
}