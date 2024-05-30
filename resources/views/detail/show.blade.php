<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/detailShow.css', 'resources/js/detail.js'])
    <title>画面詳細</title>
</head>
<body>
    <div class="addComment" onclick="add()">
        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" style="ftransform: ;msFilter:;"><path d="M20 2H4c-1.103 0-2 .897-2 2v18l4-4h14c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2z"></path></svg>
    </div>
<div class="detail">
    <div class="post">
        <h1>{{$image->comment}}</h1>
        <img src="../{{$image->url}}" alt="">
    </div>
    <div class="comment">
        @foreach($image->users as $user)
        <div class='arrow_box'>
            <p>{{$user->name}}</p>
            <p>{{$user->pivot->comment}}</p>
            @if ($userId == $user->pivot->user_id)
            <p>
                <a href="/detail/{{$image->id}}/edit/{{$user->pivot->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"></path><path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"></path></svg>
                </a>
            </p>
            @endif
        </div>
        @endforeach
    </div>
</div>
<form action="/detail/{{$image->id}}" method="POST" id="modal">
    <div class="position">
        <h2>コメント追加</h2>
        <input type="hidden" name="user_id" id="user_id" value="{{$userId}}">
        <input type="hidden" name="images_id" id="images_id" value="{{$image->id}}">
        <textarea name="comment" id="comment" ></textarea>
        <button type="submit">投稿</button>
    </div>
    @csrf
</form>
<div class="wrapper" id="wrapper" onclick="mclose()"></div>
    <script>
        let modal = document.querySelector("#modal");
        let modal2 = document.querySelector("#wrapper");
        modal.style.display = "none";
        modal2.style.display = "none";
        function add() {
            modal.style.display = "block";
            modal2.style.display = "block";
        }
        function mclose() {
            modal.style.display = "none";
            modal2.style.display = "none";
        }
    </script>
</body>
</html>
