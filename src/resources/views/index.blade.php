<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム</title>
    <!-- CSSファイルの読み込み -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <h1>お問い合わせフォーム</h1>

    <!-- お問い合わせフォーム -->
    <form action="/confirm" method="POST">
        @csrf <!-- CSRFトークンを自動で追加 -->
        
        <!-- 姓名 -->
        <fieldset>
            <legend>お客様情報</legend>
            
            <!-- 姓 -->
            <label for="first_name">姓 <span style="color: red;">※</span></label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
            @error('first_name') 
            <p style="color: red;">{{ $message }}</p>
            @enderror

            <!-- 名 -->
            <label for="last_name">名 <span style="color: red;">※</span></label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
            @error('last_name') 
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </fieldset>

        <!-- 性別 -->
        <fieldset>
            <legend>性別</legend>
            <label for="gender">性別 <span style="color: red;">※</span></label>
            <select name="gender" id="gender" required>
                <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>男性</option>
                <option value="2" {{ old('gender') == 2 ? 'selected' : '' }}>女性</option>
                <option value="3" {{ old('gender') == 3 ? 'selected' : '' }}>その他</option>
            </select>
        </fieldset>

        <!-- お問い合わせ種類 -->
        <fieldset>
            <legend>お問い合わせ種類</legend>
            <label for="category">お問い合わせ種類 <span style="color: red;">※</span></label>
            <select name="category_id" id="category" required>
                <option value="">選択してください</option>
                <option value="1">商品のお届けについて</option>
                <option value="2">商品交換について</option>
                <!-- 必要に応じて選択肢を追加 -->
            </select>
        </fieldset>

        <!-- お問い合わせ内容 -->
        <fieldset>
            <legend>お問い合わせ内容</legend>
            <label for="detail">お問い合わせ内容 <span style="color: red;">※</span></label>
            <textarea name="detail" id="detail" rows="5" required>{{ old('detail') }}</textarea>
            @error('detail') 
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </fieldset>

        <!-- 送信ボタン -->
        <div style="margin-top: 20px;">
            <button type="submit">確認画面へ</button>
        </div>
    </form>
</body>
</html>
