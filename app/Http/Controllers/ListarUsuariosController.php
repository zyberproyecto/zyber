<?php

namespace App\Http\Controllers;

use App\Models\ListarUsuarios;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ListarUsuariosController extends Controller
{
    public function index()
    {
        $usuarios = ListarUsuarios::select('ci_usuario', 'primer_nombre', 'primer_apellido', 'estado_registro')
                    ->orderBy('ci_usuario', 'asc')
                    ->get(); 

        return view('index', compact('usuarios'));
    }

    public function actualizarEstado(Request $request, $id)
    {
        $request->validate([
            'estado_registro' => 'required|in:' . implode(',', ListarUsuarios::$estados)
        ]);

        ListarUsuarios::find($id)->update([
            'estado_registro' => $request->estado_registro
        ]);

        return back()->with('exito', 'Estado actualizado!');
    }
}