<?php

namespace App\Wechat;

use Illuminate\Database\Eloquent\Model;

class Waybill extends Model
{
    //
    protected $connection = "wcwlgzh";
    protected $table = "wc_waybill";
    protected $primaryKey = "waybill_id";
    protected $fillable = ['waybill_code','order_id','from_name','from_phone','from_pca','from_street','to_name',
                            'to_phone','to_pca','to_street','cargo_name','cargo_count','cargo_weight','cargo_volume',
                            'cargo_insure','exange_type','receipt_type','price','comment'];
}
