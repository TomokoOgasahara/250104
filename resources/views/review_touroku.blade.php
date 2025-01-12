<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>口コミ登録フォーム</title>
    <link rel="stylesheet" href="{{ asset('/review_touroku.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
<div class="title">    
<div class="title1">STEM GATE</div>
<div class="title2">企業データを活用して理工系女子の就職をワンストップでサポート</div>
</div>

<div class="form-container">
<div class="pagename">口コミ登録フォーム</div>

<div style="width: 100%; height: 100%; background: #F1F8FF; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 30px"></div>

    <form method="POST" action="/review_touroku">
    @csrf <!-- Laravelで必要なCSRFトークン -->
        <div  class="form1">
            <label for="name">氏名:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div  class="form2">
            <label for="email">メールアドレス:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form3">
            <label for="gender">性別:</label>
            <select id="gender" name="gender" required>
                <option value="女性">女性</option>
                <option value="男性">男性</option>
                <option value="回答しない">回答しない</option>
            </select>    
        </div>
        <div class="form4">
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
        <div class="form5">
            <label for="speciality">専門:</label>
            <select id="speciality" name="speciality" required>
                <option value="設計">設計</option>
                <option value="生産技術">生産技術</option>
                <option value="製造">製造</option>
                <option value="品質保証">品質保証</option>
            </select>
        </div>
        <div class="form6">
            <label for="employment_status">現職・退職済:</label>
            <select id="employment_status" name="employment_status" required>
                <option value="現職">現職</option>
                <option value="退職済">退職済</option>
            </select>
        </div>
        <div class="form7">
            <label for="years_of_service">勤続年数:</label>
            <select id="years_of_service" name="years_of_service" required>
                <option value="3年未満">3年未満</option>
                <option value="3~5年未満">3~5年未満</option>
                <option value="5~10年未満">5~10年未満</option>
                <option value="10~20年未満">10~20年未満</option>
                <option value="20~30年未満">20~30年未満</option>                
            </select>
        </div>
        <div class="form8">
            <label for="age_group">年代:</label>
            <select id="age_group" name="age_group" required>
                <option value="20代">20代</option>
                <option value="30代">30代</option>
                <option value="40代">40代</option>
                <option value="50代">50代</option>
                <option value="60代">60代</option>                
            </select>
        </div>
        <div class="form9">
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
        </div>
        <div class="form10">
            <label for="growth_potential">雇用形態:</label>
            <select id="growth_potential" name="growth_potential" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>                     
            </select>
        </div>
        <div class="form11">
            <label for="job_satisfaction">やりがい:</label>
            <select id="job_satisfaction" name="job_satisfaction" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>                     
            </select>
        </div>
        <div class="form12">
            <label for="organizational_climate">組織風土:</label>
            <select id="organizational_climate" name="organizational_climate" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>                     
            </select>
        </div>
        <div class="form13">
            <label for="social_contribution">社会貢献:</label>
            <select id="social_contribution" name="social_contribution" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>                     
            </select>
        </div>

        <div class="form14">
            <label for="salary">給与:</label>
            <select id="salary" name="salary" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>                     
            </select>
        </div>

        <div class="form15">
            <label for="benefits">福利厚生:</label>
            <select id="benefits" name="benefits" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>                     
            </select>
        </div>

        <div class="form16">
            <label for="female_advancement">女性活躍:</label>
            <select id="female_advancement" name="female_advancement" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>                     
            </select>
        </div>
        <div class="form17">
            <label for="reviews">口コミ:</label>
            <input type="reviews" id="reviews" name="reviews" required class="reviews">
        </div>
        <div class="form18">
        <button type="submit" class="register-btn">登録</button>
</div>
    </form>
</div>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <footer class="copyright">
        &copy; 2024 Wom-tech All Rights Reserved.
    </footer>
</body>
</html>