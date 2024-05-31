<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/edit.css', 'resources/js/app.js'])
    <title>コメント編集</title>
</head>
<body>
    <form action="{{route("commentEdit.update", ['imageId' => $imageId, 'commentId' => $commentId])}}" method="post">
        <div class="position">
            <h2>コメント編集</h2>
            <textarea type="text" name="comment">{{$comment->comment}}</textarea>
            <button>編集</button>
            <form action="{{route("commentEdit.destroy", ['imageId' => $imageId, 'commentId' => $commentId])}}" method="post">
                <button>削除</button>
                @csrf
                @method('DELETE')
            </form>
            <a href="/detail/{{$imageId}}">戻る</a>
        </div>
        @csrf
    </form>
</body>
</html>
