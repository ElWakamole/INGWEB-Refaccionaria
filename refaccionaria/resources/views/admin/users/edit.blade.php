@extends('admin.master')

@section('title', 'Editar Usuario')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/users/all') }}"><i class="fa-solid fa-users"></i> Usuarios</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/users/{id}/edit') }}"><i class="fa-regular fa-pen-to-square"></i>Editar Usuario</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page_user">
            <div class="row">
                <div class="col-md-4">
                    <div class="panel shadow">
                        <div class="header">
                            <h2 class="title">
                                <i class="fa-solid fa-user"></i> Informacion
                            </h2>
                        </div>
                        <div class="inside">
                            <div class="mini_profile">
                                <img src=" {{ url('/static/Imagenes/Logo_User.png') }} " class="avatar" alt="">
                                <div class="info">
                                    <span class="title"><i class="fa-solid fa-address-card"></i> Nombre:</span>
                                    <span class="text"> {{ $user->getName() }} </span>
                                    <span class="title"><i class="fa-solid fa-envelope"></i> Correo:</span>
                                    <span class="text"> {{ $user->getEmail() }} </span>
                                    <span class="title"><i class="fa-solid fa-circle-user"></i> Rol:</span>
                                    <span class="text"> {{ getRoleUserKey($user->getRole()) }} </span>
                                    <span class="title"><i class="fa-solid fa-circle-user"></i> Estatus:</span>
                                    <span class="text"> {{ getStatusUserKey($user->getStatus()) }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel shadow">
                        <div class="header">
                            <h2 class="title">
                                <i class="fa-solid fa-user-pen"></i> Editar Informacion
                            </h2>
                        </div>
                        <div class="inside">
                            @if (kvfj(Auth::user()->permissions, 'useredit'))
                                {!! Form::open(['url' => '/admin/users/' . $user->getId() . '/edit']) !!}
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        {!! Form::label('role', 'Tipo Usuario:', ['class' => 'mb-2']) !!}
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa-regular fa-keyboard"></i></span>
                                            {!! Form::select('role', getRoleUserKey(null), $user->getRole(), ['class' => 'form-select', 'mb-2']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::label('status', 'Tipo Usuario:', ['class' => 'mb-2']) !!}
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa-regular fa-keyboard"></i></span>
                                            {!! Form::select('status', getStatusUserKey(null), $user->getStatus(), ['class' => 'form-select', 'mb-2']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
