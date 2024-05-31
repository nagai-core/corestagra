<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/signUp.css', 'resources/js/app.js'])
    <title>会員登録</title>
</head>
<body>
    {{-- @foreach ($errors->all() as $key => $error)
    <li> <span class="error">{{ $error }}</span></li>
    @endforeach --}}
    <div class="signUp">
        <h1>会員登録</h1>
        <form action="{{route('signUp.create')}}" method="POST">
            <div>
                <div class="label">
                    <p>name</p>
                    @if ($errors->has('name'))
                    <p class="error">*{{$errors->first('name')}}</p>
                    @endif
                </div>
                <input class="@if ($errors->has('name')) red @endif"  type="text" name="name" value="{{ old('name') }}">
            </div>
            <div>
                <div class="label">
                    <p>email</p>
                    @if ($errors->has('email'))
                    <p class="error">*{{$errors->first('email')}}</p>
                    @endif
                </div>
                <input class="@if ($errors->has('email')) red @endif" type="email" name="email" value="{{ old('email') }}">
            </div>
            <div>
                <div class="label">
                    <p>password</p>
                    @if ($errors->has('password'))
                    <p class="error">*{{$errors->first('password')}}</p>
                    @endif
                </div>
                <input class="@if ($errors->has('password')) red @endif" type="password" name="password" value="{{ old('password') }}">
            </div>
            <button type="submit">確認画面へ</button>
            {{-- <div>
                <label>
                    アイコン
                    <input type="file" name="icon" accept="image/jpef, image/png" value="">
                </label>
            </div> --}}
            @csrf
        </form>
    </div>
</body>
</html>
