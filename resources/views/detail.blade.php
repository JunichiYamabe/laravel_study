<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>詳細画面</title>
</head>

<body>
    <h1>ブログ詳細</h1>
    <div class = container>
      <h2>{{ $blog->title }}</h2>
      <p>{{ $blog->content }}</p>
      @if ($blog->image)
          <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid">
      @endif
      <p>{{  $blog->created_at->format('Y-m-d') }}</p>
    </div>
</body>
</html>