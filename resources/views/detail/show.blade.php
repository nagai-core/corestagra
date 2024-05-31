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
<div>
    <img src="../{{$image->url}}" alt="" width="400px">
    <p>{{$image->comment}}</p>
    @if ($userId == $image->user_id)
    <form action="{{route('detail.delete',$image->id)}}" method="POST">
        <input type="hidden" name="image_id" id="image_id" value="{{$image->id}}">
        <input type="submit" value="削除" onclick='return confirm("本当に削除しますか？")'>
        @csrf
        @method('DELETE')
    </form>
    @endif
</div>

<ul>
    <div>
        @foreach($image->users as $user)
        @if($user->pivot->delete_flg == 0)
        <li>
            <p>名前：{{$user->name}}</p>
        </li>
        <li>
            <p>コメント：{{$user->pivot->comment}}</p>
            @if ($userId == $user->pivot->user_id)
            <a href="/detail/{{$image->id}}/edit/{{$user->pivot->id}}">編集</a>
            @endif
        </li>
        @endif
        @endforeach
    </div>
</ul>
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
<a href="{{route('index')}}">一覧に戻る</a>
</body>
</html>
