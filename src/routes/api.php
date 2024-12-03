<?php

use Illuminate\Support\Facades\Route;

// APIルートの設定
Route::get('/', function () {
    return response()->json(['message' => 'API is working']);
});
