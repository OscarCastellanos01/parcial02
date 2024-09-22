<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku_producto',
        'cod_barra',
        'nombre_producto',
        'descripcion_producto',
        'precio_compra_producto',
        'precio_venta_producto',
        'estadoDelete_producto'
    ];
}
