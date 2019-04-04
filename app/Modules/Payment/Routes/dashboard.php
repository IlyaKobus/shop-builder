<?php

Route::group(['middleware' => 'auth:user'], function () {
    Route::resource('payments', 'PaymentController');
});
