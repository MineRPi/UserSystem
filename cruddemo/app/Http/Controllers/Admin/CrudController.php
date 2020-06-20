<?php


namespace App\Http\Controllers\Admin;
header("Content-type: text/html; charset=utf-8");
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Request;
use DB;

class CrudController extends Controller
{   
    //展示视图
     public function views(){
        //定义关联操作的表
        $db = DB::table('users');
        //使用insert()增加记录
        if($_GET){
          $result=$db -> insert(
              [
                  'name' => $_GET['name'],
                  'age' => $_GET['age'],
                  'email' => $_GET['email']
              ]
          );
        }
        //使用get()查询全部记录,且按照id升序排列
        $data = $db ->orderBy('id','asc')-> get();
        return view('crud',compact('data')); 
    }
}