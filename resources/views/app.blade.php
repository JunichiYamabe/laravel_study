<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TNGブログ')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <!-- ヘッダー -->
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 bg-primary-subtitle">
        <h3>TNGブログ</h3>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <!--フラッシュメッセージの表示-->
            <div class="col-md-8 offset-md-2">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <!--各画面の中身--> 
            <div class="col-8">   
                @yield('content')
            </div>
        </div>
    </div>

    <footer class="d-flex flex-wrap justify-content-center py-3 mt-5 bg-primary-subtitle">
      <!-- フッター部 -->  
      <p >&copy; 2024 TNGブログ</p>
    </footer>
</body>

</html>
 