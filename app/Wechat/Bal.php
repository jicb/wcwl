<?php

namespace App\Wechat;

use Illuminate\Database\Eloquent\Model;

class Bal extends Model
{
    //
    protected $connection = "wcwlgzh";
    protected $table = "wc_bal";
    protected $primaryKey = "bal_id";
    protected $fillable = ['bal_id','member_id','value','income_type','cost_type','order_id'];

    public function Member()
    {
        return $this->belongsTo('App\Wechat\Member','member_id');
    }
}
