@extends('layouts.app')

@section('content')
<header>
    <h1 class="header-title">FashionablyLate</h1>
    <a href="{{ route('register') }}" class="register-btn">Register</a>
</header>

<div class="container">
    <!-- Loginタイトル -->
    <h2 class="login-title">Login</h2>
    <!-- ログインボックス -->
    <div class="login-box">
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

        <!-- ログインフォーム -->
        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <!-- メールアドレス -->
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus placeholder="例: test@example.com">
            </div>

            <!-- パスワード -->
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" class="form-control" required placeholder="パスワードを入力">
            </div>

            <!-- ログインボタン -->
            <div class="form-group">
                <button type="submit" class="btn-login">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection
