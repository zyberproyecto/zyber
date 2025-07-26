<?php
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::post('http://localhost:8000/api/usuarios/login', [UsuarioController::class, 'Logear']);