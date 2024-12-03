<?php

namespace App\Http\Controllers;

use App\Models\Contact; // モデルの読み込み
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // CSVエクスポート
    public function export(Request $request)
    {
        $query = Contact::query();

        // 必要に応じて検索条件を追加（searchと同様の処理）
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('date_from') && $request->filled('date_to')) {
            $query->whereBetween('created_at', [$request->date_from, $request->date_to]);
        }

        $contacts = $query->get();

        // CSVデータの作成
        $csvData = [];
        $csvData[] = ['名前', '性別', 'メールアドレス', 'お問い合わせ内容', '作成日'];
        foreach ($contacts as $contact) {
            $csvData[] = [
                $contact->name,
                $contact->gender == 1 ? '男性' : '女性',
                $contact->email,
                $contact->content,
                $contact->created_at,
            ];
        }

        $fileName = 'contacts_' . now()->format('Ymd_His') . '.csv';

        return response()->streamDownload(function () use ($csvData) {
            $output = fopen('php://output', 'w');
            foreach ($csvData as $row) {
                fputcsv($output, $row);
            }
            fclose($output);
        }, $fileName);
    }

    // お問い合わせフォームのトップページ
    public function index()
    {
        return view('index'); // 必要に応じて適切なビュー名に変更
    }

    // 確認画面
    public function confirm(Request $request)
    {
        // 入力値のバリデーション
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:1,2,3',
            'category_id' => 'required|integer', // categories テーブルが存在しない場合、適宜修正
            'detail' => 'required|string|max:1000',
        ]);

        // 仮のカテゴリデータ
        $categories = [
            1 => '商品のお届けについて',
            2 => '商品交換について',
        ];

        // 確認画面に送るデータをビューに渡す
        return view('confirm', [
            'input' => $validatedData,
            'categories' => $categories,
        ]);
    }

    // サンクスページ
    public function thanks()
    {
        return view('thanks'); // 必要に応じて適切なビュー名に変更
    }
}
