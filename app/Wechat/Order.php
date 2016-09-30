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

}
