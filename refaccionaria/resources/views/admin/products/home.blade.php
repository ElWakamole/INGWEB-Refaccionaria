@extends('admin.master')

@section('title', 'Productos')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/products') }}"><i class="fa-solid fa-box"></i> Productos</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title">
                    <i class="fa-solid fa-box"></i> Productos
                </h2>
            </div>
            <div class="inside">

                <div class="btns mb-2">
                    <a href="{{ url('/admin/products/add') }}" class="btn btn-dark"><i class="fa-solid fa-plus"></i> Agregar
                        Producto</a>
                </div>

                <table id="products" class="table table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td></td>
                            <td>Nombre</td>
                            <td>Descripcion</td>
                            <td>Precio</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td width="50px"> {{ $product->getId() }} </td>
                                <td width="64px"> <img src="{{ url('/uploads' . '/' . $product->getImg()) }}"
                                        width="50px"> </td>
                                <td> {{ $product->getName() }} </td>
                                <td> {{ $product->getDesciption() }} </td>
                                <td> {{ $product->getPrice() }} </td>
                                <td>
                                    <div class="opts">
                                        <a href="{{ url('/admin/products/' . $product->getId() . '/edit') }}"
                                            data-toggle="tooltip" data-bs-placement="top" data-bs-title="Editar"><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="{{ url('/admin/products/' . $product->getId() . '/delete') }}"
                                            data-toggle="tooltip" data-bs-placement="top" data-bs-title="Eliminar"><i
                                                class="fa-regular fa-trash-can"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach;
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#products').DataTable({
                "lengthMenu":[[5,10,50-1],[5,10,50,'All']]
            });
        });
    </script>
@endsection
