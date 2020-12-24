<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','admin.index')->name('/');
Route::view('blog','admin.blog.index')->name('blog');
Route::view('galeria','admin.galeria.index')->name('galeria');
Route::view('promociones','admin.promociones.index')->name('promociones');
