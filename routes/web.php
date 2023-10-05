<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('', fn () => view('app'));

Route::get('/json-viewer', fn () => view('app', [
    'title' => 'JSON Viewer',
    'description' => 'Minimalism JSON Viewer',
]));

Route::get('/encryptor', fn () => view('app', [
    'title' => 'Encryptor helper',
    'description' => 'Encrypt your desired value in multiple hashing algorithms',
]));

Route::get('/identifiers', fn () => view('app', [
    'title' => 'Random IDs',
    'description' => 'Quickly generate popular identifiers in no time',
]));
