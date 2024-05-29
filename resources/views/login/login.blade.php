<h1>ログイン画面</h1>
<form method="POST" action="">
@csrf
<input type="text" name="name" placeholder="ユーザー名"><br>
<input type="password" name="password" placeholder="パスワード"><br>
<input type="submit" value="ログイン">
</form>
