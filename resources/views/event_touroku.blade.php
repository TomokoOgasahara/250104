<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>イベント登録フォーム</title>
    <link rel="stylesheet" href="{{ asset('/event_touroku.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="title">    
    <div class="title1">STEM GATE</div>
    <div class="title2">企業データを活用して理工系女子の就職をワンストップでサポート</div>
    </div>

    <div class="form-container">
    <div class="pagename">イベント登録フォーム</div>
    
    <form action="{{ url('/event_touroku') }}" method="POST" enctype="multipart/form-data">

    @csrf
    <div class="form1">
            <label for="event_title">イベントタイトル:</label>
            <input type="text" id="event_title" name="event_title" required>
        </div>

    <div class="form1">
            <label for="date">年月日:</label>
            <input type="date" id="date" name="date" required>
        </div>

    <div class="form1">
        <label for="start_time">開始時間:</label>
        <input type="time" id="start_time" name="start_time" required>
        </div>

    <div class="form1">
        <label for="end_time">終了時間:</label>
        <input type="time" id="end_time" name="end_time" required>
        </div>

    <div class="form1">
        <label for="on_off">開催形式:</label>
        <select id="on_off" name="on_off" required>
            <option value="オンライン">オンライン</option>
            <option value="オフライン">オフライン</option>                    
        </select>
    </div>

    <div class="form1">
        <label for="explanation">説明:</label>
        <input type="text" id="explanation" name="explanation" required>
    </div>

    <div class="form1">
    <label for="event_image">イベント画像を登録:</label>
    <input type="file" id="event_image" name="event_image" accept="image/*" required>
    <div class="small">※ JPEG, PNG, GIF形式の画像を選択してください。</div>
    </div>

    <div class="form1">
    <label for="event_link">イベントURLを登録:</label>
    <input type="text" id="event_link" name="event_link" required>
    </div>

    <div class="form1">
            <label for="comp_name">企業名:</label>
            <select id="comp_name" name="comp_name" required>
                <option value="株式会社アイシン">株式会社アイシン</option>
                <option value="株式会社アドヴィックス">株式会社アドヴィックス</option>
                <option value="いすゞ自動車株式会社">いすゞ自動車株式会社</option>
                <option value="川崎重工業株式会社">川崎重工業株式会社</option>
                <option value="スズキ株式会社">スズキ株式会社</option>
                <option value="ダイハツ工業株式会社">ダイハツ工業株式会社</option>
                <option value="株式会社デンソー">株式会社デンソー</option>
                <option value="東海理化電機製作所">東海理化電機製作所</option>
                <option value="東芝エレベータ株式会社">東芝エレベータ株式会社</option>
                <option value="豊田合成株式会社">豊田合成株式会社</option>
                <option value="トヨタ自動車株式会社">トヨタ自動車株式会社</option>
                <option value="トヨタ自動車東日本株式会社">トヨタ自動車東日本株式会社</option>
                <option value="株式会社豊田自動織機">株式会社豊田自動織機</option>
                <option value="トヨタ車体株式会社">トヨタ車体株式会社</option>
                <option value="日産自動車株式会社">日産自動車株式会社</option>
                <option value="日本精工株式会社">日本精工株式会社</option>
                <option value="パナソニックオートモーティブシステムズ株式会社">パナソニックオートモーティブシステムズ株式会社</option>
                <option value="日立Astemo株式会社">日立Astemo株式会社</option>
                <option value="ボッシュ株式会社">ボッシュ株式会社</option>
                <option value="本田技研工業株式会社">本田技研工業株式会社</option>
                <option value="マツダ株式会社">マツダ株式会社</option>
                <option value="三菱自動車工業株式会社">三菱自動車工業株式会社</option>
                <option value="三菱重工業株式会社">三菱重工業株式会社</option>
                <option value="三菱ふそうトラック・バス株式会社">三菱ふそうトラック・バス株式会社</option>
                <option value="ヤマハ発動機株式会社">ヤマハ発動機株式会社</option>
                <option value="UDトラックス株式会社">UDトラックス株式会社</option>
                <option value="ユニプレス株式会社">ユニプレス株式会社</option>
            </select>
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