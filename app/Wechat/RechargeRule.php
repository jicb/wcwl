<?php

namespace App\Wechat;

use Illuminate\Database\Eloquent\Model;

class RechargeRule extends Model
{
    //
    protected $connection = "wcwlgzh";
    protected $table = "wc_recharge_rule";
    protected $primaryKey = "rg_id";
    protected $fillable = ['rg_id','satisfied_amount','give_amount'];
}
