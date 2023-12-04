@extends('connect.master')

@section('title', 'Login')

@section('content')
    <div class="box box-login shadow">
        <div class="header">
            <a href="{{ url('/login') }}">
                <img src="{{ url('/static/Imagenes/Logo.png') }}" alt="">
            </a>
        </div>
        <div class="inside">
            {!! Form::open(['url' => '/login']) !!}
            {!! Form::label('email', 'Correo: ', ['class' => 'form-label']) !!}
            <div class="input-group mb-2">
                <div class="input-group-text"><i class="fa-regular fa-envelope"></i></div>
                {!! Form::email('email', null, ['class' => 'form-control','required']) !!}
            </div>
            {!! Form::label('password', 'Nip: ', ['class' => 'form-label']) !!}
            <div class="input-group mb-3">
                <div class="input-group-text"><i class="fa-solid fa-key"></i></div>
                {!! Form::password('password', ['class' => 'form-control','required']) !!}
            </div>
            <div class="mb-2">
                {!! Form::submit('Ingresar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url('/register') }}" class="btn btn-primary">Registrase</a>
            </div>
            {!! Form::close() !!}

            @if (Session::has('message'))
                <div class="container">
                    <div class="alert alert-{{ Session::get('typealert') }}" style="display: none">
                        {{ Session::get('message') }}
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        @endif
                        <script>
                            $('.alert').slideDown();
                            setTimeot(function() {
                                $('.alert').slideUp();
                            }, 10000);
                        </script>
                    </div>
                </div>
            @endif

            <div class="footer">
                <a href="{{ url('/recover') }}"
                    class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Restablecer
                    Nip</a>
            </div>
        </div>
    </div>

@stop
