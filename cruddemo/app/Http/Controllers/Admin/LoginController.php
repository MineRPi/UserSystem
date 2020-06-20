<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    //建立入口函数
    public function login(){
        $suc=2;
        return view('login',compact('suc')); 
    }

    //建立注册函数
    public function regist(){
        $db = DB::table('users');
        $suc=2;
        if($_GET){
            //使用md5加密产生token
            $token = md5($_GET['email'].$_GET['password']).'hjl';
            $data=$db -> where('email',$_GET['email'])-> get();
            if(!($data->isEmpty())){
                $suc=0;
                return view('login',compact('suc')); 
            };
            //使用insert()增加记录
            $result1 = $db -> insert([
                //需要修改字段的键值对
                'name' => $_GET['name'],
                'age' => $_GET['age'],
                'email' => $_GET['email'],
                'api_token' => $token
            ]);
        }
        $suc=1;
        return view('login',compact('suc')); 
    }

    //建立视图及生成token函数
    public function login_view(Request $request){
        //获取中间件产生的参数
        $mid_params = $request->get('mid_params');
        //定义关联数据库
        $db = DB::table('users');
        //使用get()查询全部记录,且按照id升序排列
        $data = $db ->orderBy('id','asc')-> get();
        return view('crud',compact('data','mid_params')); 
    }

}
