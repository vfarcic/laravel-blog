<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Show Blog
 */
Route::get('/', 'BlogController@show')->name('show');

/**
 * Add New Blog
 */
Route::post('/blog', 'BlogController@addBlog')->name('add_blog');

/**
 * Delete Blog
 */
Route::delete('/blog/{id}', 'BlogController@deleteBlog')->name('delete_blog');
