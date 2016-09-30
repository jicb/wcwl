<?php

namespace App\Wechat;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $connection = "wcwlgzh";
    protected $table = "wc_area";
    protected $primaryKey = "area_id";
    //protected $fillable = ['province','city','area'];
}
