<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

//Mande a la vista mail
// Route::get('/', function () {
//     return view('mail');
// });



Route::get('/', [PageController::class,'mail']);