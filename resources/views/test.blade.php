
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/sample.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.jsを読み込む -->
    <title>行動を促す女性活躍データベース見える化サイト</title>
</head>
<body>

<!-- ヘッダー -->    
<header>
    <div class="img">
    <img src="img/Header1.jpeg" alt="">
    </div>
    <h1>行動を促す<br>女性活躍データベース見える化サイト</h1>
</header>

<div class="select">
    <h2>企業名を選択してください</h2>
    <select id="companySelect">
        <option value="">企業名を選択</option>
    </select>
</div>

<div class="graph">
    <h4>働きがいに関する指標</h4>

    <div class="graph-container">

        <!-- 1つ目のグラフボックス -->
        <div class="graph-box">
            <h4 class="graph-title">採用した労働者に占める割合（％）</h4>
            <canvas id="myPieChart1" width="100" height="100"></canvas>
        </div>

        <!-- 2つ目のグラフボックス -->
        <div class="graph-box">
            <h4 class="graph-title">労働者に占める割合（％）</h4>
            <canvas id="myPieChart2" width="200" height="200"></canvas>
        </div>

        <!-- 3つ目のグラフボックス -->
        <div class="graph-box">
            <h4 class="graph-title">係長級にある者に占める労働者の割合（％）</h4>
            <canvas id="myPieChart3" width="200" height="200"></canvas>
        </div>

        <!-- 4つ目のグラフボックス -->
        <div class="graph-box">
            <h4 class="graph-title">管理職に占める労働者の割合（％）</h4>
            <canvas id="myPieChart4" width="200" height="200"></canvas>
        </div>

        <!-- 5つ目のグラフボックス -->
        <div class="graph-box">
            <h4 class="graph-title">役員に占める割合（％）</h4>
            <canvas id="myPieChart5" width="200" height="200"></canvas>
        </div>

        <!-- 6つ目のグラフボックス -->
        <div class="graph-box">
            <h4 class="graph-title">各階層での女性割合（％）</h4>
            <canvas id="myBarChart" width="200" height="200"></canvas>
        </div>

</div>    

<h4>働きやすさに関する指標</h4>
<div class="working-condition-container">

    <div class="working-condition-box">
        <h4 class="condition-title">平均勤続年数 男性(年)</h4>
        <span class="result-number" id="averageTenureMale">10</span>
    </div>

    <div class="working-condition-box">
        <h4 class="condition-title">平均勤続年数 女性(年)</h4>
        <span class="result-number" id="averageTenureFemale">8</span>
    </div>

    <div class="working-condition-box">
        <h4 class="condition-title">育児休業取得率 男性（％）</h4>
        <span class="result-number" id="averageChildcareMale">5</span>
    </div>

    <div class="working-condition-box">
        <h4 class="condition-title">育児休業取得率 女性（％）</h4>
        <span class="result-number" id="averageChildcareFemale">90</span>
    </div>

    <div class="working-condition-box">
        <h4 class="condition-title">平均残業時間（時間）</h4>
        <span class="result-number" id="averageOvertime">15</span>
    </div>

    <div class="working-condition-box">
        <h4 class="condition-title">年次有給休暇の取得率（％）</h4>
        <span class="result-number" id="averageLeave">70</span>
    </div>
</div>

<h4>女性活躍診断結果</h4>
<div class="judge">

    <!-- 診断結果のボックス -->
    <div class="working-condition-box2">
        <h4 class="condition-title">賃金差診断結果</h4>
        <span class="result-number" id="wageGapResult"></span>
    </div>

    <div class="working-condition-box2">
        <h4 class="condition-title">男女の勤続年数の差異(%)</h4>
        <span class="result-number" id="tenureGapResult"></span>
    </div>

    <div class="working-condition-box2">
        <h4 class="condition-title">管理職まで昇進する割合(%)</h4>
        <span class="result-number" id="ratioGapResult"></span>
    </div>
</div>


<!-- Copyright -->
<div class="Copyright">
    <p>copyrights 2024 Wom-tech All RIghts Reserved.</p>
    </div>

