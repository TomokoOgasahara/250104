<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ランディングページ</title>
    <link rel="stylesheet" href="{{ asset('/landing.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>

<div class="title">    
    <div class="title1">STEM GATE</div>
    <div class="title2">企業データを活用して理工系女子の就職をワンストップでサポート</div>
</div>

<div class="topbutton">
    <div class="button1"><a href="{{ asset('/user_tou') }}">会員登録はこちら</a></div>
    <div class="button1"><a href="{{ asset('/log') }}">ログインはこちら</a></div>
    <div class="button2"><a href="#section5" >人事担当者はこちら</a></div>
</div>

<div class="menu">
    <div class="menu1"><a href="#section1">STEM GATEでできること</a></div>
    <div class="menu1"><a href="#section2">導入企業</a></div>    
    <div class="menu1"><a href="#section3">利用者の声</a></div>
    <div class="menu1"><a href="#section4">よくある質問</a></div>
    <div class="menu1"><a href="#section5">お問い合わせフォーム</a></div>
</div>

<div class="topimage">
    <div class="text-overlay">
    <style>
    .topimage {
        background-image: url('/gs-laravel/public/image/image1.png'); /* 背景画像 */
    }
    </style>
        <div class="servicename">STEM GATE</div>
        <div class="copy">自分らしく、一歩踏み出す</div>
    </div>
</div>

<div class="menu2"><section id="section1">STEM GATEでできること</div></section>

<div class="sentence1">STEM GATEは理工系女子に特化した就職サポートサービスです</div>
<div class="sentence2">自分のキャリアを自分でつくる、その第一歩をサポートします</div>

<div class="dekirukoto">
    <div class="dekirukoto1">
        <div class="sentence3">独自の分析で女性活躍を見える化</div>
        <img src="{{ asset('image/image2.png') }}" alt="Image 2" class="responsive-image"/>
        <div class="sentence4">✓　女性活躍データベースの情報をダッシュボードでわかりやすく見える化</div>
        <div class="sentence4">✓　他企業との比較結果からAIが女性活躍の本気度を診断</div>
    </div>

    <div class="dekirukoto1">
    <div class="sentence3">信頼出来る口コミ</div>
        <img src="{{ asset('image/image3.png') }}" alt="Image 3" class="responsive-image"/>
        <div class="sentence4">✓　理工系女性コミュニティWom-techで集めた信頼出来る生の声</div>
        <div class="sentence4">✓　気になる企業に勤めるセンパイに直接相談出来る</div>
    </div>
</div>

<div class="button">
    <div class="register-btn"><a href="/user_tou">会員登録はこちら</a></div>
</div>

<div class="menu2"><section id="section2">STEM GATE導入企業</div></section>

<div class="logo">
    <img src="{{ asset('image/image4.png') }}" alt="Image 4" class="responsive-image2"/>
    <img src="{{ asset('image/image4.png') }}" class="responsive-image2"/>
    <img src="{{ asset('image/image4.png') }}" class="responsive-image2"/>
    <img src="{{ asset('image/image4.png') }}" class="responsive-image2"/>
    <img src="{{ asset('image/image4.png') }}" class="responsive-image2"/>
    <img src="{{ asset('image/image4.png') }}" class="responsive-image2"/>
</div>
<div class="logo">
<img src="{{ asset('image/image4.png') }}" alt="Image 4" class="responsive-image2"/>
    <img src="{{ asset('image/image4.png') }}" class="responsive-image2"/>
    <img src="{{ asset('image/image4.png') }}" class="responsive-image2"/>
    <img src="{{ asset('image/image4.png') }}" class="responsive-image2"/>
    <img src="{{ asset('image/image4.png') }}" class="responsive-image2"/>
    <img src="{{ asset('image/image4.png') }}" class="responsive-image2"/>
</div>

<div class="menu2"><section id="section3">利用者の声</div></section>

<div class="riyousya">
    <div class="riyousya1">
        <img src="{{ asset('image/image5.png') }}" alt="Image 5" class="responsive-image"/>
        <div class="sentence4">〇〇大学理学部　S.Aさん</div>
        <div class="sentence4">安心して働ける企業を見つけることができました</div>
    </div>

    <div class="riyousya1">
        <img src="{{ asset('image/image6.png') }}" alt="Image 6" class="responsive-image"/>
        <div class="sentence4">〇〇大学理学部　S.Aさん</div>
        <div class="sentence4">安心して働ける企業を見つけることができました</div>
    </div>
</div>

<div class="menu2"><section id="section4">よくある質問</div></section>

<div class="shitsumon">
    <div class="sentence5">Q　どのような企業を紹介していますか？</div>
    <div class="sentence4">理工系女性の求人に力を入れている中小企業〜大企業まで幅広く掲載しています</div>
</div>    

<div class="shitsumon">
    <div class="sentence5">Q　男性も登録できますか？</div>
    <div class="sentence4">女性向けのサービスですので、男性の登録はお断りしております</div> 
</div>

<div class="menu2"><section id="section5">お問い合わせフォーム</div></section>

<div class="sentence1">お問い合わせはこちらからお願いします</div>
<div class="sentence2">3営業日以内に返信させていただきます</div>

@if (session('success'))
    @endif

    <form action="{{ asset('/landing') }}" method="POST">
        @csrf
        <div class="form1">
            <label for="name">氏名:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form2">
            <label for="company">会社名:</label>
            <input type="text" id="company" name="company" required>
        </div>
        <div class="form2">
            <label for="email">メール:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form1">
            <label for="tell">電話番号:</label>
            <input type="text" id="tell" name="tell" required>
        </div>
        <div class="form1">
            <label for="question">お問い合わせ内容:</label>
            <textarea id="question" name="question" rows="5" required></textarea>

        </div>
        <div class="form18">
            <button type="submit" class="register-btn">送信</button>
        </div>
    </form>

</body>

    <footer class="copyright">
        &copy; 2024 Wom-tech All Rights Reserved.
    </footer>
</html>