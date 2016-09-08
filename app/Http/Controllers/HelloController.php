<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HelloController extends Controller
{
    //
    public function hello(){
        app('db')->connection('wcwl')->table('test')->chunk(100,function($tests){
           foreach ($tests as $test){
               echo $test->helloworld."\n";
           }
        });
    }
}
