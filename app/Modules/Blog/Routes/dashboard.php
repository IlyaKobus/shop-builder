<?php

Route::group(['middleware' => 'auth:user'], function () {
    Route::resource('blog-posts', 'BlogPostController')->parameters([
        'blog-posts' => 'post'
    ]);
    Route::resource('blog-categories', 'BlogCategoryController')->parameters([
        'blog-categories' => 'category'
    ]);
});
