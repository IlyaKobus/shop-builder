<?php

Route::group(['middleware' => 'auth:user'], function () {
    Route::resource('options', 'OptionController');

    Route::get('/option/value/{index}',
        [\App\Modules\Option\Http\Controllers\OptionController::class, 'ajaxValueBlock']);
});


