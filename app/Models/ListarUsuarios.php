<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListarUsuarios extends Model
{
    protected $table = 'usuarios'; 

    protected $fillable = ['ci_usuario', 'primer_nombre', 'primer_apellido', 'estado_registro']; 

    protected $primaryKey = 'ci_usuario';
    public $incrementing = false;
    protected $keyType = 'string'; // o 'int' según corresponda

    public static $estados = ['Pendiente', 'Aprobado', 'Rechazado']; 
}