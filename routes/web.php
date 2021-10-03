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

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/', 'FrontController@index')->name('home');

// Frontend
Route::get('pencarian-laundry','FrontController@search');

// Auth::routes([
//     'register' => false,
// ]);

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Route::post('ss', 'Auth\CustomerController');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/home', 'HomeController@index')->name('home');

// Modul Admin
Route::resource('admin','AdminController');
    // Pengguna
    Route::get('adm','AdminController@adm');
    Route::get('kry','AdminController@kry');
    Route::get('kry-add','AdminController@addkry');

    // Customer
    Route::get('customer','AdminController@customer');
    Route::get('customer-add','AdminController@addcustomer');
    Route::post('customer-store','AdminController@storecustomer');
    Route::get('customer-edit/{id_customer}','AdminController@editcustomer');
    Route::put('customer-update/{id_customer}','AdminController@updatecustomer');
    Route::delete('customer-delete/{id_customer}','AdminController@deletecustomer');
    Route::get('jml-transaksi','AdminController@jmlTransaksi');

    // Data Laundri
    Route::get('data-transaksi','AdminController@datatransaksi');
    Route::get('data-harga','AdminController@dataharga');
    Route::post('harga-store','AdminController@hargastore');
    Route::get('edit-harga','AdminController@hargaedit');

    // Laporan
    Route::get('invoice-customer/{id}','AdminController@invoice');

    // Finance
    Route::get('data-finance','AdminController@finance');

    // Notifikasi
    Route::get('read-notification','AdminController@notif');

    // Filter 
    Route::get('filter-transaksi','AdminController@filtertransaksi');

    
    Route::get('feedback','AdminController@feedback');

// Modul Karyawan
Route::resource('pelayanan','PelayananController');
    // Transaksi
    Route::get('add-order','PelayananController@addorders');
    Route::get('ubah-status-order','PelayananController@ubahstatusorder');
    Route::get('ubah-status-bayar','PelayananController@ubahstatusbayar');
    Route::get('ubah-status-ambil','PelayananController@ubahstatusambil');

    // Customer
    Route::get('list-customer','PelayananController@listcs');
    Route::get('list-customer-add','PelayananController@listcsadd');
    Route::post('list-costomer-store','PelayananController@addcs');

    // Filter
    Route::get('listharga','PelayananController@listharga');
    Route::get('listhari','PelayananController@listhari');
    Route::get('get-customer','PelayananController@getcustomer');
    Route::get('get-email-customer','PelayananController@getemailcustomer');

    // Laporan
    Route::get('invoice-kar/{id}','PelayananController@invoicekar');
    Route::get('cetak-invoice/{id}/print','PelayananController@cetakinvoice');

    // Profile
    Route::get('profile-karyawan/{id}','ProfileController@karyawanProfile');
    Route::get('profile-karyawan/edit/{id}','ProfileController@karyawanProfileEdit');
    Route::put('profile-karyawan/update/{id}','ProfileController@karyawanProfileSave');
    Route::get('reset-password','ProfileController@reset_password');
    

    Route::group(['middleware' => 'auth'], function () {

        Route::get('password', 'PasswordController@edit')
            ->name('user.password.edit');
    });

    
    Route::group(['middleware' => 'auth'], function () {

        Route::get('password', 'PasswordController@edit')
            ->name('user.password.edit');
    
        Route::patch('password', 'PasswordController@update')
            ->name('user.password.update');
    });

    Route::get('change-password', 'ChangePasswordController@index');
    Route::post('change-password', 'ChangePasswordController@store')->name('change.password');


    Route::get('/feedback/input','FeedbackController@create');
    Route::post('/feedback/add','FeedbackController@add');
    

    Route::get('/harga','HargaController@index');