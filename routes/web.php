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

Route::get('', 'HomeController@index')->name('home');

Auth::routes();

Route::get('admin', 'AdminController@index')->middleware('role:admin')->name('admin.page');

Route::get('manager','ManagerController@index')->middleware('role:manager')->name('manager.page');

Route::get('kasir','KasirController@index')->middleware('role:kasir')->name('kasir.page');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/index', 'AdminController@index_produk')->name('admin.index');
Route::get('/admin/create', 'AdminController@create')->name('admin.create');
Route::post('/admin/create', 'AdminController@store')->name('admin.store');
Route::get('admin/edit/{id}', 'AdminController@edit')->name('admin.edit');
Route::post('admin/update/{id}', 'AdminController@update')->name('admin.update');
Route::get('admin/delete/{id}', 'AdminController@destroy')->name('admin.destroy');

Route::get('/admin/distributor', 'AdminController@index_distributor')->name('admin.distributor');
Route::get('admin/create_distributor', 'AdminController@create_distributor')->name('admin.create_distributor');
Route::post('admin/create_distributor', 'AdminController@store_distributor')->name('admin.store_distributor');
Route::get('admin/edit_distributor/{id}', 'AdminController@edit_distributor')->name('admin.edit_distributor');
Route::post('admin/update_distributor/{id}', 'AdminController@update_distributor')->name('admin.update_distributor');
Route::get('admin/delete_distributor/{id}', 'AdminController@destroy_distributor')->name('admin.destroy_distributor');


Route::get('/admin/merek', 'AdminController@index_merek')->name('admin.merek');
Route::get('admin/create_merek', 'AdminController@create_merek')->name('admin.create_merek');
Route::post('admin/create_merek', 'AdminController@store_merek')->name('admin.store_merek');
Route::get('admin/edit_merek/{id}', 'AdminController@edit_merek')->name('admin.edit_merek');
Route::post('admin/update_merek/{id}', 'AdminController@update_merek')->name('admin.update_merek');
Route::get('admin/delete_merek/{id}', 'AdminController@destroy_merek')->name('admin.destroy_merek');

//Transaksi
Route::get('/kasir/transaksi', 'KasirController@index_transaksi')->name('kasir.transaksi');
Route::get('/kasir/create_transaksi', 'KasirController@create_transaksi')->name('kasir.create_transaksi');
Route::post('/kasir/create_transaksi', 'KasirController@store_transaksi')->name('kasir.store_transaksi');
Route::get('/kasir/create_keranjang', 'KasirController@create_keranjang')->name('kasir.create_keranjang');

//User Admin
Route::get('/manager/admin', 'ManagerController@index_admin')->name('manager.admin');
Route::get('manager/create_admin', 'ManagerController@create_admin')->name('manager.create_admin');
Route::post('manager/create_admin', 'ManagerController@store_admin')->name('manager.store_admin');
Route::get('manager/delete_admin/{id}', 'ManagerController@destroy_admin')->name('manager.destroy_admin');

//User Kasir
Route::get('/manager/kasir', 'ManagerController@index_kasir')->name('manager.kasir');
Route::get('manager/create_kasir', 'ManagerController@create_kasir')->name('manager.create_kasir');
Route::post('manager/create_kasir', 'ManagerController@store_kasir')->name('manager.store_kasir');
Route::get('manager/delete_kasir/{id}', 'ManagerController@destroy_kasir')->name('manager.destroy_kasir');

//Laporan 
Route::get('laporan', 'LaporanController@index')->name('laporan');
Route::get('laporan_barang', 'LaporanController@barang')->name('laporan_barang');
Route::get('/laporan/cari', 'LaporanController@cari');
Route::get('/laporan/search', 'LaporanController@search');
Route::get('/laporanexport_barang', 'LaporanController@exportbarang')->name('export_barang');
Route::get('/laporanexport_transaksi', 'LaporanController@exporttransaksi')->name('export_transaksi');

//Bayar
Route::resource('transaksis', 'TransaksiController');




