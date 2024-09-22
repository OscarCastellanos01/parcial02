<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::paginate(10);

        return view('clientes.index', [
            'clientes' => $clientes
        ]);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        
        $this->validate($request, [
            'nombreCliente' => 'required',
            'dpiCliente' => 'required',
            'correoCliente' => 'required',
            'es_potencial' => 'required'
        ]);

        try {
            Cliente::create([
                'nombreCliente' => $request->nombreCliente,
                'dpiCliente' => $request->dpiCliente,
                'correoCliente' => $request->correoCliente,
                'es_potencial' => $request->es_potencial
            ]);

            DB::commit();

            session()->flash('success', 'Cliente creado correctamente.');

            return to_route('clientes.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Error al crear el cliente. ' . $th);
        }
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', [
            'cliente' => $cliente
        ]);
    }

    public function update(Request $request, Cliente $cliente)
    {
        DB::beginTransaction();
        
        $this->validate($request, [
            'nombreCliente' => 'required',
            'dpiCliente' => 'required',
            'correoCliente' => 'required',
            'es_potencial' => 'required'
        ]);

        try {
            $cliente->update([
                'nombreCliente' => $request->nombreCliente,
                'dpiCliente' => $request->dpiCliente,
                'correoCliente' => $request->correoCliente,
                'es_potencial' => $request->es_potencial
            ]);

            DB::commit();

            session()->flash('success', 'Cliente editado correctamente.');

            return to_route('clientes.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Error al editar el cliente. ' . $th);
        }
    }
}
