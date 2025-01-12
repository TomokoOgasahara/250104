<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ランディングページ</title>
    <link rel="stylesheet" href="{{ asset('/top.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>

<div class="title">    
    <div class="title1">STEM GATE</div>
    <div class="title2">企業データを活用して理工系女子の就職をワンストップでサポート</div>
</div>

<div class="name">ようこそ {{ ($name) }} さん</div>

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

<div class="button">
    <div class="button1"><a href="{{ asset('/comps_database') }}">企業情報の検索はこちら</a></div>
    <div class="button1"><a href="{{ asset('/review_touroku') }}" >口コミ投稿はこちら</a></div>
</div>

</body>

    <footer class="copyright">
        &copy; 2024 Wom-tech All Rights Reserved.
    </footer>
</html>