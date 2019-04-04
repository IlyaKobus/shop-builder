<?php

Route::group(['middleware' => 'auth:user'], function () {
    Route::resource('layouts', 'LayoutController');

    Route::get('/layout/module/{type}/{index}',
        [\App\Modules\Layout\Http\Controllers\LayoutController::class, 'ajaxModule']);
});
