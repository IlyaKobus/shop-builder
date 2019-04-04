<?php

Route::group(['middleware' => 'auth:user'], function () {
    Route::resource('orders', 'OrderController');
    Route::resource('order-statuses', 'OrderStatusController')->parameters([
        'order-statuses' => 'status'
    ]);;

    Route::post('orders/{order}/event',
        [\App\Modules\Order\Http\Controllers\OrderController::class, 'addEvent'])->name('orders.add-event');

    Route::get('order/product/{product}/{index}',
        [\App\Modules\Order\Http\Controllers\OrderController::class, 'ajaxProductBlock']);
});
