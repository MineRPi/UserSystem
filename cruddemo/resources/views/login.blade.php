<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>
        <script type="text/javascript" src="https://php-acad.28sjw.com/Statics/Assets/js/jquery.min-3.2.1.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div>
        <!-- 登录表单 -->
        <form   action="home/login_view" method="get">
        email:  <input type="text" name="email" id='ema'>
        password:   <input type="password" name="password" id='pas'>
        <input type="submit" value="登录" id='login'><hr>
        </form>
        
        </div>
        <hr>
        <div>
        <!-- 注册表单 -->
        <form action="regist" method="get">
        name:  <input type="text" name="name">
        age:  <input type="value" name="age">
        email:  <input type="text" name="email">
        password:   <input type="password" name="password">
        <input type="submit" value="注册"><hr>
        </form>
        @if ($suc == 0)
        注册失败，该用户已被注册或无效的字符
        @elseif ($suc == 1)
        注册成功
        @else
        @endif
        </div>
    </body>

    <script type="text/javascript">
        //jQuery的页面载入事 件
        $(function(){
            //给按钮绑定点击事件
            $('#login').click(function(){
                //发送ajax请求
                $.ajax({
                    //请求方式
                    type:"get",
                    data: {email:$('#ema').val(),password:$('#pas').val()},
                    dataType:"json",
                    //请求地址
                    url:"/borntoken",
                    //请求成功后函数调用
                    success:function(response){
                        //response为服务器端返回的数据
                        document.cookie=response['token'];
                    },
                    //请求失败时调用
                    error: function(xhr){
                        console.log(xhr,'失败');
                    }
                });
            });
        });
    </script>
</html>
