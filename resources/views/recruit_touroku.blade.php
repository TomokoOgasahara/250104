<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>採用登録フォーム</title>
    <link rel="stylesheet" href="{{ asset('/recruit_touroku.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="title">    
    <div class="title1">STEM GATE</div>
    <div class="title2">企業データを活用して理工系女子の就職をワンストップでサポート</div>
    </div>

    <div class="form-container">
    <div class="pagename">採用登録フォーム</div>
    
    <form action="{{ url('/recruit_touroku') }}" method="POST" enctype="multipart/form-data">

    @csrf
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

    <div class="form1">
        <label for="job_title">募集タイトル:</label>
        <input type="text" id="job_title" name="job_title" required>
    </div>

    <div class="form1">
            <label for="speciality">専門:</label>
            <select id="speciality" name="speciality" required>
                <option value="設計">設計</option>
                <option value="生産技術">生産技術</option>
                <option value="製造">製造</option>
                <option value="品質保証">品質保証</option>
            </select>
        </div>

    <div class="form1">
        <label for="location">勤務地:</label>
        <input type="text" id="location" name="location">
    </div>

    <div class="form1">
        <label for="keyword">キーワード:</label>
        <input type="text" id="keyword" name="keyword">
    </div>

    <div class="form1">
        <label for="features">特色:</label>
        <input type="text" id="features" name="features">
    </div>

    <div class="form1">
            <label for="employment_type">雇用形態:</label>
            <select id="employment_type" name="employment_type" required>
                <option value="正社員">正社員</option>
                <option value="契約社員">契約社員</option>
                <option value="派遣社員">派遣社員</option>
                <option value="業務委託">業務委託</option>
                <option value="嘱託社員">嘱託社員</option>
                <option value="インターン">インターン</option>
                <option value="副業・兼業">副業・兼業</option>                                
            </select>

        <label for="job_description">業務内容:</label>
        <textarea id="job_description" name="job_description" rows="5"></textarea>

        <label for="qualifications">応募資格:</label>
        <textarea id="qualifications" name="qualifications" rows="5"></textarea>

        <label for="compensation">待遇:</label>
        <textarea type="compensation" id="compensation" name="compensation"></textarea>

        <div class="form1">
        <label for="workplace_image">職場イメージを登録:</label>
        <input type="file" id="workplace_image" name="workplace_image" accept="image/*" required>
        <div class="small">※ JPEG, PNG, GIF形式の画像を選択してください。</div>
        </div>

    <div class="form1">
        <label for="job_satisfaction">やりがい:</label>
        <input type="text" id="job_satisfaction" name="job_satisfaction">
    </div>

    <div class="form1">
        <label for="remote_work">在宅勤務:</label>
        <input type="text" id="remote_work" name="remote_work">
    </div>

    <div class="form1">
        <label for="hiring_background">採用の背景:</label>
        <textarea id="hiring_background" name="hiring_background" rows="3"></textarea>
    </div>

    <div class="form1">
        <label for="url">募集リンク:</label>
        <input type="url" id="url" name="url">
    </div>

    <div class="form18">
    <button type="submit" class="register-btn">登録</button></div>

    </form>
    </div></div>
    </body>

    <footer class="copyright">
        &copy; 2024 Wom-tech All Rights Reserved.
    </footer>
</html>