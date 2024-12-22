<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスワード登録ページ</title>
</head>
<body>
    <h1>パスワード登録フォーム</h1>
    
    <?php if (!empty($success_message)): ?>
        <p style="color: green;"><?= htmlspecialchars($success_message) ?></p>
    <?php elseif (!empty($error_message)): ?>
        <p style="color: red;"><?= htmlspecialchars($error_message) ?></p>
    <?php endif; ?>
    
    <form action="{{ url('/user_password/store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
            <label for="email">メールアドレス:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">パスワード:</label>
            <input type="text" id="password" name="password" required>
        </div>
        <button type="submit">登録</button>
    </form>
</body>
</html>