<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ブログ一覧</title>
</head>
<body>
    <h1>ブログ一覧</h1>
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
                    <td>{{ $blog->image }}</td>
                    <td>{{ $blog->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </ul>   

</body>
</html>