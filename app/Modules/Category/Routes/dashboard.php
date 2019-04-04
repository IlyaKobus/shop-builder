<?php

Route::group(['middleware' => 'auth:user'], function () {
    Route::resource('categories', 'CategoryController');

    Route::get('/category/attribute/{index}',
        [\App\Modules\Category\Http\Controllers\CategoryController::class, 'ajaxAttributeBlock']);

    Route::get('/category/option/{index}',
        [\App\Modules\Category\Http\Controllers\CategoryController::class, 'ajaxOptionBlock']);

    Route::get('/category/tree',
        [\App\Modules\Category\Http\Controllers\CategoryController::class, 'ajaxGetSelectTree']);
});