<script>
    const apiKey = 'AIzaSyBnQAGiVinS22UqNbB4GP_mMr3eLIQ1r8s'; // Google Sheets APIキー
    const spreadsheetId = '1kYH-5XiXLs4VVCNmyZS9D3iMkkXQrg2I1T4OD4dYWcQ'; // スプレッドシートID
    const range = 'シート1!A2:AE'; // データ範囲
    const q4Range = 'シート1!Q4'; // Q4セルの範囲（全体の平均賃金差）
    const ab4RangeUrl = 'シート1!AB4'; // AB4セルの範囲（勤続年数の差異）
    const ac4RangeUrl = 'シート1!AC4'; // AC4セルの範囲（女性割合の減少率）

    const url = `https://sheets.googleapis.com/v4/spreadsheets/${spreadsheetId}/values/${range}?key=${apiKey}`;
    const q4Url = `https://sheets.googleapis.com/v4/spreadsheets/${spreadsheetId}/values/${q4Range}?key=${apiKey}`;
    const ab4Url = `https://sheets.googleapis.com/v4/spreadsheets/${spreadsheetId}/values/${ab4RangeUrl}?key=${apiKey}`;
    const ac4Url = `https://sheets.googleapis.com/v4/spreadsheets/${spreadsheetId}/values/${ac4RangeUrl}?key=${apiKey}`;

    let allData = [];
    let labels = ['全労働者', '主任', '管理職', '役員'];
    let femaleRatios = [];
    let averageWageGap = 0;
    let averageTenureGap = 0;
    let averageRatioGap = 0;
    
    // 平均賃金差を取得
    fetch(q4Url)
    .then(response => response.json())
    .then(data => {
        averageWageGap = parseFloat(data.values[0][0]);
    })
    .catch(error => console.error('Error fetching average wage gap:', error));

    // 男女の勤続年数の差異を取得
    fetch(ab4Url)
        .then(response => response.json())
        .then(data => {
            averageTenureGap = parseFloat(data.values[0][0]);
        })
        .catch(error => console.error('Error fetching average ex gap:', error));

    // 女性の減少率を取得
    fetch(ac4Url)
        .then(response => response.json())
        .then(data => {
            averageRatioGap = parseFloat(data.values[0][0]);
        })
        .catch(error => console.error('Error fetching average ratio gap:', error));

    // Google Sheets APIからデータを取得
    fetch(url)
        .then(response => response.json())
        .then(data => {
            allData = data.values;
            populateDropdown(allData); // プルダウンに企業名を追加
        })
        .catch(error => console.error('Error:', error));

    // プルダウンメニューに企業名を追加
    function populateDropdown(data) {
        const selectElement = document.getElementById('companySelect');
        const companies = [...new Set(data.map(row => row[0]))]; // 重複しない企業名を抽出

        companies.forEach(company => {
            const option = document.createElement('option');
            option.value = company;
            option.textContent = company;
            selectElement.appendChild(option);
        });
    }
    // 企業を選択した際にデータを更新
    document.getElementById('companySelect').addEventListener('change', function() {
            const selectedCompany = this.value;
            updateWageGapResult(selectedCompany); // 賃金差診断結果を更新
            updateData(selectedCompany); // 働きやすさに関する指標を更新
            updatetenureGapResult(selectedCompany); // 男女の勤続年数の差異を更新
            updateRatioGapResult(selectedCompany); // 女性割合の減少率を更新
        });

    // Google Sheets APIからデータを取得
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            allData = data.values; // すべてのデータを保存
            populateDropdown(allData); // プルダウンメニューに企業名を追加
        })
        .catch(error => {
            console.error('Error:', error);
        });

    // 採用した労働者に占める割合（％）のグラフ作成
    document.getElementById('companySelect').addEventListener('change', function() {
        const selectedCompany = this.value;
        const filteredData = allData.filter(row => row[0] === selectedCompany);

        if (filteredData.length > 0) {
            const femaleValue1 = parseFloat(filteredData[0][5]); // F列のデータ（男性）
            const maleValue1 = parseFloat(filteredData[0][6]); // G列のデータ（女性）
            const femaleValue2 = parseFloat(filteredData[0][8]); // H列のデータ（男性）
            const maleValue2 = parseFloat(filteredData[0][9]); // I列のデータ（女性）
            const femaleValue3 = parseFloat(filteredData[0][10]); // H列のデータ（男性）
            const maleValue3 = parseFloat(filteredData[0][11]); // I列のデータ（女性）
            const femaleValue4 = parseFloat(filteredData[0][12]); // H列のデータ（男性）
            const maleValue4 = parseFloat(filteredData[0][13]); // I列のデータ（女性）
            const femaleValue5 = parseFloat(filteredData[0][14]); // H列のデータ（男性）
            const maleValue5 = parseFloat(filteredData[0][15]); // I列のデータ（女性）

            createPieChart1(maleValue1, femaleValue1); // 1つ目の円グラフを作成
            createPieChart2(maleValue2, femaleValue2); // 2つ目の円グラフを作成
            createPieChart3(maleValue3, femaleValue3); // 3つ目の円グラフを作成
            createPieChart4(maleValue4, femaleValue4); // 4つ目の円グラフを作成
            createPieChart5(maleValue5, femaleValue5); // 5つ目の円グラフを作成

        }
    });

    // 1つ目の円グラフを作成する関数
    function createPieChart1(maleValue, femaleValue) {
        const ctx1 = document.getElementById('myPieChart1').getContext('2d');
        
        // 既存のチャートがあれば破棄
        if (window.pieChart1) {
            window.pieChart1.destroy();
        }

        // 新しい円グラフを作成
        window.pieChart1 = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: ['男性', '女性'], // ラベルを設定
                datasets: [{
                    data: [maleValue, femaleValue], // 男性と女性のデータ
                    backgroundColor: ['blue', 'pink'], // 男性と女性の色
                    borderColor: ['white']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    }

    // 2つ目の円グラフを作成する関数
    function createPieChart2(maleValue, femaleValue) {
        const ctx2 = document.getElementById('myPieChart2').getContext('2d');
        
        // 既存のチャートがあれば破棄
        if (window.pieChart2) {
            window.pieChart2.destroy();
        }

        // 新しい円グラフを作成
        window.pieChart2 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['男性', '女性'], // ラベルを設定
                datasets: [{
                    data: [maleValue, femaleValue], // 男性と女性のデータ
                    backgroundColor: ['blue', 'pink'], // 男性と女性の色
                    borderColor: ['white']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    }

    // 3つ目の円グラフを作成する関数
    function createPieChart3(maleValue, femaleValue) {
        const ctx2 = document.getElementById('myPieChart3').getContext('2d');
        
        // 既存のチャートがあれば破棄
        if (window.pieChart3) {
            window.pieChart3.destroy();
        }

        // 新しい円グラフを作成
        window.pieChart3 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['男性', '女性'], // ラベルを設定
                datasets: [{
                    data: [maleValue, femaleValue], // 男性と女性のデータ
                    backgroundColor: ['blue', 'pink'], // 男性と女性の色
                    borderColor: ['white']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    }

   // 4つ目の円グラフを作成する関数
   function createPieChart4(maleValue, femaleValue) {
        const ctx2 = document.getElementById('myPieChart4').getContext('2d');
        
        // 既存のチャートがあれば破棄
        if (window.pieChart4) {
            window.pieChart4.destroy();
        }

        // 新しい円グラフを作成
        window.pieChart4 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['男性', '女性'], // ラベルを設定
                datasets: [{
                    data: [maleValue, femaleValue], // 男性と女性のデータ
                    backgroundColor: ['blue', 'pink'], // 男性と女性の色
                    borderColor: ['white']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    }

   // 5つ目の円グラフを作成する関数
   function createPieChart5(maleValue, femaleValue) {
        const ctx2 = document.getElementById('myPieChart5').getContext('2d');
        
        // 既存のチャートがあれば破棄
        if (window.pieChart5) {
            window.pieChart5.destroy();
        }

        // 新しい円グラフを作成
        window.pieChart5 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['男性', '女性'], // ラベルを設定
                datasets: [{
                    data: [maleValue, femaleValue], // 男性と女性のデータ
                    backgroundColor: ['blue', 'pink'], // 男性と女性の色
                    borderColor: ['white']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    }

     // Google Sheets APIからデータを取得
     fetch(url)
        .then(response => response.json())
        .then(data => {
            allData = data.values;
            populateDropdown(allData); // プルダウンに企業名を追加
        })
        .catch(error => console.error('Error:', error));

    // プルダウンメニューに企業名を追加
    function populateDropdown(data) {
        const selectElement = document.getElementById('companySelect');
        const companies = [...new Set(data.map(row => row[0]))]; // 重複しない企業名を抽出

        companies.forEach(company => {
            const option = document.createElement('option');
            option.value = company;
            option.textContent = company;
            selectElement.appendChild(option);
        });
    }

    // 企業を選択した際にデータを抽出しグラフを描画
    document.getElementById('companySelect').addEventListener('change', function() {
        const selectedCompany = this.value;
        const filteredData = allData.filter(row => row[0] === selectedCompany);

        if (filteredData.length > 0) {
            const row = filteredData[0]; // 選択した企業のデータを取得
            // インデックスが間違っている可能性があるため、修正
            femaleRatios = [parseFloat(row[5]), parseFloat(row[8]), parseFloat(row[10]), parseFloat(row[12]), parseFloat(row[14])];
            createBarChart(labels, femaleRatios); // 棒グラフを作成
        }
    });

    // 棒グラフを作成
    function createBarChart(labels, data) {
        const ctx = document.getElementById('myBarChart').getContext('2d');

        if (window.myBarChart && typeof window.myBarChart.destroy === 'function') {
    window.myBarChart.destroy();
}


        window.myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels, // 全労働者、主任、管理職、役員
                datasets: [{
                    label: '女性の割合（％）',
                    data: data, // 女性の割合データ
                    backgroundColor: ['blue', 'green', 'yellow', 'red'], // 棒グラフの色
                    borderColor: 'black',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    }

   // 企業を選択した際にデータを抽出し、表示する共通関数
   window.onload = function() {

    // 指定した要素の中身を空にする
        document.getElementById('averageTenureMale').textContent = '';
        document.getElementById('averageTenureFemale').textContent = '';
        document.getElementById('averageChildcareMale').textContent = '';
        document.getElementById('averageChildcareFemale').textContent = '';
        document.getElementById('averageOvertime').textContent = '';
        document.getElementById('averageLeave').textContent = '';
    };

   function updateData(selectedCompany) {
        const filteredData = allData.filter(row => row[0] === selectedCompany);

        if (filteredData.length > 0) {
            const row = filteredData[0]; // 選択した企業のデータを取得

            // データを表示
            document.getElementById('averageTenureMale').textContent = row[19] ? `${row[19]} 年` : 'データなし';
            document.getElementById('averageTenureFemale').textContent = row[18] ? `${row[18]} 年` : 'データなし';
            document.getElementById('averageChildcareMale').textContent = row[22] ? `${row[22]} %` : 'データなし';
            document.getElementById('averageChildcareFemale').textContent = row[21] ? `${row[21]} %` : 'データなし';
            document.getElementById('averageOvertime').textContent = row[24] ? `${row[24]} 時間` : 'データなし';
            document.getElementById('averageLeave').textContent = row[26] ? `${row[26]} %` : 'データなし';

        }
    }

    // プルダウンメニューで企業を選択したときのイベントリスナー
    document.getElementById('companySelect').addEventListener('change', function() {
        const selectedCompany = this.value;
        updateData(selectedCompany); // 選択した企業に基づいてデータを更新
    });

    // 賃金差の診断結果を表示する関数
    function updateWageGapResult(selectedCompany) {
        const filteredData = allData.filter(row => row[0] === selectedCompany); // 選択した企業のデータを取得

        if (filteredData.length > 0) {
            const wageGap = parseFloat(filteredData[0][16]); // Q列のデータ（賃金差）を取得
            const resultElement = document.getElementById('wageGapResult');

            // 賃金差を全体の平均値と比較
            if (wageGap <= averageWageGap) {
                resultElement.textContent = `${wageGap}% - 平均値以下`;
                resultElement.style.color = 'red';  // 平均値以下の場合は赤
            } else {
                resultElement.textContent = `${wageGap}% - 平均値以上`;
                resultElement.style.color = 'blue';  // 平均値以上の場合は青
            }
            } else {
            document.getElementById('wageGapResult').textContent = 'データなし';
        }
        }
    
    // 男女の勤続年数の差異を表示する関数
    function updatetenureGapResult(selectedCompany) {
        const filteredData = allData.filter(row => row[0] === selectedCompany);
     
        if (filteredData.length > 0 && filteredData[0][27] !== undefined) {
        const tenureGap = parseFloat(filteredData[0][27]);
        const resultElement = document.getElementById('tenureGapResult');

        if (tenureGap <= averageTenureGap) {
            resultElement.textContent = `${tenureGap}% - 平均値以下`;
            resultElement.style.color = 'red';  // 平均値以下の場合は赤
        } else {
            resultElement.textContent = `${tenureGap}% - 平均値以上`;
            resultElement.style.color = 'blue';  // 平均値以上の場合は青
        }
    } else {
        document.getElementById('tenureGapResult').textContent = 'データなし';
    }
}

    // 女性割合の減少率を表示する関数
    function updateRatioGapResult(selectedCompany) {
    const filteredData = allData.filter(row => row[0] === selectedCompany);
    if (filteredData.length > 0 && filteredData[0][28] !== undefined) {
        const ratioGap = parseFloat(filteredData[0][28]);
        const resultElement = document.getElementById('ratioGapResult');
        if (ratioGap <= averageRatioGap) {
            resultElement.textContent = `${ratioGap}% - 平均値以下`;
            resultElement.style.color = 'red';  // 平均値以下の場合は赤
        } else {
            resultElement.textContent = `${ratioGap}% - 平均値以上`;
            resultElement.style.color = 'blue';  // 平均値以上の場合は青
        }
    } else {
        document.getElementById('ratioGapResult').textContent = 'データなし';
    }
}

</script>

</body>
</html>
