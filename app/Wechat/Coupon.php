<?php

namespace App\Wechat;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
    protected $connection = "wcwlgzh";
    protected $table = "wc_coupon";
    protected $primaryKey = "coupon_id";
    protected $fillable = ['coupon_id','ctype_id','coupon_code','bind_member','bind_time','use_time','valid_time','invalid_time','creator','status'];

    public function CouponType()
    {
        return $this->belongsTo('App\Wechat\CouponType','ctype_id');
    }

    public function Member()
    {
        return $this->belongsTo('App\Wechat\Member','member_id','bind_member');
    }
}
