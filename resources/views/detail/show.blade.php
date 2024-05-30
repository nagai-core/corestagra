<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>画面詳細</title>
</head>
<body>
<h1>画面詳細</h1>
<ul>
    <li>
        <img src="{{$image->url}}" alt="">
    </li>
    <div>
        @foreach($image->users as $user)
        <li>
            <p>名前：{{$user->name}}</p>
        </li>
        <li>
            <p>コメント：{{$user->pivot->comment}}</p>
            @if ($userId == $user->pivot->user_id)
            <a href="/detail/{{$image->id}}/edit/{{$user->pivot->id}}">編集</a>
            @endif
        </li>
        @endforeach
    </div>
</ul>
<p>ユーザーID:{{$userId}}</p>
    <p>画像ID：{{$image->id}}</p>

<form action="/detail/{{$image->id}}" method="POST">
    <div>
        <input type="hidden" name="user_id" id="user_id" value="{{$userId}}">
        <input type="hidden" name="images_id" id="images_id" value="{{$image->id}}">
    </div>
    <div>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
    </div>
    <div>
        <input type="submit" value="投稿">
    </div>
    {{-- GET メソッド以外でリクエストする場合は、@csrfを含める --}}
    @csrf
</form>
</body>
</html>
