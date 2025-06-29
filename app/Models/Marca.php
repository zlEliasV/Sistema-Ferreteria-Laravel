<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $table = 'marcas';

    protected $primaryKey = 'id_marcas';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'marcas_descripcion', 
    ];

    public $timestamps = true; 
}