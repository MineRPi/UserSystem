<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use DB;


class ApiToken
{
 /**
 * Handle an incoming request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @return mixed
 */
 public function handle($request, Closure $next)
 {
    //定义关联操作的表
    $db = DB::table('users');
    $str = $request->header('cookie');
    $token=explode(";",$str)[0];
    //查找用户
    $data=$db -> where('api_token',$token)-> first();
    //若查找不到，则返回信息
    if (!$data) {
        return response()->json(['code' => 401,'msg' => 'wrong_token']);    
    };
    //将查到的email附值给$datas变量
    $datas=$data -> email;
    $mid_params = ['mid_params'=>$datas];
    $request->attributes->add($mid_params);
    //若查找成功，则继续
    return $next($request);
 }
}