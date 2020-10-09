<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | Produtos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a href="{{url('/')}}" class="navbar-brand">Crud<strong>Laravel</strong></a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="{{url('/products/create')}}" class="nav-link">Novo produto</a></li>
        </ul>
    </div>
    </nav>

    @yield('content')

    <script src="{{asset('js/app.js')}}"></script>

</body>
</html>