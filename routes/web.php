<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('{pms}', function(){
    return view('pms.index');
})->where('pms', '.*')->middleware('auth')->name('pms');

Route::get('{cis}', function(){
    return view('cis.index');
})->where('cis', '.*')->middleware('auth')->name('cis');

Route::get('{pis}', function(){
    return view('pis.index');
})->where('pis', '.*')->middleware('auth')->name('pis');

Route::get('{lt}', function(){
    return view('lt.index');
})->where('lt', '.*')->middleware('auth')->name('lt');

Route::get('{icd10}', function(){
    return view('icd10.index');
})->where('icd10', '.*')->middleware('auth')->name('icd10');
