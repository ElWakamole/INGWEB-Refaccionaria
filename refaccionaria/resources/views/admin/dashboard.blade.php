@extends('admin.master')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="panel shadow mb-2">
            <div class="header">
                <h2 class="title">
                    <i class="fa-solid fa-house"></i> Dashboard
                </h2>
            </div>
            <div class="inside">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum esse recusandae omnis quo at eos
                voluptatibus id libero molestias error, repellat voluptates rerum, exercitationem dicta tenetur facere optio
                doloribus veritatis?
            </div>
        </div>
        @if (kvfj(Auth::user()->permissions, 'dashboardstd'))
            <div class="panel shadow mb-2">
                <div class="header">
                    <h2 class="title">
                        <i class="fa-solid fa-chart-pie"></i> Estadisticas
                    </h2>
                </div>
                <div class="inside">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel shadow">
                        <div class="header">
                            <h2 class="title">
                                <i class="fa-solid fa-chart-pie"></i> Usuarios registrados
                            </h2>
                        </div>
                        <div class="inside">
                            <div class="big_count">
                                {{ $users }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel shadow">
                        <div class="header">
                            <h2 class="title">
                                <i class="fa-solid fa-chart-pie"></i> Productos en listados
                            </h2>
                        </div>
                        <div class="inside">
                            <div class="big_count">
                                {{ $products }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
