@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Crear clientes</h1>
@stop

@section('content')
    <div class="mb-3">
        <a href="{{ route('clientes.index') }}" class="btn btn-sm btn-primary">Regresar</a>
    </div>
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('clientes.store') }}" method="POST" novalidate>
        @csrf

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nombreCliente">Nombre del cliente</label>
                <input 
                    type="text"
                    class="form-control"
                    id="nombreCliente" 
                    name="nombreCliente"
                    value="{{ old('nombreCliente') }}"
                >
                @error('nombreCliente')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="dpiCliente">dpi del cliente</label>
                <input 
                    type="text"
                    class="form-control"
                    id="dpiCliente" 
                    name="dpiCliente"
                    value="{{ old('dpiCliente') }}"
                >
                @error('dpiCliente')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="correoCliente">Correo del cliente</label>
                <input 
                    type="text"
                    class="form-control"
                    id="correoCliente" 
                    name="correoCliente"
                    value="{{ old('correoCliente') }}"
                >
                @error('correoCliente')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label 
                    for="es_potencial"
                >
                    Cliente potencial
                </label>
                <select 
                    name="es_potencial" id="es_potencial"
                    class="form-control"
                >
                    <option value="1">Si</option>
                    <option value="0">No</option>
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
