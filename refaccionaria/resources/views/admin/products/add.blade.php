@extends('admin.master')

@section('title', 'Agregar Producto')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/products') }}"><i class="fa-solid fa-box"></i> Productos</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/product/add') }}"><i class="fa-solid fa-plus"></i> Agregar Producto</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title">
                    <i class="fa-solid fa-plus"></i> Agregar Producto
                </h2>
            </div>
            <div class="inside">
                {!! Form::open(['url' => '/admin/product/add']) !!}
                <div class="row mb-2">
                    <div class="col-md-5">
                        {!! Form::label('name', 'Nombre del Producto:', ['class' => 'mb-1']) !!}
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-keyboard"></i></span>
                            {!! Form::text('name', null, ['class' => 'form-control','mb-1']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        {!! Form::label('type', 'Tipo:', ['class' => 'mb-1']) !!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('img', 'Imagen Destacada:', ['class' => 'mb-1','form-label']) !!}
                        {!! Form::file('img', ['class' => 'form-control','id' => 'formFile']) !!}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3">
                        {!! Form::label('price', 'Precio:', ['class' => 'label-form']) !!}
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>
                            {!! Form::number('price', null, ['class' => 'form-control', 'min' => '0.00','step' => 'any']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        {!! Form::label('stock', 'Stock:', ['class' => 'label-form']) !!}
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-table-list"></i></span>
                            {!! Form::number('stock', null, ['class' => 'form-control', 'min' => '0','step' => 'any']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        {!! Form::label('stock-min', 'Stock Minimo:', ['class' => 'label-form']) !!}
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-table-cells-large"></i></span>
                            {!! Form::number('stock-min', null, ['class' => 'form-control', 'min' => '0','step' => 'any']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        {!! Form::label('stock-max', 'Stock Maximo:', ['class' => 'label-form']) !!}
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-table-cells"></i></span>
                            {!! Form::number('stock-max', null, ['class' => 'form-control', 'min' => '0','step' => 'any']) !!}
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-12">
                        {!! Form::label('content', 'Descripcion:', ['class' => 'mb-1','label-form']) !!}
                        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {!! Form::submit('Grabar', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection