@extends('connect.master')

@section('title', 'Register')

@section('content')
    <div class="box box-register shadow">
        <div class="header">
            <a href="{{ url('/login') }}">
                <img src="{{ url('/static/Imagenes/Logo.png') }}" alt="">
            </a>
        </div>
        <div class="inside">
            {!! Form::open(['url' => '/register']) !!}
            {!! Form::label('name', 'Nombre: ', ['class' => 'form-label']) !!}
            <div class="input-group mb-2">
                <div class="input-group-text"><i class="fa-regular fa-user"></i></div>
                {!! Form::text('name', null, ['class' => 'form-control','required']) !!}
            </div>
            {!! Form::label('lastnameP', 'Apellido Paterno: ', ['class' => 'form-label']) !!}
            <div class="input-group mb-2">
                <div class="input-group-text"><i class="fa-solid fa-user-tag"></i></div>
                {!! Form::text('lastnameP', null, ['class' => 'form-control','required']) !!}
            </div>
            {!! Form::label('lastnameM', 'Apellido Materno: ', ['class' => 'form-label']) !!}
            <div class="input-group mb-2">
                <div class="input-group-text"><i class="fa-solid fa-user-tag"></i></div>
                {!! Form::text('lastnameM', null, ['class' => 'form-control','required']) !!}
            </div>
            {!! Form::label('email', 'Correo: ', ['class' => 'form-label']) !!}
            <div class="input-group mb-2">
                <div class="input-group-text"><i class="fa-regular fa-envelope"></i></div>
                {!! Form::email('email', null, ['class' => 'form-control','required']) !!}
            </div>
            {!! Form::label('password', 'Nip: ', ['class' => 'form-label']) !!}
            <div class="input-group mb-2">
                <div class="input-group-text"><i class="fa-solid fa-key"></i></div>
                {!! Form::password('password', ['class' => 'form-control','required']) !!}
            </div>
            {!! Form::label('passwordC', 'Confirmar Nip: ', ['class' => 'form-label']) !!}
            <div class="input-group mb-3">
                <div class="input-group-text"><i class="fa-solid fa-key"></i></div>
                {!! Form::password('passwordC', ['class' => 'form-control','required']) !!}
            </div>
            {!! Form::label('address', 'Domicilio: ', ['class' => 'form-label']) !!}
            <div class="input-group mb-2">
                <div class="input-group-text"><i class="fa-regular fa-map"></i></div>
                {!! Form::text('address', null, ['class' => 'form-control','required']) !!}
            </div>
            {!! Form::label('phone', 'Celular: ', ['class' => 'form-label']) !!}
            <div class="input-group mb-2">
                <div class="input-group-text"><i class="fa-solid fa-phone"></i></div>
                {!! Form::text('phone', null, ['class' => 'form-control','required']) !!}
            </div>
            <div class="">
                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url('/login') }}" class="btn btn-primary">Iniciar Sesion</a>
            </div>
            {!! Form::close() !!}
            @if (Session::has('message'))
                <div class="container mt-2">
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
                            setTimeout(function() {
                                $('.alert').slideUp();
                            }, 100);
                        </script>
                    </div>
                </div>
            @endif
        </div>
    </div>

@stop
