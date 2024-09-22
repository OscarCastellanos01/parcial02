@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
    <div class="mb-3">
        <a href="{{ route('clientes.create') }}" class="btn btn-sm btn-success">Crear clientes</a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead class="table-dark">
            <tr>
                <td>Nombre</td>
                <td>DPI</td>
                <td>Correo</td>
                <td>Cliente potencial</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombreCliente }}</td>
                    <td>{{ $cliente->dpiCliente }}</td>
                    <td>{{ $cliente->correoCliente }}</td>
                    <td>
                        <span 
                            class="badge {{ $cliente->es_potencial ? 'badge-success' : 'badge-danger' }}"
                        >
                            {{ $cliente->es_potencial ? 'Potencial' : 'No es Potencial' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Clientes no encontrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@stop
