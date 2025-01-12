<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>求人一覧</title>
    <link rel="stylesheet" href="{{ asset('/recruit.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="title">    
    <div class="title1">STEM GATE</div>
    <div class="title2">企業データを活用して理工系女子の就職をワンストップでサポート</div>
    </div>

    <div class="form-container">
        <div class="pagename">求人一覧</div>

        @foreach($recruits as $recruit)
        <div class="content">
            <div class="workplace_image">
                <img src="{{ asset('storage/' . $recruit->workplace_image) }}" alt="職場イメージ">
            </div>
            <div class="recruit-info">
                <h2>{{ $recruit->comp_name }}</h2>
                <p><strong>{{ $recruit->job_title }}</strong></p>
                <ul>
                    <li><strong>専門:</strong> {{ $recruit->speciality }}</li>
                    <li><strong>勤務地:</strong>{{ $recruit->location }}</li>
                    <li><strong>キーワード:</strong> {{ $recruit->keyword }}</li>
                    <li><strong>特色:</strong> {{ $recruit->features }}</li>
                    <li><strong>雇用形態:</strong> {{ $recruit->employment_type }}</li>
                    <li><strong>業務内容:</strong> {{ $recruit->job_description }}</li>
                    <li><strong>応募資格:</strong> {{ $recruit->qualifications }}</li>
                    <li><strong>待遇:</strong> {{ $recruit->compensation }}</li>
                    <li><strong>やりがい:</strong> {{ $recruit->job_satisfaction }}</li>
                    <li><strong>在宅勤務:</strong> {{ $recruit->remote_work }}</li>
                    <li><strong>採用の背景:</strong> {{ $recruit->hiring_background }}</li>
                </ul>
                <a href="{{ $recruit->url }}" class="register-btn" target="_blank">詳細ページ</a>
            </div>
        </div>
        @endforeach
    </div>


    <footer class="copyright">
        &copy; 2024 Wom-tech All Rights Reserved.
    </footer>
</html>