<?php

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

//Route::resource('home', 'HomeController');
Route::get('/', 'HomeController@index')->name('home');

Route::get('about', function () {
    return view('about');
});

Route::get('pesan', function () {
    return view('pesan');
});

Route::post('pesan/kirim', function () {
    return view('pesan_kirim');
});

Route::get('template', function () {
	return view('layouts.master');
});

Route::get('coba1', function () {
	return view('coba1');
});

Route::get('coba2', function () {
	return view('coba2');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::post('/users/logout','Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
  Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::resource('manageadmins','ManageAdminController');
  Route::resource('uploads','UploadController');
  Route::resource('manageBarang','ManageBarangController');
  Route::resource('manajemen-kategori','ManageKategoriController');
  Route::resource('manajemen-kios','ManageKiosController');

});
Route::resource('orders','OrderController');

// Route::get('/upload',['as'=>'upload.index','uses'=>'UploadController@index']);
// Route::get('/upload/create',['as'=>'upload.create','uses'=>'UploadController@create']);
// Route::post('/upload',['as'=>'upload.store','uses'=>'UploadController@store']);