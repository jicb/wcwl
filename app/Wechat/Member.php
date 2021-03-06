<?php

namespace App\Wechat;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $connection = "wcwlgzh";
    protected $table = "wc_member";
    protected $primaryKey = "member_id";    
    protected $fillable = ['name','role','mobile','openid'];

    public function Order()
    {
        return $this->hasMany('App\Wechat\Order','member_id');
    }
    
    public function Bal(){
        return $this->hasMany('App\Wechat\Bal','member_id');
    }

    public function Vbal(){
        return $this->hasMany('App\Wechat\Vbal','member_id');
    }

    public function Coupon(){
        return $this->hasMany('App\Wechat\Coupon','bind_member','member_id');
    }
}
