@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Crear producto</h1>
@stop

@section('content')
    <div class="mb-3">
        <a href="{{ route('productos.index') }}" class="btn btn-sm btn-primary">Regresar</a>
    </div>
    
    <form action="{{ route('productos.store') }}" method="POST" novalidate>
        @csrf

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="sku_producto">SKU</label>
                <input 
                    type="text"
                    class="form-control"
                    id="sku_producto" 
                    name="sku_producto"
                    value="{{ old('sku_producto') }}"
                >
                @error('sku_producto')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="cod_barra">Codigo de barras</label>
                <input 
                    type="text"
                    class="form-control"
                    id="cod_barra" 
                    name="cod_barra"
                    value="{{ old('cod_barra') }}"
                >
                @error('cod_barra')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="nombre_producto">Nombre del producto</label>
                <input 
                    type="text"
                    class="form-control"
                    id="nombre_producto" 
                    name="nombre_producto"
                    value="{{ old('nombre_producto') }}"
                >
                @error('nombre_producto')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="descripcion_producto">Descripcion del producto</label>
                <input 
                    type="text"
                    class="form-control"
                    id="descripcion_producto" 
                    name="descripcion_producto"
                    value="{{ old('descripcion_producto') }}"
                >
                @error('descripcion_producto')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="precio_compra_producto">Precio de compra</label>
                <input 
                    type="text"
                    class="form-control"
                    id="precio_compra_producto" 
                    name="precio_compra_producto"
                    value="{{ old('precio_compra_producto') }}"
                >
                @error('precio_compra_producto')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="precio_venta_producto">Precio de venta</label>
                <input 
                    type="text"
                    class="form-control"
                    id="precio_venta_producto" 
                    name="precio_venta_producto"
                    value="{{ old('precio_venta_producto') }}"
                >
                @error('precio_venta_producto')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label 
                    for="estadoDelete_producto"
                >
                    Estado
                </label>
                <select 
                    name="estadoDelete_producto" id="estadoDelete_producto"
                    class="form-control"
                >
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
        </div>
        <button 
            type="submit" 
            class="btn btn-success"
        >
            Crear
        </button>
    </form>
@stop
