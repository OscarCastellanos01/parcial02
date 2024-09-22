@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Productos</h1>
@stop

@section('content')
    <div class="mb-3">
        <a href="{{ route('productos.create') }}" class="btn btn-sm btn-success">Crear producto</a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead class="table-dark">
            <tr>
                <td>Sku</td>
                <td>Codigo de Barras</td>
                <td>Nombre</td>
                <td>Descripcion</td>
                <td>Precio compra</td>
                <td>Precio venta</td>
                <td>Estado</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @forelse ($productos as $producto)
                <tr>
                    <td>{{ $producto->sku_producto }}</td>
                    <td>{{ $producto->cod_barra }}</td>
                    <td>{{ $producto->nombre_producto }}</td>
                    <td>{{ $producto->descripcion_producto }}</td>
                    <td>Q.{{ $producto->precio_compra_producto }}</td>
                    <td>Q.{{ $producto->precio_venta_producto }}</td>
                    <td>
                        <span 
                            class="badge {{ $producto->estadoDelete_producto ? 'badge-success' : 'badge-danger' }}"
                        >
                            {{ $producto->estadoDelete_producto ? 'Activo' : 'Inactivo' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('productos.edit', $producto) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
            @empty
                <td>
                    <td colspan="8" class="text-center">Productos no encontrados</td>
                </td>
            @endforelse
        </tbody>
    </table>
@stop
