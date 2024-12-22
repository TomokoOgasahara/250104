<!DOCTYPE html>
<html>
<head>
    <title>登録フォーム</title>
</head>
<body>
    <h1>データ登録フォーム</h1>
    <form action="{{ url('insert') }}" method="POST">
        @csrf
        <input type="text" name="text" placeholder="新しいテキストを入力">
        <button type="submit">送信</button>
    </form>

    <h2>登録済みデータ</h2>
    @if(isset($texts) && count($texts) > 0)
        <ul>
            @foreach ($texts as $text)
                <li>
                    {{ $text->text }}
                    <!-- 編集フォーム -->
                    <form action="{{ route('update', $text->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="text" name="text" value="{{ $text->text }}">
                        <button type="submit">更新</button>
                    </form>
                    <!-- 削除ボタン -->
                    <form action="{{ route('destroy', $text->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>登録されたデータはありません。</p>
    @endif
</body>
</html>
