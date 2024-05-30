<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登録確認</title>
</head>
<body>
    <ul>
        <li>
            <p>ニックネーム：{{$request->name}}</p>
        </li>
        <li>
            <p>メアド：{{$request->email}}</p>
        </li>
        <li>
            <p>パスワード：プライバシー保護により非表示</p>
        </li>
    </ul>
    <form action="{{route('signUp.store')}}" method="POST">
    <input type="hidden" name="name" value="{{$request->name}}">
    <input type="hidden" name="email" value="{{$request->email}}">
    <input type="hidden" name="password" value="{{$request->password}}">
    <input type="hidden" name="icon_url" value="{{$request->icon}}">
    <img src="{{$request->icon}}" alt="" width="100px">
    <div>
        {{-- 省略--}}
        <button class="btn btn-primary" type="submit">
        登録 <i class="fa-solid fa-caret-right"></i>
        </button>
        </div>
    @csrf
    </form>
    </body>
</html>
