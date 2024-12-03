<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\RegisteredUserController; // 正しいコントローラーを指定
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisterController; // RegisterControllerを追加

/*
|-------------------------------------------------------------------------- 
| Web Routes
|-------------------------------------------------------------------------- 
|
| このファイルでは、アプリケーションのWebルートを定義します。
| ルートはRouteServiceProviderによってロードされ、"web"ミドルウェア
| グループに含まれます。必要に応じて自由に編集してください。
|
*/

// お問い合わせ関連のルート
Route::get('/', [ContactController::class, 'index'])->name('contact.index'); // お問い合わせフォーム入力ページ
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm'); // 入力内容の確認画面
Route::post('/thanks', [ContactController::class, 'thanks'])->name('contact.thanks'); // 完了画面

// 管理画面関連のルート
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])
    ->middleware(['auth'])->name('admin.index'); // 管理画面トップページ
Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts'); // お問い合わせ一覧
Route::get('/admin/contacts/search', [ContactController::class, 'search'])->name('admin.contacts.search'); // 検索機能
Route::get('/admin/contacts/export', [ContactController::class, 'export'])->name('contacts.export'); // CSVエクスポート

// 認証関連のルート
Route::get('/register', [RegisterController::class, 'show'])->name('register.show'); // 登録ページを表示
Route::post('/register', [RegisterController::class, 'register'])->name('register.store'); // 登録処理
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login'); // ログインページ

// Laravel BreezeまたはFortify関連の認証ルート
require __DIR__ . '/auth.php';
