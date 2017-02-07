<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'FlotreController@index')->middleware('guest');

Route::post('contact/save', 'FlotreController@contactsave');





Route::get('admin', 'FlotreAdminController@index');
Route::get('home', 'FlotreAdminController@index');


Route::post('pesan/produk/save','FlotreController@pesanproduksave');
Route::post('ajax/pesan/produk','FlotreController@ajaxpesanproduk');

Route::get('getProduk', 'FlotreController@getProduk');


Route::auth();

Route::get('contact/admin', 'FlotreAdminController@contactadmin');


Route::get('list/pesanan', 'FlotreAdminController@listpesanan');
Route::get('list/pesanan/detail/{id}', 'FlotreAdminController@listpesanandetail');
Route::get('list/pesanan/delete/{id}', 'FlotreAdminController@listpesanandelete');
Route::get('list/pesanan/edit/{id}', 'FlotreAdminController@listpesananedit');
Route::post('list/pesanan/edit/update', 'FlotreAdminController@listpesananupdate');


Route::get('list/kritik/saran', 'FlotreAdminController@listkritiksaran');
Route::get('list/kritik/saran/detail/{id}', 'FlotreAdminController@listkritiksarandetail');
Route::get('list/kritik/saran/delete/{id}', 'FlotreAdminController@listkritiksarandelete');


Route::get('s', 'FlotreController@index');


Route::get('tambah/admin', 'FlotreAdminController@tambahadmin');
Route::post('tambah/admin/save', 'FlotreAdminController@tambahadminsave');
Route::get('list/admin', 'FlotreAdminController@listadmin');
Route::get('list/admin/detail/{id}', 'FlotreAdminController@listadmindetail');
Route::get('list/admin/delete/{id}', 'FlotreAdminController@listadmindelete');
Route::get('list/admin/edit/{id}', 'FlotreAdminController@listadminedit');
Route::post('list/admin/edit/update', 'FlotreAdminController@listadminupdate');


Route::get('profile', 'FlotreAdminController@profile');
Route::get('profile/edit/{username}', 'FlotreAdminController@profileedit');
Route::post('profile/update', 'FlotreAdminController@profileupdate');





Route::get('input/produk', 'FlotreAdminController@inputproduk');
Route::post('input/produk/save', 'FlotreAdminController@inputproduksave');
Route::get('list/produk', 'FlotreAdminController@listproduk');
Route::get('list/produk/detail/{id}', 'FlotreAdminController@listprodukdetail');
Route::get('list/produk/delete/{id}', 'FlotreAdminController@listprodukdelete');
Route::get('list/produk/edit/{id}', 'FlotreAdminController@listprodukedit');
Route::post('list/produk/edit/update', 'FlotreAdminController@listprodukupdate');

