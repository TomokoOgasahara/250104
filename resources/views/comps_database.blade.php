<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業情報フォーム</title>
    <link rel="stylesheet" href="{{ asset('/comps_database.css') }}?v=2">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="title">
    <div class="title1"><a href="{{ asset('/top') }}">STEM GATE</a></div>
    <div class="title2">企業データを活用して理工系女子の就職をワンストップでサポート</div>
</div>

<!-- プルダウンフォーム -->
<form method="GET" action="{{ url('/comps_database') }}">
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

<!-- 口コミ評価グラフ -->

<div class="block1">
    <div class="graph1">
    <canvas id="ReviewChart"></canvas>
    </div>

<!-- 選択された企業のデータ表示 -->
    <div class="basicdata">
    @if (isset($selectedCompany) && $selectedCompany)
    <div class="bd2">
        <span class="label">企業名:</span>
        <span class="value">{{ $selectedCompany->comp_name }}</span>
    </div>
    <div class="bd2">
        <span class="label">平均年齢:</span>
        <span class="value">{{ $selectedCompany->av_age }}[歳]</span>
    </div>
    <div class="bd2">
        <span class="label">平均給与:</span>
        <span class="value">{{ $selectedCompany->av_salary }}[万円]</span>
    </div>
    <div class="bd2">
        <span class="label">売上:</span>
        <span class="value">{{ $selectedCompany->sales }}[100万円]</span>
    </div>
    <div class="bd2">
        <span class="label">営業利益率:</span>
        <span class="value">{{ $selectedCompany->profit }}[%]</span>
    </div>
    <div class="bd2">
        <span class="label">純利益率:</span>
        <span class="value">{{ $selectedCompany->net_profit }}[%]</span>
    </div>
    @else
    <div class="bd2">選択された企業のデータがありません。</div>
    @endif
    </div>
</div>

<!-- クチコミ詳細へのリンク -->
<div class="button2-container">
    <a href="{{ asset('/review') }}" class="button2">口コミ詳細はこちら</a>
</div>

<!-- 女性活躍DB見える化ダッシュボード表示 -->
<div class="menu2"><section id="section2">女性活躍DB　見える化ダッシュボード</div></section>

<div class="wd">
<div class="wd-box">
    <span class="wdlabel">女性従業員の離脱率ランキング:</span>
    <span class="wdvalue">{{ $rankingData['turnover_rate_rank'] ?? 'データ無し'}}</span>
    <div class="rank">位/27企業</div>
</div>
<div class="wd-box">
    <span class="wdlabel">平均勤続年数の差異ランキング:</span>
    <span class="wdvalue">{{ $rankingData['avg_tenure_rank'] ?? 'データ無し'}}</span>
    <div class="rank">位/27企業</div>
    </div>
<div class="wd-box">
    <span class="wdlabel">男女の賃金差ランキング:</span>
    <span class="wdvalue">{{ $rankingData['wage_gap_rank'] ?? 'データ無し'}}</span>
    <div class="rank">位/27企業</div>
</div>
</div>

<div class="block2">
        <!-- 女性比率グラフ -->
        <div class="graph2">
        <canvas id="genderChart"></canvas></div>

        <!-- 勤続年数グラフ -->
        <div class="graph2"> 
        <canvas id="tenureChart"></canvas></div>

        <!-- 賃金差グラフ -->
        <div class="graph2">
        <canvas id="wagegapChart"></canvas></div>
</div>

<div class="wd2">
<div class="wd-box2">
    <span class="wdlabel">平均残業時間</span>
    <span class="wdvalue">{{ $sonotaData['avg_overtime_hours'] ?? 'データ無し' }}</span>
    <div class="rank">時間</div>
</div>
<div class="wd-box2">
    <span class="wdlabel">有給休暇取得率（％）</span>
    <span class="wdvalue">{{ $sonotaData['paid_leave_usage_rate'] ?? 'データ無し' }}</span>
    <div class="rank">％</div>
    </div>
