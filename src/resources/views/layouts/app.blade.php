<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FashionablyLate')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    

    <main>
        @yield('content')
    </main>
</body>
</html>
