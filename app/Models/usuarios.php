<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class usuarios extends Authenticatable
{
	protected $table = 'usuarios';
	protected $primaryKey = 'ci_usuario';
	public $incrementing = false;
	protected $keyType = 'string';
	protected $fillable = [
		'ci_usuario',
		'primer_nombre',
		'segundo_nombre',
		'primer_apellido',
		'segundo_apellido',
		'contraseña',
		'estado_registro',
	];
	protected $hidden = [
		'contraseña',
	];
	public $timestamps = true;
	public function getAuthPassword()
	{
		return $this->contraseña;
	}

	use SoftDeletes;
}

