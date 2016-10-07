<?php

namespace App\Wechat;

use Illuminate\Database\Eloquent\Model;

class CouponType extends Model
{
    //
    protected $connection = "wcwlgzh";
    protected $table = "wc_coupon_type";
    protected $primaryKey = "ctype_id";
    protected $fillable = ['ctype_id','satisfied_amount','reduce_amount','discount','comment'];

    public function Coupon(){
        return $this->hasMany('App\Wechat\Coupon','ctype_id');
    }
}
