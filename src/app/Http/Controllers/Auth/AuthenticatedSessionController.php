<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    // ログインフォーム表示
    public function create()
    {
        return view('auth.login');
    }

    // ログイン処理
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string'],
        ]);

        // ログイン試行
        if (Auth::attempt($validated)) {
            // ログイン成功
            return redirect()->route('admin.index');  // 管理画面にリダイレクト
        }

        // ログイン失敗
        throw ValidationException::withMessages([
            'email' => 'メールアドレスかパスワードが間違っています。',
        ]);
    }

    // ログアウト処理
    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
