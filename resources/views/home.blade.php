@extends('layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>


    <section id="crud">
        <div class="container-crud">
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
                            <td><img src="/img/persons/{{$person->image}}" alt=""></td>
                            <td>{{ $person->first }}</td>
                            <td>{{ \Carbon\Carbon::parse($person->date)->format('d/m/Y') }}</td>
                            <td>{{$person->email}}</td>
                            <td>
                                <a href="#">Editar</a>
                                <form action="{{route('users.destroy', ['person' => $person->id])}}" method="POST">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit">Excluir</button>
                                </form>
                               
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <aside>
            <div class="container-search">
                <h1>Procure por um usuario</h1>
                <input type="search">
            </div>
            <nav class="nav-create">
                <a href="{{ route('user.create') }}">
                    <button>Create user</button>
                </a>
            </nav>
        </aside>
    </section>
@endsection
