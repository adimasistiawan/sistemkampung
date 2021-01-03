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

Route::get('/', 'FrontendController@index')->name('index');
Route::get('/masuk', function () {
    return view('login');
})->name('login.warga');
Route::get('/daftar', function () {
    return view('daftar');
})->name('daftar');
Route::get('/verifikasi', function () {
    return view('verifikasi');
})->name('verifikasi');
Route::post('/daftar/submit','AuthWargaController@daftar')->name('daftar.submit');


Route::get('/admin', function () {
    return view('admin.login');
})->name('login.admin');

Route::post('/login','AuthAdminController@login')->name('login.submit');


Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard','DashboardController@index')->name('dashboard');
    Route::resource('/admin/penduduk', 'PendudukController');
    Route::resource('/admin/pekerjaan', 'PekerjaanController');
    Route::resource('/admin/pendidikan', 'PendidikanController');
    Route::resource('/admin/berita', 'BeritaController');
    Route::resource('/admin/profil', 'ProfilController');
    Route::resource('/admin/warga', 'WargaController');

    Route::get('logout', 'AuthAdminController@logout')->name('logout');
    
});

