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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:super-admin']], function () {
    Route::post('/tema', 'TemaController@store');
    Route::delete('/tema/{tema}', 'TemaController@destroy');
    
    Route::post('/kategori', 'KategoriController@store');
    Route::delete('/kategori/{kategori}', 'KategoriController@destroy');
    Route::get('/loadKategori', 'KategoriController@index');

    Route::get('/loadPesan', 'PesanController@index');
    Route::post('/pesan', 'PesanController@store');
    Route::get('/pesan/verified', 'PesanController@loadVerifieds');
    Route::get('/pesan/unverified', 'PesanController@loadUnverifieds');
    Route::get('/pesan/archiveds', 'PesanController@loadArchiveds');
    Route::post('/pesan/update', 'PesanController@update');
    Route::patch('/pesan/{pesan}/verify', 'PesanController@verify');
    Route::patch('/pesan/{pesan}/archive', 'PesanController@archive');
    Route::delete('/pesan/{pesan}', 'PesanController@destroy');


    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/{vue_capture?}', function () {
        return view('dashboard.master');
    })->where('vue_capture', '[\/\w\.-]*');

});


