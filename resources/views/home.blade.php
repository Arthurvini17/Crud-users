@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{asset('js/app.js')}}"></script>


<section id="crud">
    <div class="container-crud">
        <table class="table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($dados as $item) --}}
                <tr>
                    {{-- <td><img src="{{ $item->foto }}" alt="Foto"></td> --}}
                    {{-- <td>{{ $item->name }}</td> --}}
                    {{-- <td>{{ $item->date }}</td> --}}
                    <td>
                        <a href="#">Editar</a>
                        <a href="#">Excluir</a>
                    </td>
                </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>

    <aside>
        <nav>
            <button>Entrar</button>
        </nav>
        <div class="container-search">
            <h1>Procure por um usuario</h1>
            <input type="search">
        </div>
    </aside>
</section>
@endsection
