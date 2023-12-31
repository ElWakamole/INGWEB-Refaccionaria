@extends('admin.master')

@section('title', 'Permisos Usuario')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/users/all') }}"><i class="fa-solid fa-users"></i> Usuarios</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/users') }}"><i class="fa-solid fa-user"></i> Usuario: {{ $user->getName() }} </a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page_user">
            <form action="{{ url('/admin/users/' . $user->getId() . '/permissions') }}" method="post">
                @csrf
                <div class="row md-2">
                    @foreach (user_permissions() as $key => $value)
                        <div class="col-md-3 d-flex mb-2">
                            <div class="panel shadow">
                                <div class="header">
                                    <h2 class="title">
                                        {!! $value['icon'] !!} {!! $value['title'] !!}
                                    </h2>
                                </div>
                                <div class="inside">
                                    @foreach ($value['key'] as $k => $v)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="{{ $k }}" value="true" id=""
                                                @if (kvfj($user->getPermissions(), $k)) @checked(true) @endif><label
                                                class="form-check-label" for="dashboard"> {{ $v }} </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
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
