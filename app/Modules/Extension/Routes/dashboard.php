<?php

Route::group(['middleware' => 'auth:user'], function () {
    Route::resource('extensions', 'ExtensionController');

    Route::get('/extension/settings/{extension}',
        [\App\Modules\Extension\Http\Controllers\ExtensionController::class, 'ajaxGetSettings']);

    Route::resource('modules', 'ModuleController');
});
