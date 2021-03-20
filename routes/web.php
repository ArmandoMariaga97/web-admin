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
Route::view('/','index')->name('/');
Route::view('/admin','admin.index')->middleware('auth')->name('/admin');

Route::view('blog','admin.blog.index')->middleware('auth')->name('blog');
Route::view('blog-created','admin.blog.created')->middleware('auth')->name('blogcreated');

Route::view('galeria','admin.galeria.index')->middleware('auth')->name('galeria');
Route::view('perfil','admin.perfil.index')->middleware('auth')->name('perfil');

Route::post('cargar-images', 'Photos@cargarfotosdroopzone')->name('cargar-images');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
