<?php

use App\Http\Controllers\ListarUsuariosController;
use Illuminate\Support\Facades\Route;

// Ruta principal (listado)
Route::get('/', [ListarUsuariosController::class, 'index']);

// Ruta para actualizar estado (sin autenticación)
Route::post('/usuarios/{id}/actualizar-estado', [ListarUsuariosController::class, 'actualizarEstado'])
    ->name('usuarios.actualizar-estado');