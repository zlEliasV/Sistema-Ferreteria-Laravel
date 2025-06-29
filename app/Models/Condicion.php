<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condicion extends Model
{
    use HasFactory;

    protected $table = 'condicion';
    protected $primaryKey = 'id_condicioniva';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'descripcion',
    ];

    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'rela_condicioniva', 'id_condicioniva');
    }

    public function proveedores()
    {
        return $this->hasMany(Proveedor::class, 'rela_condicioniva', 'id_condicioniva');
    }
}