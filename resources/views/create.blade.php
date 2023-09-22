@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    
    <script src="{{ asset('js/app.js') }}"></script>


    <section id="create">
        @if (session('mensagem'))
            <div id="msg-exc" class="alert-success">
                {{ session('mensagem') }}
            </div>
        @endif

        <div class="container">

            <div class="container-form">
                <div class="body-add">
                    <h1 class="add-contact">Adicionar usuarios</h1>
                    <a href="{{ route('home.index') }}">
                        <button type="submit"> <i class="fa-solid fa-circle-arrow-left"></i> Back</button>
                    </a>
                </div>


                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="errors">
                        @if ($errors->has('image'))
                            <div class="alert-danger">{{ $errors->first('image') }}</div>
                        @endif
                   
                    
                    <label for="file">Imagem do usuario</label>
                    <input type="file" name="image">
                </div>
                
                    <label for="name">First Name </label>
                    <input class="inputs" type="text" name="first" placeholder="Digite o nome do usuario">

                    <label for="last">Last name</label>
                    <input class="inputs" type="text" name="last" placeholder="Digite o sobrenome do usuario">

                    <div class="errors-email">
                        @if ($errors->has('email'))
                            <div class="alert-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <label for="email">Adress email</label>
                    <input class="inputs" type="email" name="email" placeholder="Digite o email do usuario">

                    <div class="errors-date">
                        @if ($errors->has('date'))
                            <div class="alert-danger">{{ $errors->first('date') }}</div>
                        @endif
                    </div>
                    <label for="date">Data do usuario</label>
                    <input type="date" name="date">




                    <button class="button-submit" type="submit">Enviar</button>
                </form>
            </div>
        </div>

    </section>
@endsection
