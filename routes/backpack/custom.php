<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers',
], function () { // custom admin routes

    /**
     * Products
     */
    Route::middleware([
        'permission:' . config('permissions.product.show')
    ])->prefix('products')->group(function () {

        Route::get('/', 'ProductController@list')
            ->name('product');

        Route::middleware([
            'permission:' . config('permissions.product.add')
        ])->group(function () {

            Route::get('/add', 'ProductController@add')
                ->name('product.add');

            Route::post('/add', 'ProductController@store')
                ->name('product.store');

            Route::get('/update/{id}', 'ProductController@updateForm')
                ->name('product.update.form');

            Route::post('/update/{id}', 'ProductController@update')
                ->name('product.update');
        });

    });

    /**
     * Sold Products
     */
    Route::middleware([
        'permission:' . config('permissions.product.sold')
    ])->prefix('products/sold')->group(function () {

        Route::get('/', 'SoldProductController@index')
            ->name('product.sold');

    });

    /**
     * Orders
     */
    Route::middleware([
        'permission:' . config('permissions.order.show')
    ])->prefix('order')->group(function () {

        Route::get('/', 'OrderController@index')
            ->name('order');

        Route::post('/update', 'OrderController@update')
            ->middleware(['permission:' . config('permissions.order.edit')])
            ->name('order.update');

    });

    /**
     * Category
     */
    Route::middleware([
        'permission:' . config('permissions.category.show')
    ])->prefix('category')->group(function () {

        Route::get('/', 'CategoryController@list')
            ->name('category');

        Route::middleware([
            'permission:' . config('permissions.category.add')
        ])->group(function () {

            Route::get('/create', 'CategoryController@create')
                ->name('category.create');

            Route::post('/create', 'CategoryController@store')
                ->name('category.store');

            Route::get('/update/{id}', 'CategoryController@updateForm')
                ->name('category.update.form');

            Route::post('/update{id}', 'CategoryController@update')
                ->name('category.update');
        });

    });


}); // this should be the absolute last line of this file
