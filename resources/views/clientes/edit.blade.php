@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Editar clientes</h1>
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
    <form action="{{ route('clientes.update', $cliente) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nombreCliente">Nombre del cliente</label>
                <input 
                    type="text"
                    class="form-control"
                    id="nombreCliente" 
                    name="nombreCliente"
                    value="{{ $cliente->nombreCliente }}"
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
                    value="{{ $cliente->dpiCliente }}"
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
                    value="{{ $cliente->correoCliente }}"
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
                    <option 
                        value="1" 
                        {{ $cliente->es_potencial == 1 ? 'selected' : '' }}
                    >
                        Potencial
                    </option>
                    <option 
                        value="0" 
                        {{ $cliente->es_potencial == 0 ? 'selected' : '' }}
                    >
                        No es potencial
                    </option>
                </select>
            </div>
        </div>
        <button 
            type="submit" 
            class="btn btn-success"
        >
            Editar
        </button>
    </form>
@stop
