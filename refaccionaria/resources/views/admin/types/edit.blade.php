@extends('admin.master')

@section('title', 'Tipos')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/types/0') }}"><i class="fa-solid fa-folder"></i> Tipos</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/types/0') }}"><i class="fa-solid fa-folder"></i>Editar Tipo</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title">
                            <i class="fa-regular fa-pen-to-square"></i> Editar
                        </h2>
                    </div>
                    <div class="inside">
                        {!! Form::open(['url' => '/admin/types/'.$type->id.'/edit']) !!}
                        {!! Form::label('name', 'Nombre:', ['class' => 'mb-2']) !!}
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-keyboard"></i></span>
                            {!! Form::text('name', $type->name, ['class' => 'form-control', 'mb-2']) !!}
                        </div>
                        {!! Form::label('module', 'Modulo:', ['class' => 'mb-2']) !!}
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-keyboard"></i></span>
                            {!! Form::select('module', getModulesArray(),$type->module, ['class' => 'form-select','mb-2']) !!}
                        </div>
                        {!! Form::label('icon', 'Icono:', ['class' => 'mb-2']) !!}
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-keyboard"></i></span>
                            {!! Form::text('icon', $type->icon, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Grabar', ['class' => 'btn btn-success']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
