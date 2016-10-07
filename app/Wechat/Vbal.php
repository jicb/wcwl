<?php

namespace App\Wechat;

use Illuminate\Database\Eloquent\Model;

class Vbal extends Model
{
    //
    protected $connection = "wcwlgzh";
    protected $table = "wc_vbal";
    protected $primaryKey = "vbal_id";
    protected $fillable = ['vbal_id','member_id','value','income_type','cost_type','order_id','bal_id'];

    public function Member()
    {
        return $this->belongsTo('App\Wechat\Member','member_id');
    }
}
