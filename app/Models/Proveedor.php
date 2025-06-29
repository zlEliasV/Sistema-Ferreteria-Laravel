<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    protected $primaryKey = 'id_proveedores';
    public $incrementing = true;
    protected $keyType = 'int';


    protected $fillable = [
        'razon_social',
        'cuit',
        'telefono_contacto',
        'email',
        'persona_contacto',
        'rela_condicioniva',
    ];

    // Relación con Condicion (IVA)
    public function condicionIva()
    {
        return $this->belongsTo(Condicion::class, 'rela_condicioniva', 'id_condicioniva');
    }
}