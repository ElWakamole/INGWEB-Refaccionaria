@extends('admin.master')

@section('title', 'Usuarios')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/users') }}"><i class="fa-solid fa-users"></i> Usuarios</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title">
                    <i class="fa-solid fa-users"></i> Usuarios
                </h2>
            </div>
            <div class="inside">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Apellido Paterno</td>
                            <td>Apellido Materno</td>
                            <td>email</td>
                            <td>Direccion</td>
                            <td>Celular</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td> {{ $user->getId() }} </td>
                                <td> {{ $user->getName() }} </td>
                                <td> {{ $user->getLastnameP() }} </td>
                                <td> {{ $user->getLastnameM() }} </td>
                                <td> {{ $user->getEmail() }} </td>
                                <td> {{ $user->getAddress() }} </td>
                                <td> {{ $user->getPhone() }} </td>
                                <td>
                                    <div class="opts">
                                        <a href="{{ url('/admin/user/' . $user->getId() . '/edit') }}" data-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Editar"><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="{{ url('/admin/user/' . $user->getId() . '/delete') }}"
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
@endsection
