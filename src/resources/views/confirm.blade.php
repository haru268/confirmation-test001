<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせ内容確認</title>
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
</head>
<body>
    <h1>お問い合わせ内容確認</h1>

    <!-- 確認フォーム -->
    <form action="/thanks" method="POST">
        @csrf
        <!-- 姓 -->
        <p>姓: {{ $input['first_name'] ?? '' }}</p>
        <input type="hidden" name="first_name" value="{{ $input['first_name'] ?? '' }}">

        <!-- 名 -->
        <p>名: {{ $input['last_name'] ?? '' }}</p>
        <input type="hidden" name="last_name" value="{{ $input['last_name'] ?? '' }}">

        <!-- 性別 -->
        <p>性別: 
            @if (($input['gender'] ?? 0) == 1)
                男性
            @elseif (($input['gender'] ?? 0) == 2)
                女性
            @else
                その他
            @endif
        </p>
        <input type="hidden" name="gender" value="{{ $input['gender'] ?? '' }}">

        <!-- お問い合わせ種類 -->
        <p>お問い合わせ種類: {{ $categories[$input['category_id']] ?? '不明' }}</p>
        <input type="hidden" name="category_id" value="{{ $input['category_id'] ?? '' }}">

        <!-- お問い合わせ内容 -->
        <p>お問い合わせ内容: {{ $input['detail'] ?? '' }}</p>
        <input type="hidden" name="detail" value="{{ $input['detail'] ?? '' }}">

        <!-- 修正ボタン -->
        <button type="button" onclick="history.back()">修正する</button>

        <!-- 送信ボタン -->
        <button type="submit">送信する</button>
    </form>
</body>
</html>
