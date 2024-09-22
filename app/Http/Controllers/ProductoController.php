<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        return view('productos.index', [
            'productos' => $productos
        ]);
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'sku_producto' => 'required|unique:productos',
            'cod_barra' => 'required',
            'nombre_producto' => 'required',
            'descripcion_producto' => 'required',
            'precio_compra_producto' => 'required',
            'precio_venta_producto' => 'required',
            'estadoDelete_producto' => 'required'
        ]);

        Producto::create([
            'sku_producto' => $request->sku_producto,
            'cod_barra' => $request->cod_barra,
            'nombre_producto' => $request->nombre_producto,
            'descripcion_producto' => $request->descripcion_producto,
            'precio_compra_producto' => $request->precio_compra_producto,
            'precio_venta_producto' => $request->precio_venta_producto,
            'estadoDelete_producto' => $request->estadoDelete_producto
        ]);

        session()->flash('success', 'Producto creado correctamente.');

        return to_route('productos.index');
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', [
            'producto' => $producto 
        ]);
    }

    public function update(Request $request, Producto $producto)
    {
        $this->validate($request, [
            'sku_producto' => 'required|unique:productos,sku_producto,' . $producto->id,
            'cod_barra' => 'required',
            'nombre_producto' => 'required',
            'descripcion_producto' => 'required',
            'precio_compra_producto' => 'required',
            'precio_venta_producto' => 'required',
            'estadoDelete_producto' => 'required'
        ]);

        $producto->update([
            'sku_producto' => $request->sku_producto,
            'cod_barra' => $request->cod_barra,
            'nombre_producto' => $request->nombre_producto,
            'descripcion_producto' => $request->descripcion_producto,
            'precio_compra_producto' => $request->precio_compra_producto,
            'precio_venta_producto' => $request->precio_venta_producto,
            'estadoDelete_producto' => $request->estadoDelete_producto
        ]);

        session()->flash('success', 'Producto actualizado correctamente.');

        return to_route('productos.index');
    }
}
