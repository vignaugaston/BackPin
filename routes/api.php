<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//importe PageController
use App\Http\Controllers\PageController;

//cree ruta API 
Route::post('/contacto',[PageController::class,'storeApiMensaje'])->name('api.mensaje.store');

