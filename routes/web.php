<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [EmailController::class, 'showForm']);
Route::post('/send-email', [EmailController::class, 'sendEmail']);
