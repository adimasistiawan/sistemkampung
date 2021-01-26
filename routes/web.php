<?php

use Illuminate\Support\Facades\Route;
use App\Pekerjaan;
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
    $pekerjaan = Pekerjaan::where('is_delete',0)->get();
    return view('daftar',compact('pekerjaan'));
})->name('daftar');

Route::get('/login', function () {
    return view('login');
})->name('login.warga');

Route::get('/verifikasi', function () {
    return view('verifikasi');
})->name('verifikasi');

Route::post('/daftar/submit','AuthWargaController@daftar')->name('daftar.submit');
Route::post('/login/submit','AuthWargaController@login')->name('login.warga.submit');
Route::get('/logout/warga', 'AuthWargaController@logout')->name('logout.warga');

Route::get('/berita', 'FrontendController@berita')->name('berita');
Route::get('/berita/detail/{id}', 'FrontendController@detailberita')->name('berita.detail');
Route::get('/profil/sejarah', 'ProfilController@sejarah')->name('profil.sejarah');
Route::get('/profil/visimisi', 'ProfilController@visimisi')->name('profil.visimisi');
Route::get('/profil/struktur', 'ProfilController@struktur')->name('profil.struktur');
Route::get('/profil/lokasi', 'ProfilController@lokasi')->name('profil.lokasi');

Route::get('/data/penduduk', 'DataController@penduduk')->name('data.penduduk');
Route::get('/data/kepalakeluarga', 'DataController@kepalakeluarga')->name('data.kepalakeluarga');
Route::get('/data/pekerjaan', 'DataController@pekerjaan')->name('data.pekerjaan');
Route::get('/data/pendidikan', 'DataController@pendidikan')->name('data.pendidikan');
Route::get('/data/agama', 'DataController@agama')->name('data.agama');
Route::get('/data/umur', 'DataController@umur')->name('data.umur');
Route::group(['middleware' => 'warga'], function () {
    Route::get('/akun', 'ProfilWargaController@profil')->name('profil.warga');
    Route::get('/akun/ubah-profil', 'ProfilWargaController@ubahprofil')->name('ubahprofil.warga');
    Route::post('/akun/ubah-profil/submit','ProfilWargaController@submitubahprofil')->name('ubahprofil.warga.submit');
    Route::get('/akun/ganti-password', 'ProfilWargaController@gantipassword')->name('gantipassword.warga');
    Route::post('/akun/ganti-password/submit','ProfilWargaController@submitgantipassword')->name('gantipassword.warga.submit');
    Route::get('/akun/surat', 'SuratController@index')->name('surat');
    Route::get('/akun/surat/buat', 'SuratController@buat')->name('surat.buat');
    Route::post('/akun/surat/submit','SuratController@submit')->name('surat.submit');
});




Route::get('/admin', function () {
    return view('admin.login');
})->name('login.admin');
Route::post('/login','AuthAdminController@login')->name('login.submit');
Route::get('/admin/dashboard/chartdonut','DashboardController@chartdonut')->name('dashboard.chartdonut');
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard','DashboardController@index')->name('dashboard');
    Route::resource('/admin/penduduk', 'PendudukController');
    Route::resource('/admin/pekerjaan', 'PekerjaanController');
    Route::resource('/admin/pendidikan', 'PendidikanController');
    Route::resource('/admin/berita', 'BeritaController');
    Route::resource('/admin/profil', 'ProfilController');
    Route::get('/admin/web', 'FrontendController@web')->name('web.index');
    Route::post('/admin/web/store', 'FrontendController@webstore')->name('web.store');
    Route::resource('/admin/warga', 'WargaController');
    Route::resource('/admin/admin', 'AdminController');
    Route::resource('/admin/suratkeluar', 'SuratKeluarController');
    Route::get('/admin/suratkeluar/verifikasi/{id}','SuratKeluarController@verifikasi')->name('suratkeluar.verifikasi');
    Route::get('/admin/suratkeluar/{perihal}/{id}/{watermark}', 'SuratKeluarController@pdf')->name('suratkeluar.pdf');
    Route::get('/admin/ubahakun', 'AdminController@ubahakun')->name('ubahakun.index');
    Route::post('/admin/ubahakun/update/', 'AdminController@ubahakun_update')->name('ubahakun.update');
    Route::get('/admin/warga/verifikasi/{id}','WargaController@verifikasi')->name('warga.verifikasi');
    Route::resource('/admin/kodesurat', 'KodeSuratController');
    Route::resource('/admin/suratmasuk', 'SuratMasukController');
    Route::resource('/admin/formulir', 'FormulirController');

    Route::get('logout', 'AuthAdminController@logout')->name('logout');
    
});

