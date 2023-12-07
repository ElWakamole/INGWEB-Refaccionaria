@extends('admin.master')

@section('title', 'Usuarios')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/users/{status}') }}"><i class="fa-solid fa-users"></i> Usuarios</a>
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
                <div class="row mb-2">
                    <div class="col-md-2 offset-md-10">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false" style="width: 100%">
                                <i class="fa-solid fa-filter"></i> Filtrar
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('/admin/users/all') }}">Todos</a></li>
                                <li><a class="dropdown-item" href="{{ url('/admin/users/0') }}">No Verificado</a></li>
                                <li><a class="dropdown-item" href="{{ url('/admin/users/1') }}">Verificado</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <table class="table" id="users">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Apellido Paterno</td>
                            <td>Apellido Materno</td>
                            <td>email</td>
                            <td>Direccion</td>
                            <td>Celular</td>
                            <td>Estatus</td>
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
                                <td> {{ getStatusUserKey($user->getStatus()) }} </td>
                                <td>
                                    <div class="opts">
                                        @if (kvfj(Auth::user()->permissions, 'useredit'))
                                            <a href="{{ url('/admin/users/' . $user->getId() . '/edit') }}"
                                                data-toggle="tooltip" data-bs-placement="top" data-bs-title="Editar"><i
                                                    class="fa-regular fa-pen-to-square"></i></a>
                                        @endif
                                        @if (kvfj(Auth::user()->permissions, 'userpermissions') && $user->getStatus() == '1')
                                            <a href="{{ url('/admin/users/' . $user->getId() . '/permissions') }}"
                                                data-toggle="tooltip" data-bs-placement="top"
                                                data-bs-title="Permisos del Usuario"><i class="fa-solid fa-wrench"></i></a>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#users').DataTable({
                "lengthMenu": [
                    [2, 5, 10 - 1],
                    [2, 5, 10, 'All']
                ]
            });
        });
    </script>
@endsection
