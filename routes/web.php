<?php


#Frontend
Route::get('/', 'FrontendController@index');
Route::get('thanh-toan', 'FrontendController@checkout');
Route::get('{value}', 'FrontendController@main');

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

