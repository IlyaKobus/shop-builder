<?php
Route::group(['middleware' => 'auth:user'], function () {
    Route::resource('customers', 'CustomerController');

    Route::get('customer/address/{index}',
        [\App\Modules\Customer\Http\Controllers\CustomerController::class, 'ajaxAddress']);

    Route::get('customer/find/{customer}',
        [\App\Modules\Customer\Http\Controllers\CustomerController::class, 'ajaxCustomerById']);

    Route::get('customer/address/find/{address}',
        [\App\Modules\Customer\Http\Controllers\CustomerController::class, 'ajaxCustomerAddressById']);

    Route::get('customer/search',
        [\App\Modules\Customer\Http\Controllers\CustomerController::class, 'ajaxCustomersByName']);

    Route::resource('customer-groups', 'CustomerGroupController')->parameters([
        'customer-groups' => 'group'
    ]);
});
