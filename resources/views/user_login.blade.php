<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>
    <h1>ログインフォーム</h1>
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="email">メールアドレス:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">パスワード:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">ログイン</button>
    </form>
</body>
</html>
