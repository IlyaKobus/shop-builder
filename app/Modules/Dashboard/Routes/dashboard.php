<?php

Route::get('/home', 'DashboardController@home')->name('home');
Route::get('/', function () {
    return redirect()->route('users.index');
})->name('dashboard');