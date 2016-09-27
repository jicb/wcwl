<?php

namespace App\Wechat;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $connection = "wcwlgzh";
    protected $table = "wc_address";
    protected $primaryKey = "addr_id";
    //protected $fillable = ['name','role','mobile','openid'];
}
