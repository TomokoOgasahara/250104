<?php



// プルダウン用の企業名を取得
$sql = "SELECT DISTINCT comp_name FROM compsdatabase";
// $result = $conn->query($sql);

// 企業が選択された場合、データを取得
$selected_comp_name = isset($_POST['comp_name']) ? $_POST['comp_name'] : null;
$data = null;
if ($selected_comp_name) {
    $stmt = $conn->prepare("SELECT * FROM compsdatabase WHERE comp_name = ?");
    $stmt->bind_param("s", $selected_comp_name);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業データ表示</title>
</head>
<body>
    <h1>企業データ検索</h1>

    <!-- プルダウンフォーム -->
    <form method="GET" action="/comps_database">
        <label for="comp_name">企業名を選択してください:</label>
        <select name="comp_name" id="comp_name" required>
            <option value="">--選択してください--</option>
            @foreach ($companies as $company)
                <option value="{{ $company->comp_name }}" 
                        {{ request('comp_name') === $company->comp_name ? 'selected' : '' }}>
                    {{ $company->comp_name }}
                </option>
            @endforeach
        </select>
        <button type="submit">検索</button>
    </form>

    <!-- 選択された企業のデータ表示 -->
    @if ($selectedCompany)
        <h2>選択した企業のデータ</h2>
        <p><strong>企業名:</strong> {{ $selectedCompany->comp_name }}</p>
        <p><strong>平均年齢:</strong> {{ $selectedCompany->av_age }}歳</p>
        <p><strong>平均給与:</strong> {{ $selectedCompany->av_salary }}万円</p>
        <p><strong>売上:</strong> {{ $selectedCompany->sales }}万円</p>
        <p><strong>利益:</strong> {{ $selectedCompany->profit }}万円</p>
        <p><strong>純利益:</strong> {{ $selectedCompany->net_profit }}万円</p>
    @elseif (request()->has('comp_name'))
        <p>選択した企業のデータは見つかりませんでした。</p>
    @endif
</body>
</html>

