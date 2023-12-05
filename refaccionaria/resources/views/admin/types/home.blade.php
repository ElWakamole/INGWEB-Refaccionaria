@extends('admin.master')

@section('title', 'Tipos')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/types') }}"><i class="fa-solid fa-folder"></i> Tipos</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title">
                            <i class="fa-solid fa-plus"></i> Tipos
                        </h2>
                    </div>
                    <div class="inside">
                        {!! Form::open(['url' => '/admin/types/add']) !!}
                        {!! Form::label('name', 'Nombre:', ['class' => 'mb-2']) !!}
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-keyboard"></i></span>
                            {!! Form::text('name', null, ['class' => 'form-control', 'mb-2']) !!}
                        </div>
                        {!! Form::label('module', 'Modulo:', ['class' => 'mb-2']) !!}
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-keyboard"></i></span>
                            {!! Form::select('module', getModulesArray(), 0, ['class' => 'form-select','mb-2']) !!}
                        </div>
                        {!! Form::label('icon', 'Icono:', ['class' => 'mb-2']) !!}
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-keyboard"></i></span>
                            {!! Form::text('icon', '<i class="fa-regular fa-folder-open"></i>', ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Grabar', ['class' => 'btn btn-success']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title">
                            <i class="fa-solid fa-folder"></i> Tipos
                        </h2>
                    </div>
                    <div class="inside">
                        <nav class="nav nav-pills">
                            @foreach (getModulesArray() as $t => $k)
                                <a href="{{ url('/admin/types/'.$t) }}" class="nav-link"><i class="fa-solid fa-list"></i> {{$k}} </a>
                            @endforeach
                        </nav>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td width="32px"></td>
                                    <td>Nombre</td>
                                    <td width="140px"></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                    <tr>
                                        <td> {!! htmlspecialchars_decode($type->icon) !!} </td>
                                        <td> {{ $type->name }} </td>
                                        <td>
                                            <div class="opts">
                                                <a href="{{ url('/admin/types/'.$type->id.'/edit') }}" data-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Editar"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ url('/admin/types/'.$type->id.'/delete') }}"
                                                    data-toggle="tooltip" data-bs-placement="top" data-bs-title="Eliminar"><i
                                                        class="fa-regular fa-trash-can"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
