<?php

use GuzzleHttp\Middleware;
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



Route::get('/home', function () {
    return view('home');
});

Route::get('login', 'Authcontroller@login')->name('login');
Route::post('postlogin', 'Authcontroller@postlogin');
Route::get('logout', 'Authcontroller@logout');

Route::group(['middleware' => ['auth', 'Checkrole:admin']], function () {



    Route::get('mapel', 'Createmapelcontroller@index');

    Route::get('siswa', 'siswacontroller@index');

    Route::post('siswa/create', 'siswacontroller@create');

    route::get('/siswa/{id}/edit', 'siswacontroller@edit');

    route::post('/siswa/{id}/update', 'siswacontroller@update');

    route::get('/siswa/{id}/delete', 'siswacontroller@delete');

    Route::get('/siswa/{id}/profile', 'siswacontroller@profile');

    Route::post('/siswa/{id}/addnilai', 'siswacontroller@addnilai');

    Route::get('/siswa/exportpdf', 'siswacontroller@exportPdf');
});

Route::group(['middleware' => ['auth', 'Checkrole:admin,siswa']], function () {

    Route::get('dashboard', 'Dashboardcontroller@index');
    Route::get('dashboard', 'Dashboardcontroller@dashboard');
});
