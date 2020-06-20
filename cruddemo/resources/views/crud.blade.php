<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
        <input type="submit" value="修改相应id的记录"><hr/>
        </form>
        </div>
        <div>
        <form action="views" method="get">
        name:   <input type="text" name="name">
        age:    <input type="value" name="age">
        email:  <input type="text" name="email">
        <input type="submit" value="增加一条记录"><hr/>
        </form>
        </div>
         <div>
        <form action="del" method="get">
        id:   <input type="value" name="id">
        <input type="submit" value="删除相应id的记录"><hr/>
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
</html>
