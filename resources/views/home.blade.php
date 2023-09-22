@extends('layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>


    <section id="crud">
        <div class="container-crud">
            @if ($search)
                <h1>Buscando por: {{ $search }}</h1>
            @endif
        </div>
        @if (count($persons) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($persons as $person)
                        <tr>
                            <td><img src="/img/persons/{{ $person->image }}" alt=""></td>
                            <td>{{ $person->first }}</td>
                            <td>{{ \Carbon\Carbon::parse($person->date)->format('d/m/Y') }}</td>
                            <td>{{ $person->email }}</td>
                            <td class="buttons-act">
                                <div class="button-group">
                                    <a href="{{ route('users.edit', ['person' => $person->id]) }}">
                                        <button class="btn1">Editar</button>
                                    </a>
                                    <form action="{{ route('users.destroy', ['person' => $person->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn" type="submit">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            @if ($search)
                <h1>Nenhum usuário encontrado por {{ $search }}</h1>
            @endif
        @endif


        <aside>
            <div class="container-search">
                <h1>Procure por um usuario</h1>
                <form action="/" method="get">
                    <input type="search" class="search-input" placeholder="Search User" name="search">
                </form>
            </div>
            <nav class="nav-create">
                <a href="{{ route('user.create') }}">
                    <button>Create user</button>
                </a>
            </nav>
        </aside>
    </section>
@endsection
