<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    //建立入口函数
    public function login(){
        //建立变量，若$suc==0，则注册成功。1则失败
        $suc=2;
        return view('login',compact('suc')); 
    }


    //建立注册函数
    public function regist(Request $request){
        $db = DB::table('users');
        $suc=2;
        //获取request输入值
        $get=$request->all();
        //如果$get有值,进入注册
        if($get){
            //数据库检索
            $data=$db -> where('email',$get['email'])-> first();
            //如果数据检索结果不为空，则注册失败
            if(!$data){
                $suc=0;
                return view('login',compact('suc')); 
            };
            //否则，进行数据库写入
            //使用insert()增加记录
            $result1 = $db -> insert([
                //需要修改字段的键值对
                'name' => $get['name'],
                'age' => $get['age'],
                'email' => $get['email'],
                'password' => $get['password']
            ]);
            $suc=1;
            return view('login',compact('suc')); 
        };
        //如果$get无值，则注册失败
        $suc=0;
        return view('login',compact('suc')); 
    }


    //建立视图函数
    public function login_view(Request $request){
        //定义关联数据库
        $db = DB::table('users');
        //获取request输入值
        $get=$request->all();
        //使用get()查询全部记录,且按照id升序排列
        $data = $db ->orderBy('id','asc')-> get();
        //dd($request->headers);
        $mid_params=$get['email'];
        return view('crud',compact('data','mid_params')); 
    }


    //生成token函数并返回给视图
    public function borntoken(Request $request){
        //定义关联数据库
        $db = DB::table('users');
        //获取request输入值
        $get=$request->all();
        //查找用户
        $data=$db -> where('email',$get['email'] )->first();
        //若查找不到，则返回信息
        if (!$data) {
            return response()->json(['code' => 401,'msg' => 'wrong_user']);   
        };
        //查找到信息则生成token并返回
        $email=$data -> email;
        $password=$data -> password;
        //使用md5加密产生token
        $token = md5($email.$password).'hjl';
        //数据库保存token
        $result1 = $db -> where('email','=',$email) -> update([
            //需要修改字段的键值对
            'api_token' => $token
        ]);
        //返回token给前端
        return response()->json(['token' => $token]);     
    }
}
