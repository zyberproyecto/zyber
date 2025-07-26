<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController; 

$landingHtmlPath = 'C:\Users\kevia\OneDrive\Desktop\Landing Page\\';
$landingCssPath = 'C:\Users\kevia\OneDrive\Desktop\Landing Page\css\\';
$landingJsPath = 'C:\Users\kevia\OneDrive\Desktop\Landing Page\js\\';

Route::get('/js/{file}', function ($file) use ($landingJsPath) {
    $path = $landingJsPath . $file;
    if (file_exists($path)) {
        return response()->file($path, ['Content-Type' => 'application/javascript']);
    }
    abort(404);
});

Route::get('/css/{file}', function ($file) use ($landingCssPath) {
    $path = $landingCssPath . $file;
    if (file_exists($path)) {
        return response()->file($path, ['Content-Type' => 'text/css']);
    }
    abort(404);
});

Route::get('/Img/{file}', function ($file) {
    $path = 'C:\Users\kevia\OneDrive\Desktop\Landing Page\Img\\' . $file;
    if (file_exists($path)) {
        return response()->file($path);
    }
    abort(404);
});

Route::get('/', function () use ($landingHtmlPath) {
    return response()->file($landingHtmlPath . 'index.html', ['Content-Type' => 'text/html']);
});
Route::get('/planes', function () use ($landingHtmlPath) {
    return response()->file($landingHtmlPath . 'planes.html', ['Content-Type' => 'text/html']);
});
Route::get('/contacto', function () use ($landingHtmlPath) {
    return response()->file($landingHtmlPath . 'contacto.html', ['Content-Type' => 'text/html']);
});
Route::get('/login', function () use ($landingHtmlPath) {
    return response()->file($landingHtmlPath . 'login.html', ['Content-Type' => 'text/html']);
});

Route::post('/login', [UsuarioController::class, 'Logear']);
//Route::post('/api/usuarios/login', [UsuarioController::class, 'Logear']);