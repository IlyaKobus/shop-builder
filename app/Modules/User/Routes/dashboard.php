<?php

Route::group(['middleware' => 'auth:user'], function () {
    Route::resource('users', 'UserController');

    Route::resource('user-groups', 'UserGroupController')->parameters([
        'user-groups' => 'group',
    ]);

    Route::get('/user-groups/permission/{index}',
        [\App\Modules\User\Http\Controllers\UserGroupController::class, 'ajaxPermissionBlock']);
});

