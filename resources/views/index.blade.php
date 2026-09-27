@extends('app')

@section('title', 'ブログ一覧')

@section('content')

<div class="container">

  <h1>ブログ一覧</h1> 

    <a href="{{ route('create') }}" class="btn btn-success mb-3">新規投稿</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>内容</th>
                <th>画像</th>
                <th>投稿日</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->content }}</td>
                    <td>
                        @if ($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" width="100">
                        @else
                            画像なし
                        @endif
                    </td>
                    <td>{{ $blog->created_at->format('Y-m-d') }}</td>
                    <td>
                      <a href="{{ route('detail', $blog->id) }}" class="btn btn-primary">詳細</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection