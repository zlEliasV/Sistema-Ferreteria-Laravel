<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    use HasFactory;

    protected $table = 'rubros'; 

    protected $primaryKey = 'id';

    
    public $timestamps = false;

    protected $fillable = [
        'nombre', 
    ];
}