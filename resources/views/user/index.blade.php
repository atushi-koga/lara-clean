<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>
</head>
<body>
<div class="flex-center position-ref full-height">
  <p>ユーザ作成リクエスト</p>
  <form action="/user/create" method="post">
    @csrf
    <div>
      <label> name: <input type="text" name="name"> </label>
    </div>
    <div>
      <label> email: <input type="text" name="email"> </label>
    </div>
    <div>
      <label> password: <input type="text" name="password"> </label>
    </div>

    <button type="submit">submit</button>
  </form>

  @foreach ($viewModel->users as $user)
    <p><a href="{{ route('user.detail', ['id' => $user->id]) }}">UserId: {{ $user->id }}, name: {{ $user->name }}</a></p>
  @endforeach
</div>
</body>
</html>
