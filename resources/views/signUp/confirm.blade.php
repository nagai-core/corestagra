<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/confirm.css', 'resources/js/app.js'])
    <title>登録確認</title>
</head>
<body>
    <div class="confirm">
        <p class="alert">以下の内容で登録します。</p>
        <div class="info">
            <p class="title">nickName</p>
            <p>{{$request->name}}</p>
        </div>
        <div class="info">
            <p class="title">email</p>
            <p>{{$request->email}}</p>
        </div>
        <div class="info">
            <p class="title">password</p>
            <p>{{$dummy}}</p>
        </div>
        <form action="{{route('signUp.store')}}" method="POST">
            @csrf
            <input type="hidden" name="name" value="{{$request->name}}">
            <input type="hidden" name="email" value="{{$request->email}}">
            <input type="hidden" name="password" value="{{$request->password}}">
            <input type="hidden" name="icon_url" value="{{$request->icon}}">
            <img src="{{$request->icon}}" alt="" width="100px">
            <button class="" type="submit">登録</button>
            <button class="date" type="button" onClick="history.back()">戻る</button>
        </form>
    </div>
    </body>
</html>
