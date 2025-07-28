<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{

	public function Index()
	{
		$usuarios = usuarios::all();
		return view("index", ["usuarios" => $usuarios]);
	}
	public function Logear(Request $request)
	{
		Log::info('Intento de login', $request->all());

		$nombre = trim($request->input('usuario'));
		$usuario = usuarios::whereRaw('LOWER(primer_nombre) = ?', [strtolower($nombre)])->first();

		if ($usuario && Hash::check($request->input('password'), $usuario->contraseña)) {
			return response()->json(['success' => true, 'message' => 'Login exitoso']);
		} else {
			return response()->json(['success' => false, 'message' => 'Usuario o contraseña incorrectos'], 401);
		}
	}
	public function Registrar(Request $request)
	{
		$request->validate([
			'ci_usuario' => 'required|string|unique:usuarios,ci_usuario',
			'primer_nombre' => 'required|string',
			'segundo_nombre' => 'nullable|string',
			'primer_apellido' => 'required|string',
			'segundo_apellido' => 'nullable|string',
			'password' => 'required|string',
		]);

		$usuario = usuarios::create([
			'ci_usuario' => $request->ci_usuario,
			'primer_nombre' => $request->primer_nombre,
			'segundo_nombre' => $request->segundo_nombre,
			'primer_apellido' => $request->primer_apellido,
			'segundo_apellido' => $request->segundo_apellido,
			'contraseña' => Hash::make($request->password),
			'estado_registro' => 'Pendiente',
		]);

		return response()->json(['success' => true, 'message' => 'Registrado exitosamente']);
	}
}
