<?php

namespace App\Wechat;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $connection = "wcwlgzh";
    protected $table = "wc_order";
    protected $primaryKey = "order_id";
    protected $fillable = ['order_code','member_id','price'];

    public function Member()
    {
        return $this->belongsTo('App\Wechat\Member','member_id');
    }

    public function Waybill()
    {
        return $this->hasOne('App\Wechat\Waybill','order_id');
    }

}
