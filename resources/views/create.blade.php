@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">

    <section id="create">
        <div class="container">

            <div class="container-form">
                <div class="body-add">
                    <h1 class="add-contact">Adicionar usuarios</h1>
                    <a href="{{ route('home.index') }}">
                        <button type="submit"> <i class="fa-solid fa-circle-arrow-left"></i> Back</button>
                    </a>
                </div>


                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="file">Imagem do usuario</label>
                    <input type="file">
                    <label for="name">First Name </label>
                    <input class="inputs" type="text" name="name" placeholder="Digite o nome do usuario">

                    <label for="last">Last name</label>
                    <input class="inputs" type="text" name="last" placeholder="Digite o sobrenome do usuario">

                    <label for="email">Adress email</label>
                    <input class="inputs" type="email" placeholder="Digite o email do usuario">

                    <label for="date">Data do usuario</label>
                    <input type="date" name="data">



                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </section>
@endsection
