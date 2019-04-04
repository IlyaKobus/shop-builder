<?php

Route::group(['middleware' => 'auth:user'], function () {
    Route::resource('pages', 'PageController');
});
