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
        <div>
        <form action="home/login_view" method="get">
        email:  <input type="text" name="email">
        password:   <input type="password" name="password">
        <input type="submit" value="登录"><hr>
        </form>
        </div>
        <hr>
        <div>
        <form action="regist" method="get">
        name:  <input type="text" name="name">
        age:  <input type="value" name="age">
        email:  <input type="text" name="email">
        password:   <input type="password" name="password">
        <input type="submit" value="注册"><hr>
        </form>
        @if ($suc == 0)
        注册失败，该用户已被注册
        @elseif ($suc == 1)
        注册成功
        @else
        @endif
        </div>
    </body>
</html>
