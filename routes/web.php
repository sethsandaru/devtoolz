<?php

use App\Http\Controllers\SitemapController;
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

Route::get('/rem-and-px', fn () => view('app', [
    'title' => 'REM x PX conversion',
    'description' => 'Quickly convert between REM and PX for faster Web UI development',
]));

Route::get('/sitemap.xml', [SitemapController::class, 'index']);
