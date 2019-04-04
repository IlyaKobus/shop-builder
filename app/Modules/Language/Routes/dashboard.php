<?php

Route::group(['middleware' => 'auth:user'], function () {
    Route::resource('languages', 'LanguageController');
});
