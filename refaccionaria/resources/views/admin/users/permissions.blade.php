@extends('admin.master')

@section('title', 'Permisos Usuario')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/users/all') }}"><i class="fa-solid fa-users"></i> Usuarios</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/users') }}"><i class="fa-solid fa-user"></i> Usuario: {{$user->getName()}} </a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page_user">
            <form action="{{ url('/admin/users/'.$user->getId().'/permissions') }}" method="post">
                @csrf
                <div class="row mb-2">
                    @include('admin.users.permissions.mdashboard')
                    @include('admin.users.permissions.mproducts')
                    @include('admin.users.permissions.musers')
                    @include('admin.users.permissions.mtypes')
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel shadow">
                            <div class="inside">
                                <input type="submit" value="Guardar" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
