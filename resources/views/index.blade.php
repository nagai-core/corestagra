<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/index.css', 'resources/js/detail.js'])
    <title>home</title>
</head>
<body>
<header>
    <form action="{{route("images.search")}}" method="get">
        @csrf
        <input type="text" name="keyword" value="{{ old("keyword") }}">
        <button type="submit">検索</button>
    </form>
    <nav>
        @if($user)
            <a href="/dashboard">{{$user}}</a>
            <button onclick="add()">投稿</button>
        @else
        <a href="/login">ログイン</a>
        <a href="{{route("signUp.index")}}">新規登録</a>
        @endif
    </nav>
</header>
<main>
    @if(!isset($searches))
    <section>
        @foreach ($images as $image)
        <div class="img">
            <a href="/detail/{{$image->id}}">
                <div class="image">
                    <img src="{{$image->url}}" alt="">
                </div>
                <div class="info">
                    <p class="good">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M20.205 4.791a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z"></path></svg>
                        {{$image->favorite}}
                    </p>
                    <p>{{$image->comment}}</p>
                </div>
            </a>
        </div>
        @endforeach
    </section>
    @else
    <section>
        @foreach ($searches as $search)
        <div class="img">
            <a href="/detail/{{$search->id}}">
                <div class="image">
                    <img src="{{$search->url}}" alt="">
                </div>
                <div class="info">
                    <p class="good">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M20.205 4.791a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z"></path></svg>
                        {{$search->favorite}}
                    </p>
                    <p>{{$search->comment}}</p>
                </div>
            </a>
        </div>
        @endforeach
    </section>
    @endif
</main>
@if($id != 0)
<form action="{{route('upload')}}" method="POST" enctype="multipart/form-data" id="modal" class="modal">
    @csrf
    <div class="position">
        <h2>投稿</h2>
        <input id="image" type="file" name="image">
        <textarea name="comment" id=""></textarea>
        <button type="submit">投稿</button>
    </div>

        {{-- <label for="image">
            <p>アップロード画像</p>
            <input id="image" type="file" name="image">
        </label>
        <label for="comment">
            <p>コメント</p>
            <textarea name="comment" id="" cols="30" rows="10"></textarea>
        </label>
    </div>
    <button type="submit">送信</button>
    @csrf --}}
</form>
<div class="wrapper" id="wrapper" onclick="mclose()"></div>
@endif
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
