<?php


namespace App\Http\Controllers\Admin;
header("Content-type: text/html; charset=utf-8");
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use DB;

class CrudController extends Controller
{   
    //展示视图
     public function views(Request $request){
        //定义关联操作的表
        $db = DB::table('users');
        //获取request输入值
        $get=$request->all();
        //获取中间件产生的参数
        $mid_params = $request->get('mid_params');
        //使用insert()增加记录
        if($get){
          $result=$db -> insert(
              [
                  'name' => $get['name'],
                  'age' => $get['age'],
                  'email' => $get['email']
              ]
          );
        }
        //使用get()查询全部记录,且按照id升序排列
        $data = $db ->orderBy('id','asc')-> get();
        return view('crud',compact('data','mid_params')); 
    }
}