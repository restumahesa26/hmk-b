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
Route::get('/', 'HomeController@index')->name('home');

Route::post('/kirim-data', 'KirimDataController@store')->name('kirim-data');

Route::get('/dokumentasi', 'DokumentasiController@index')->name('dokumentasi');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function() {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::get('profile', 'ProfileController@edit')->name('profile.edit');

        Route::patch('profile', 'ProfileController@update')->name('profile.update');

        Route::get('/data-anggota-aktif/sort/nama' , 'SearchController@sort')->name('sort1');

        Route::get('/data-anggota-aktif/sort/kampus' , 'SearchController@sort2')->name('sort2');

        Route::get('/data-anggota-aktif/sort/angkatan' , 'SearchController@sort3')->name('sort3');

        Route::get('/data-anggota-aktif/sort/jurusan' , 'SearchController@sort7')->name('sort7');

        Route::get('/data-alumni/sort/nama' , 'SearchController@sort4')->name('sort4');

        Route::get('/data-alumni/sort/kampus' , 'SearchController@sort5')->name('sort5');

        Route::get('/data-alumni/sort/angkatan' , 'SearchController@sort6')->name('sort6');

        Route::get('/data-alumni/sort/jurusan' , 'SearchController@sort8')->name('sort8');
        
        Route::get('/data-anggota-aktif/cari', 'SearchController@search')->name('cari');

        Route::get('/data-alumni/cari', 'SearchController@search2')->name('cari2');

        Route::get('/data-anggota-aktif/{data_anggota_aktif}/move', 'DataAnggotaAktifController@move')->name('data-anggota-aktif.move');

        Route::resource('data-anggota-aktif', 'DataAnggotaAktifController');

        Route::get('/data-alumni/{data_alumnus}/move', 'DataAlumniController@move')->name('data-alumni.move');

        Route::resource('data-alumni', 'DataAlumniController');

        Route::resource('kampus', 'KampusController');

        Route::resource('tentang-hmkb', 'TentangHMKBController');

        Route::resource('data-pengurus', 'DataPengurusController');

        Route::resource('data-dokumentasi', 'DataDokumentasiController');

        Route::resource('data-divisi', 'DataDivisiController');

        Route::get('/request-data/{request_datum}/move-aktif' , 'RequestController@moveaktif')->name('request-data.move-aktif');

        Route::get('/request-data/{request_datum}/move-alumni' , 'RequestController@movealumni')->name('request-data.move-alumni');
        
        Route::resource('request-data', 'RequestController');
    });

Auth::routes(['verify' => true]);