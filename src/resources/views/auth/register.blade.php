@extends('layouts.app')

@section('content')
<header>
    <h1 class="header-title">FashionablyLate</h1>
    <a href="{{ route('login') }}" class="login-btn">Login</a>
</header>

<div class="container">
    <h2 class="register-title">Register</h2>
    <div class="register-box">
        <!-- バリデーションエラーメッセージの表示 -->
        @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- 登録フォーム -->
        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <!-- お名前 -->
            <div class="form-group">
                <label for="name">お名前</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus placeholder="例: 山田 太郎">
            </div>

            <!-- メールアドレス -->
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required placeholder="例: test@example.com">
            </div>

            <!-- パスワード -->
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" class="form-control" required placeholder="パスワードを入力">
            </div>

            <!-- 登録ボタン -->
            <button type="submit" class="btn-register">登録</button>
        </form>
    </div>
</div>
@endsection
