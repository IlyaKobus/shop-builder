<?php

/* --- Auth routes --- */
Route::get('/login', 'LoginController@showLoginForm')->name('login.page');
Route::post('/login', 'LoginController@login')->name('login');
Route::post('/logout', 'LoginController@logout')->name('logout');
/* ------------------- */