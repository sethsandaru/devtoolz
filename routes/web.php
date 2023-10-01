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

Route::get('/{any?}', function (?string $route = '') {
    $pageInfos = [
        'json-viewer' => [
            'title' => 'JSON Viewer',
            'description' => 'Minimalism JSON Viewer',
        ],
    ];

    return view('app', [
        'title' => $pageInfos[$route]['title'] ?? null,
        'description' => $pageInfos[$route]['description'] ?? null,
    ]);
})->where('any', '.*');
