<?php

use App\Http\Controllers\MainCountroller;
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

Route::get('/',                     [MainCountroller::class,'index']);
Route::get('/data_table',           [MainCountroller::class,'show'])->name('table');
Route::get('/edit_table/{id}',      [MainCountroller::class,'edit'])->name('show_edit');
Route::post('/edit_data/{variable}',[MainCountroller::class,'update'])->name('edit_data');
Route::post('/show_table',          [MainCountroller::class,'show'])->name('show_table');
Route::get('/project',              [MainCountroller::class,'create']);
Route::delete('/del/{test}',        [MainCountroller::class,'destroy']);
Route::post('/create_new_project',  [MainCountroller::class,'store'])->name('create');