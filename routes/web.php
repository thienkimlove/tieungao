<?php

#Admin Routes
Route::get('admin/login', 'AdminController@redirectToGoogle');
Route::get('admin/logout', 'AdminController@logout');
Route::get('admin/callback', 'AdminController@handleGoogleCallback');
Route::get('admin/notice', 'AdminController@notice');
Route::get('admin', 'AdminController@index');
#Content Routes
Route::resource('admin/users', 'UsersController');
Route::resource('admin/categories', 'CategoriesController');
Route::resource('admin/suppliers', 'SuppliersController');
Route::resource('admin/products', 'ProductsController');
Route::resource('admin/imports', 'ImportsController');
Route::get('admin/make_import/{id}', 'ImportsController@import');
Route::get('admin/cancel_import/{id}', 'ImportsController@cancel');

Route::get('admin/orders', 'OrdersController@index');
Route::get('admin/confirm_order/{id}', 'OrdersController@confirm');
Route::get('admin/export_order/{id}', 'OrdersController@export');
Route::get('admin/cancel_order/{id}', 'OrdersController@cancel');

Route::get('admin/exports', 'ExportsController@index');
Route::get('admin/cancel_export/{id}', 'ExportsController@cancel');

#Frontend
Route::get('/', 'FrontendController@index');
Route::get('checkout', 'FrontendController@checkout');
Route::post('order', 'FrontendController@order');
Route::get('{value}', 'FrontendController@main');


