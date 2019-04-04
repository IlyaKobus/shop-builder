<?php

Route::group(['middleware' => 'auth:user'], function () {
    Route::resource('attributes', 'AttributeController');
    Route::resource('attribute-groups', 'AttributeGroupController');
});
