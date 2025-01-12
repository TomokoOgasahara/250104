<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録ページ</title>
    <link rel="stylesheet" href="<?php echo e(asset('/review_touroku.css')); ?>">

    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="title">    
<div class="title1">STEM GATE</div>
<div class="title2">企業データを活用して理工系女子の就職をワンストップでサポート</div>
</div>

<div class="form-container">
<div class="pagename">会員登録フォーム</div>
    
    <?php if (!empty($success_message)): ?>
        <p style="color: green;"><?= htmlspecialchars($success_message) ?></p>
    <?php elseif (!empty($error_message)): ?>
        <p style="color: red;"><?= htmlspecialchars($error_message) ?></p>
    <?php endif; ?>
    
    <form action="<?php echo e(url('/user_touroku/store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
        <div class="form1">
            <label for="name">お名前:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form2">
            <label for="name_kana">カナ:</label>
            <input type="text" id="name_kana" name="name_kana" required>
        </div>
        <div class="form3">
            <label for="email">メールアドレス:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form4">
            <label for="pref">都道府県:</label>
            <input type="text" id="pref" name="pref" required>
        </div>
        <div class="form5">
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
        <div class="form6">
            <label for="comp_univ">所属先:</label>
            <input type="text" id="comp_univ" name="comp_univ" required>
        </div>
        <div class="form7">
            <label for="dep">学部または部署:</label>
            <input type="text" id="dep" name="dep" required>
        </div>
        <div class="form8">
            <label for="birth">生年月日:</label>
            <input type="date" id="birth" name="birth" required>
        </div>
        <div class="form18">
        <button type="submit" class="register-btn">登録</button>
        </div>
    </form>
</div>
</body>
    <footer class="copyright">
        &copy; 2024 Wom-tech All Rights Reserved.
    </footer>
</html>



<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gs-laravel/resources/views/user_touroku.blade.php ENDPATH**/ ?>