</div>

<!-- AIコメント表示 -->
<div class="menu2"><section id="section2">AIによる女性活躍度分析</section></div>

<div class="ai-comment">
<!-- 良いところセクション -->
<div class="ai-box-good">
    <span class="ai-box1">良いところ</span>
    <span class="aicomment">{{ $aiData['good_point'] ?? 'データ無し' }}</span>
</div>
  <!-- 悪いところセクション -->
<div class="ai-box-bad">
    <span class="ai-box1">悪いところ</span>
    <span class="aicomment">{{ $aiData['bad_point'] ?? 'データ無し' }}</span>
</div>
</div>

<!-- リンク先表示 -->
<div class="menu2"><section id="section2">イベント・求人情報リンク</section></div>

<div class="linkinfo">
    <div class="button3"><a href="{{ asset('/event') }}">イベント情報はこちら</a></div>
    <div class="button3"><a href="{{ asset('/recruit') }}" >求人情報はこちら</a></div>
</div>

<!-- イベント情報表示 -->


<footer class="copyright">
        &copy; 2024 Wom-tech All Rights Reserved.
</footer>

<script>
    // データ取得
    const reviewData = @json($averageScores ?? []);
    const genderData = @json($womensDataArray ?? []);
    const tenureData = @json($tenureDataArray ?? []);
    const wageGapData = @json($wageGapDataArray ?? []);

    // レビュー評価グラフ
// レビュー評価グラフ
if (reviewData.length) {
    const ctxReview = document.getElementById('ReviewChart').getContext('2d');
    new Chart(ctxReview, {
        type: 'radar',
        data: {
            labels: ['成長性', 'やりがい', '組織風土', '社会貢献', '給与', '福利厚生', '女性活躍'],
            datasets: [{
                label: '口コミ評価 (1〜5点)',
                data: reviewData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                r: {
                    beginAtZero: true,
                    min: 0,
                    max: 5,
                    ticks: {
                        stepSize: 1,
                        font: {
                            family: 'Zen Maru Gothic', // フォントファミリーを設定
                            size: 18, // フォントサイズを設定
                        }
                    },
                    pointLabels: {
                        font: {
                            family: 'Zen Maru Gothic', // 軸ラベルのフォントファミリー
                            size: 18, // 軸ラベルのフォントサイズ
                            weight: 'bold', // フォントの太さ（オプション）
                        },
                        color: '#333' // 軸ラベルの色（オプション）
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            family: 'Zen Maru Gothic', // 凡例のフォントファミリー
                            size: 18, // 凡例のフォントサイズ
                        }
                    }
                }
            }
        }
    });
}


    // 女性比率グラフ
