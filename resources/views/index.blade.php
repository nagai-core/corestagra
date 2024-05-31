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

{{-- <h2>並び変え</h2>
<select name="sort">
    <option value="asc">昇順</option>
    <option value="desc">降順</option>
</select>
@if(isset($record))
@foreach ($posts as $post)
    <img src="{{$image->url}}" alt="" width="200px">
    {{ $post->comment}}
@endforeach
@endif --}}

@if(!isset($searches))
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
@else
    @foreach ($searches as $search)
    <ul>
        <li>
            <a href="/detail/{{$search->id}}"><img src="{{$search->url}}" alt="" width="200px"></a>
        </li>
        <li>
            <p>コメント：{{$search->comment}}</p>
        </li>
    </ul>
    @endforeach
@endif


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
