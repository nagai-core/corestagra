<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
</head>
<body>
    @foreach ($images as $image)
    <ul>
        <li>
            <a href="/detail/{{$image->id}}"><img src="{{$image->url}}" alt="" width="200px"></a>
        </li>
        <li>
            <p>コメント：{{$image->comment}}</p>
        </li>
    </ul>
    @endforeach
    <form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
        <div>
            <label for="image">
                <p>アップロード画像</p>
                <input id="image" type="file" name="image">
            </label>
            <label for="comment">
                <p>コメント</p>
                <textarea name="comment" id="" cols="30" rows="10"></textarea>
            </label>
        </div>
        <button type="submit">送信</button>
        @csrf
    </form>
</body>
</html>
