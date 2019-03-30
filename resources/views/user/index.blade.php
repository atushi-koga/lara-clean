<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>
</head>
<body>
<div class="flex-center position-ref full-height">
  @foreach ($viewModel->users as $user)
    <p>UserId: {{ $user->id }}, name: {{ $user->name }}</p>
  @endforeach

  <p>ユーザ作成リクエスト</p>
  <form action="/user/create" method="post">
    @csrf
    <input type="input" name="name"> <input type="submit">
  </form>
</div>
</body>
</html>
