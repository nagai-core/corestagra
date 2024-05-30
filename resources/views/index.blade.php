<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
</head>
<body>

<h2>検索</h2>
<form action="{{route("images.search")}}" method="get">
@csrf
<input type="text" name="keyword" value="{{ old("keyword") }}">
<input type="submit" value="検索">
</form>

    @foreach ($searches as $search)
        <img src="{{$search->url}}" alt="" width="200px">
    @endforeach
    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
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
    </form>
</body>
</html>
