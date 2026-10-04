@extends('app')

@section('title', 'ブログ編集')

@section('content')
<div class="container">
  <h1>ブログ編集</h1>
  {{-- バリデーションエラーメッセージの表示 --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  {{-- ブログ編集フォーム --}}
  <form action="{{ route('update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    {{-- タイトル入力フィールド --}}
    <div class="form-group">
      <label for="title">タイトル</label>
      <input type="text" name="title" value="{{ old('title', $blog->title) }}" required>
    </div>
    {{-- 本文入力フィールド --}}
    <div class="form-group">
      <label for="content">本文</label>
      <textarea name="content" class="form-control" rows="5">{{ old('content', $blog->content) }}</textarea>
    </div>
    {{-- 現在の画像表示セクション --}}
    @if($blog->image)
      <div class="form-group">
        <label>現在の画像</label>
        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" style="max-width: 200px; max-height: auto;">
      </div>
    @endif
    {{-- 画像アップロードフィールド --}}
    <div class="form-group">
      <label for="image">画像アップロード</label>
      <input type="file" name="image" class="form-control-file">
    </div>
    {{-- 送信ボタン --}}
    <button type="submit" class="btn btn-primary">更新</button>
    <a href="{{ route('detail', $blog->id) }}" class="btn btn-secondary">キャンセル</a>
  </form>
</div>
@endsection