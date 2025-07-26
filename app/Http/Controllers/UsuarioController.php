<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{

    public function Index(){
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
   
}