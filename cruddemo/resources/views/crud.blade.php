<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script type="text/javascript" src="https://php-acad.28sjw.com/Statics/Assets/js/jquery.min-3.2.1.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <!-- 显示用户 -->
        {{$mid_params}},您好。
        <hr/>
        <div>
        <form action="update" method="get">
        id:   <input type="value" name="id">
        name:   <input type="text" name="name">
        age:    <input type="text" name="age">
        email:  <input type="text" name="email">
        <input type="submit" value="修改相应id的记录" id='update'><hr/>
        </form>
        </div>
        <div>
        <form action="views" method="get">
        name:   <input type="text" name="name">
        age:    <input type="value" name="age">
        email:  <input type="text" name="email">
        <input type="submit" value="增加一条记录" id='add'><hr/>
        </form>
        </div>
         <div>
        <form action="del" method="get">
        id:   <input type="value" name="id">
        <input type="submit" value="删除相应id的记录" id='del'><hr/>
        </form>
        
        </div>
        <div class="flex-center position-ref full-height">
        <table border="1">
         <!-- 表格头部-->
            <tr>
                <td>id</td>
                <td>name</td>
                <td>age</td>
                <td>email</td>
            </tr>
         <!-- 循环输出-->
        @foreach ($data as $key => $value)
        <tr>
            <td>{{$value -> id}}</td>
            <td>{{$value -> name}}</td>
            <td>{{$value -> age}}</td>
            <td>{{$value -> email}}</td>
        </tr>
        @endforeach
        </table>
        </div>
    </body>

    <script type="text/javascript">
        //jQuery的页面载入事件
        $(function(){
            //给按钮绑定点击事件
            $('#del').click(function(){
                //发送ajax请求
                $.ajax({
                    //请求方式
                    type:"get",
                    //请求地址
                    url:"/home/del",
                    header:{
                        'Content-Type':'application/json',
                        'access-token':document.Cookie
                    },
                    //请求成功后函数调用
                    success:function(response){
                        //response为服务器端返回的数据
                        //方法内部自动将json字符串转换为json对象
                        console.log(response);
                    },
                    //请求失败时调用
                    error: function(xhr){
                        console.log(xhr);
                    }
                });
            });
        });
    </script>
</html>
