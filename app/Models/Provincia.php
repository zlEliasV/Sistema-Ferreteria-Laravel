<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $table = 'provincias';
    protected $primaryKey = 'id_provincia';
    public $incrementing = true;
    protected $keyType = 'int';

    // Añade o actualiza 
    protected $fillable = [
        'descripcion',
    ];

    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'rela_provincia', 'id_provincia');
    }
}