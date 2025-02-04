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

Route::get('/', \App\Http\Livewire\Numbers::class);
Route::get('/lotofacil-sorteios' , \App\Http\Livewire\SorteioRealtime::class);
Route::get('/lotofacil-gerador', \App\Http\Livewire\GeradorJogos::class);
Route::get('/supersete' , \App\Http\Livewire\SorteadorSuperSete::class);