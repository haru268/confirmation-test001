@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="admin-title">管理画面</h1>
    
    <!-- 検索フォーム -->
    <form method="GET" action="{{ route('admin.contacts.search') }}" class="search-form">
        <input type="text" name="name_email" placeholder="名前やメールアドレスを入力" value="{{ request('name_email') }}">
        
        <select name="gender">
            <option value="">性別</option>
            <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
            <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
            <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
        </select>
        
        <select name="category">
            <option value="">お問い合わせの種類</option>
            <option value="1" {{ request('category') == 1 ? 'selected' : '' }}>商品交換について</option>
        </select>
        
        <input type="date" name="date" value="{{ request('date') }}">
        
        <button type="submit" class="btn-search">検索</button>
        <a href="{{ route('admin.contacts') }}" class="btn-reset">リセット</a>
    </form>
    
    <!-- エクスポートボタン -->
    <a href="{{ route('admin.contacts.export', request()->query()) }}" class="btn-export">エクスポート</a>
    
    <!-- お問い合わせ一覧 -->
    <table class="contacts-table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category ? $contact->category->content : '未選択' }}</td>
                <td>
                    <button type="button" class="btn-detail" data-id="{{ $contact->id }}">詳細</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- ページネーション -->
    {{ $contacts->links() }}
</div>

<!-- モーダル -->
<div id="detail-modal" class="modal">
    <div class="modal-content">
        <span class="modal-close">&times;</span>
        <div id="modal-detail-content"></div>
    </div>
</div>
@endsection
