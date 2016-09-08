<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class HelloController extends Controller
{
    //
    public function hello(){
        $users = DB::select('select * from helloword');
        dd($users);
        /*app('db')->connection('jcb97')->table('users')->chunk(100,function($tests){
           foreach ($tests as $test){
               echo $test->name."\n";
           }
        });*/
    }
}
