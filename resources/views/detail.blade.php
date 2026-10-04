@extends('app')

@section('title', 'ブログ詳細')

@section('content')

<div class = "container">
    <h1>ブログ詳細</h1>
    <div class = "container">
      <h2>{{ $blog->title }}</h2>
      <p>{{ $blog->content }}</p>
      @if ($blog->image)
          <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid">
      @endif
      <p>{{  $blog->created_at->format('Y-m-d') }}</p>
    </div>

    <a href="{{ route('edit', $blog->id) }}" class="btn btn-primary">更新する</a>
      <form action="{{ route('delete', $blog->id) }}" method="POST" style="display: inline-block;">
       @csrf
       @method('DELETE')
       <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
      </form>
    <a href="{{ route('index') }}" class="btn btn-secondary">一覧に戻る</a>
</div>
@endsection