<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}"/>
    @yield('stylesheet')
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="logo" src="{{ asset('images/1.png') }}" alt="Inicio">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="top-navbar" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="top-navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('provider') }}">Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('group') }}">Grupos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('item') }}">Items</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Configuración
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('currency') }}">Monedas</a>
                            <a class="dropdown-item" href="{{ url('measurement') }}">Unidades de Medida</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="p-4">
        @yield('content')
    </main>
    <footer></footer>
    <script type="text/javascript" src="{{ asset('js/core.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @yield('javascript')
</body>
</html>