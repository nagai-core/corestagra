<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員登録</title>
</head>
<body>
    <h1>会員登録画面</h1>
    <form action="{{route('signUp.create')}}" method="POST">
        <div>
            <label>
                ニックネーム
                <input type="text" name="name" value="{{ old('name') }}">
            </label>
        </div>
        <div>
            <label>
                メールアドレス
                <input type="email" name="email" value="{{ old('email') }}">
            </label>
        </div>
        <div>
            <label>
                パスワード
                <input type="password" name="password" value="{{ old('password') }}">
            </label>
        </div>
        <div>
            <label>
                アイコン
                <input type="file" name="image" accept="imsge/jpef, image/png" value="">
            </label>
        </div>
        <div>
            <input type="submit" name="submit" value="登録">
        </div>
        @csrf
    </form>

</body>
</html>
