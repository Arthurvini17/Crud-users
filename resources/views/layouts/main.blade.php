<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'pagina principal')</title>
</head>

<body>

    <header>
        <nav class="nav-bar">
            <div class="logo">

                <h1>User CRUD</h1>
            </div>
            <div class="nav-list">
                <ul>
                    @if (auth()->check())
                        <li>Olá, {{ ucfirst(auth()->user()->name) }}</li>
                    @else
                        @guest
                            <li><a href="{{ route('register') }}">Crie sua conta</a> </li>
                            <li><a href="{{ route('login') }}">Entre na sua conta</a> </li>
                        @endguest
                    @endif

                    <li> <a href="#">Contato</a></li>
                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                        </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    @yield('content')
</body>

</html>
