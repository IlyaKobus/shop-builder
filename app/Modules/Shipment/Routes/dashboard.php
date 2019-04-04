<?php

Route::group(['middleware' => 'auth:user'], function () {
    Route::resource('shipments', 'ShipmentController');
});