if (genderData.length) {
    const ctxGender = document.getElementById('genderChart').getContext('2d');
    new Chart(ctxGender, {
        type: 'bar',
        data: {
            labels: ['労働者', '監督者', '管理職', '役員'],
            datasets: [{
                label: '女性比率 (%)',
                data: genderData,
                backgroundColor: 'rgba(66, 129, 200, 0.5)',
                borderColor: 'rgba(66, 129, 200, 1.0)',
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false, // 縦横比をカスタマイズ可能に
            responsive: true, // レスポンシブ対応
            scales: {
                y: {
                    beginAtZero: true,
                    max: 50,
                    stepSize: 10,
                    title: {
                        display: true,
                        text: '女性割合 (%)',
                        font: {
                            family: 'Zen Maru Gothic', // フォントファミリー
                            size: 14 // フォントサイズ
                        }
                    },
                    ticks: {
                        font: {
                            family: 'Zen Maru Gothic', // フォントファミリー
                            size: 12 // フォントサイズ
                        }
                    }
                },
                x: {
                    ticks: {
                        font: {
                            family: 'Zen Maru Gothic', // フォントファミリー
                            size: 12 // フォントサイズ
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            family: 'Zen Maru Gothic', // フォントファミリー
                            size: 14 // フォントサイズ
                        }
                    }
                },
                title: {
                    display: true,
                    text: '女性従業員の割合 (%)',
                    font: {
                        family: 'Zen Maru Gothic', // フォントファミリー
                        size: 16, // タイトルのフォントサイズ
                    },
                    padding: { top: 10, bottom: 10 } // タイトルとグラフの間隔
                }
            }
        }
    });
}
    // 勤続年数グラフ
    if (tenureData.length) {
        const ctxTenure = document.getElementById('tenureChart').getContext('2d');
        new Chart(ctxTenure, {
            type: 'bar',
            data: {
                labels: ['男性', '女性'],
                datasets: [{
                    label: '平均勤続年数 (年)',
                    data: tenureData,
                    backgroundColor: 'rgba(66, 129, 200, 0.5)',
                    borderColor: 'rgba(66, 129, 200, 1.0)',
                    borderWidth: 1
                }]
            },
            options: {
            maintainAspectRatio: false, // 縦横比をカスタマイズ可能に
            responsive: true, // レスポンシブ対応
            scales: {
                y: {
                    beginAtZero: true,
                    max: 30,
                    stepSize: 10,
                    title: {
                        display: true,
                        text: '平均勤続年数 (年)',
                        font: {
                            family: 'Zen Maru Gothic', // フォントファミリー
                            size: 14 // フォントサイズ
                        }
                    },
                    ticks: {
                        font: {
                            family: 'Zen Maru Gothic', // フォントファミリー
                            size: 12 // フォントサイズ
                        }
                    }
                },
                x: {
                    ticks: {
                        font: {
                            family: 'Zen Maru Gothic', // フォントファミリー
                            size: 12 // フォントサイズ
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            family: 'Zen Maru Gothic', // フォントファミリー
                            size: 14 // フォントサイズ
                        }
                    }
                },
                title: {
                    display: true,
                    text: '平均勤続年数 (年)',
                    font: {
                        family: 'Zen Maru Gothic', // フォントファミリー
                        size: 16, // タイトルのフォントサイズ
                    },
                    padding: { top: 10, bottom: 10 } // タイトルとグラフの間隔
                }
            }
        }
    });
}
    // 賃金差グラフ
    if (wageGapData.length) {
        const ctxWageGap = document.getElementById('wagegapChart').getContext('2d');
        new Chart(ctxWageGap, {
            type: 'bar',
            data: {
                labels: ['男性', '女性'],
                datasets: [{
                    label: '男女の賃金差 (％)',
                    data: wageGapData,
                    backgroundColor: 'rgba(66, 129, 200, 0.5)',
                    borderColor: 'rgba(66, 129, 200, 1.0)',
                    borderWidth: 1
                }]
            },
            options: {
            maintainAspectRatio: false, // 縦横比をカスタマイズ可能に
            responsive: true, // レスポンシブ対応
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    stepSize: 10,
                    title: {
                        display: true,
                        text: '男性100に対する女性の賃金 (％)',
                        font: {
                            family: 'Zen Maru Gothic', // フォントファミリー
                            size: 14 // フォントサイズ
                        }
                    },
                    ticks: {
                        font: {
                            family: 'Zen Maru Gothic', // フォントファミリー
                            size: 12 // フォントサイズ
                        }
                    }
                },
                x: {
                    ticks: {
                        font: {
                            family: 'Zen Maru Gothic', // フォントファミリー
                            size: 12 // フォントサイズ
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            family: 'Zen Maru Gothic', // フォントファミリー
                            size: 14 // フォントサイズ
                        }
                    }
                },
                title: {
                    display: true,
                    text: '男性100に対する女性の賃金 (％)',
                    font: {
                        family: 'Zen Maru Gothic', // フォントファミリー
                        size: 16, // タイトルのフォントサイズ
                    },
                    padding: { top: 10, bottom: 10 } // タイトルとグラフの間隔
                }
            }
        }
    });
}
</script>


</body>
</html>
