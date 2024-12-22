<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録ページ</title>
</head>
<body>
    <h1>登録フォーム</h1>
    
    <?php if (!empty($success_message)): ?>
        <p style="color: green;"><?= htmlspecialchars($success_message) ?></p>
    <?php elseif (!empty($error_message)): ?>
        <p style="color: red;"><?= htmlspecialchars($error_message) ?></p>
    <?php endif; ?>
    
    <form action="{{ url('/user_touroku/store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
            <label for="name">お名前:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="name_kana">カナ:</label>
            <input type="text" id="name_kana" name="name_kana" required>
        </div>
        <div>
            <label for="email">メールアドレス:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="pref">都道府県:</label>
            <input type="text" id="pref" name="pref" required>
        </div>
        <div>
            <label for="job">職業:</label>
            <select id="job" name="job" required>
                <option value="学部生">学部生</option>
                <option value="大学院生（修士）">大学院生（修士）</option>
                <option value="大学院生（博士）">大学院生（博士）</option>
                <option value="会社員">会社員</option>
                <option value="公務員">公務員</option>
                <option value="経営者">経営者</option>
            </select>
        </div>
        <div>
            <label for="comp_univ">所属先:</label>
            <input type="text" id="comp_univ" name="comp_univ" required>
        </div>
        <div>
            <label for="dep">学部または部署:</label>
            <input type="text" id="dep" name="dep" required>
        </div>
        <div>
            <label for="birth">生年月日:</label>
            <input type="date" id="birth" name="birth" required>
        </div>
        <button type="submit">登録</button>
    </form>
</body>
</html>