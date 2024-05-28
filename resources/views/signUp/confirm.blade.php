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
    <form action="complete"></form>
    </body>
</html>
