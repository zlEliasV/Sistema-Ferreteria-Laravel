<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $primaryKey = 'id_productos';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false; // La tabla 'productos' no tiene created_at ni updated_at, así que deshabilitamos los timestamps

    protected $fillable = [
        'descripcion',
        'precio_venta',
        'precio_compra',
        'cantidad_actual',
        'rela_marcas',
        'rela_medidas',
        'rela_rubro',
        'porcentaje_utilidad',
        'rela_proveedor',
        'cantidad_minima',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'rela_marcas', 'id_marcas');
    }

    public function medida()
    {
        return $this->belongsTo(Medida::class, 'rela_medidas', 'id_medida');
    }

    public function rubro()
    {
        return $this->belongsTo(Rubro::class, 'rela_rubro', 'id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'rela_proveedor', 'id_proveedores');
    }
}