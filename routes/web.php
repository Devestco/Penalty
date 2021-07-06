<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.home');
});

Route::prefix('/admin')->name('admin.')->namespace('App\Http\Controllers\Admin')->group(function() {
    Route::namespace('Auth')->group(function(){
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login')->name('login.submit');
        Route::post('/logout','LoginController@logout')->name('logout');
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
    });
    Route::get('clear-all-notifications', 'NotificationController@clearAdminNotifications')->name('clear-all-notifications');
    Route::get('read-notification/{id}', 'NotificationController@readNotification')->name('read-notification');
    Route::get('settings', 'SettingController@showConfig')->name('settings.edit');
    Route::put('settings', 'SettingController@updateConfing')->name('settings.update');


    Route::get('/profile', 'AdminController@profile')->name('profile');
    Route::put('/profile', 'AdminController@updateProfile')->name('profile.update');

    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('user', 'UserController');
    Route::post('user/{id}/ban', 'UserController@ban')->name('user.ban');
    Route::post('user/{id}/activate', 'UserController@activate')->name('user.activate');


});
