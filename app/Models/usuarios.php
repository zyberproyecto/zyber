<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class usuarios extends Authenticatable
{
    // Nombre de la tabla
    protected $table = 'usuarios';

    // Clave primaria personalizada
    protected $primaryKey = 'ci_usuario';
    public $incrementing = false;
    protected $keyType = 'string';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'ci_usuario',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'contraseña',
        'estado_registro',
    ];

    // Si quieres ocultar la contraseña en respuestas JSON
    protected $hidden = [
        'contraseña',
    ];

    // Si usas timestamps
    public $timestamps = true;

    // Si tu campo de contraseña se llama diferente a "password"
    public function getAuthPassword()
    {
        return $this->contraseña;
    }
}