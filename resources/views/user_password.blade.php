<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>本登録フォーム</title>
    <link rel="stylesheet" href="{{ asset('/user_password.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="title">    
    <div class="title1">STEM GATE</div>
    <div class="title2">企業データを活用して理工系女子の就職をワンストップでサポート</div>
    </div>

    <div class="form-container">
    <div class="pagename">本登録フォーム</div>
    
    <?php if (!empty($success_message)): ?>
        <p style="color: green;"><?= htmlspecialchars($success_message) ?></p>
    <?php elseif (!empty($error_message)): ?>
        <p style="color: red;"><?= htmlspecialchars($error_message) ?></p>
    <?php endif; ?>
    
    <form action="{{ url('/user_password/store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form1">
            <label for="name">氏名:</label>
            <input type="text" id="name" name="name" required>
        </div>
    <div class="form1">
            <label for="email">メールアドレス:</label>
            <input type="email" id="email" name="email" required>
        </div>
    <div class="form2">
            <label for="password">パスワード:</label>
            <input type="text" id="password" name="password" required>
        </div>
        <div class="form18">
        <button type="submit" class="register-btn">登録</button></div>
    </form>
    </div>
    </body>

    <footer class="copyright">
        &copy; 2024 Wom-tech All Rights Reserved.
    </footer>
</html>