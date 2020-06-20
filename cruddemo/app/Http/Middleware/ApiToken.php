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
    //使用md5加密产生token
    $token = md5($_GET['email'].$_GET['password']).'hjl';
    //查找用户
    $data=$db -> where('api_token',$token)-> get();
    foreach ($data as $key => $value){
        $datas=$value -> email;
    };
    //若查找不到，则返回信息
    if ($data->isEmpty()) {
        return response()->json(['code' => 401,'msg' => 'wrong_token']);    
    };
    $mid_params = ['mid_params'=>$datas];
    $request->attributes->add($mid_params);
    //若查找成功，则继续
    return $next($request);
 }
}