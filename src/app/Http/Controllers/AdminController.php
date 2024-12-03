<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // 管理画面に表示する
    public function index()
    {
        // 全ての問い合わせデータを取得してビューに渡す
        $contacts = Contact::paginate(7);

        return view('admin', compact('contacts'));
    }

    // 検索機能の処理
    public function search(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('name_email')) {
            $query->where('name', 'like', '%' . $request->name_email . '%')
                  ->orWhere('email', 'like', '%' . $request->name_email . '%');
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(7);

        return view('admin', compact('contacts'));
    }

    // CSVエクスポート
    public function export(Request $request)
    {
        // ここにCSVエクスポートの処理を書く
    }
}
