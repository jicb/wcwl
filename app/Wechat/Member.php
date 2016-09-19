<?php

namespace App\Wechat;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $connection = "wcwlgzh";
    protected $table = "wc_member";
    protected $primaryKey = "member_id";    
}
