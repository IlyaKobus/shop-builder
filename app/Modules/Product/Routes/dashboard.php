<?php

Route::group(['middleware' => 'auth:user'], function () {
    Route::resource('products', 'ProductController');

    Route::get('/product/attribute/{index}',
        [\App\Modules\Product\Http\Controllers\ProductController::class, 'ajaxAttributeBlock']);

    Route::get('/product/option/{option}',
        [\App\Modules\Product\Http\Controllers\ProductController::class, 'ajaxOptionBlock']);

    Route::get('/product/option/{option}/{index}',
        [\App\Modules\Product\Http\Controllers\ProductController::class, 'ajaxOptionValueBlock']);

    Route::get('/product/image/{option}',
        [\App\Modules\Product\Http\Controllers\ProductController::class, 'ajaxImageBlock']);

    Route::get('/product/search',
        [\App\Modules\Product\Http\Controllers\ProductController::class, 'ajaxSearch']);

    Route::get('/dashboard/product/find/{product}',
        [\App\Modules\Product\Http\Controllers\ProductController::class, 'ajaxGetProductById']);
});
