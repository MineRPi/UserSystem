<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//��·��
Route::get('/', function () {
    echo 'please enter the address:/home/crud';
});
Route::get('/home', function () {
    echo 'please enter the address:/home/crud';
});

/*
//·��Ⱥ��
Route::group(['prefix'=>'admin'],function(){
    //������/home��ַ��·�ɿ���д��
    //Route::����ʽ���������URL'�����������������Ӧ�ķ�����
    Route::any('/home/{id?}',function($id=0){
        echo '��ǰ���ʵ��û�ID��' . $id;
    });

    //ͨ��?��ʽ����get����
    Route::any('/test',function(){
        echo '��ǰ���ʵ��û�ID��' . $_GET['id'];
    })->name('houlin');  //·�ɱ���
});
*/


//group·��Ⱥ�飬�����Ƿ��Token['middleware' => ['auth.api'],
Route::group(['prefix'=>'home'],function(){
    //DB�������ɾ�Ĳ�
    Route::get('/del','Admin\DelController@del');
    Route::get('/update','Admin\UpdateController@update');
    //չʾ��ͼ
    Route::get('/views','Admin\CrudController@views');
});

Route::group(['middleware' => ['auth.api'],'prefix'=>'home'],function(){
Route::get('/login_view','Admin\LoginController@login_view');
 });
//�û�ע���¼ϵͳ
    Route::any('/login','Admin\LoginController@login');

    Route::get('/regist','Admin\LoginController@regist');
