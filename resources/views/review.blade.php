<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>口コミ一覧</title>
    <link rel="stylesheet" href="{{ asset('review.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="title">    
    <div class="title1">STEM GATE</div>
    <div class="title2">企業データを活用して理工系女子の就職をワンストップでサポート</div>
    </div>

<!-- 企業リストの表示 -->
<div class="form-container">
        <form method="GET" action="{{ url('/review') }}">
            <label for="comp_name" class="sentaku">企業名を選択してください:</label>
            <select name="comp_name" id="comp_name" required>
                <option value="">--選択してください--</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->comp_name }}" 
                            {{ request('comp_name') === $company->comp_name ? 'selected' : '' }}>
                        {{ $company->comp_name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="button1">検索</button>
        </form>
    </div>

    <div class="pagename">口コミ一覧</div>

        @if ($review && $review->isNotEmpty())
        @foreach($review as $reviews)
        <div class="review-card">
            <div class="review-header">
                <h3>{{ $reviews->name }} さん</h3>
                <div class="review-rating">
                    クチコミ総合評価 
                    <span class="stars">
                        {{ str_repeat('★', $reviews->growth_potential) }}
                        {{ str_repeat('☆', 5 - $reviews->growth_potential) }}
                    </span>
                </div>
            </div>
            <div class="review-details">
                回答者: {{ $reviews->employment_status }}／{{ $reviews->speciality }}／{{ $reviews->years_of_service }}／{{ $reviews->age_group }}／{{ $reviews->employment_type }}
            </div>
            <div class="review-comment">
                {{ $reviews->reviews }}
            </div>
        </div>
        @endforeach
    @else
        <p>口コミデータがありません。</p>
    @endif
    </div>

    <footer class="copyright">
        &copy; 2024 Wom-tech All Rights Reserved.
    </footer>
</html>