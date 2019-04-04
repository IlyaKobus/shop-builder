<?php

Route::group(['middleware' => 'auth:user'], function () {
    Route::resource('manufacturers', 'ManufacturerController');
});
