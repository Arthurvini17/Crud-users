@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">

    <section id="create">
        <div class="container">

            <div class="container-form">

                <aside class="nav-top">
                    <h1>Adicionar usuarios</h1>
                </aside>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="file">Imagem do usuario</label>
                    <input type="file">
                    <input class="inputs" type="text" name="name" placeholder="Digite o nome do usuario">

                    <input class="inputs" type="text" name="last" placeholder="Digite o sobrenome do usuario">

                    <input class="inputs" type="email" placeholder="Digite o email do usuario">

                    <label for="date">Data do usuario</label>
                    <input type="date" name="data">



                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </section>
@endsection
