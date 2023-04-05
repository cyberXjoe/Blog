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

Route::get('/', function () {
    return redirect('/blog');
});

Auth::routes();

Route::get('/blog', 'BlogController@index');

Route::get('/blog/create', 'BlogController@createBlogPage');
Route::post('/blog/create', 'BlogController@createBlog');
Route::get('/blog/view/{blog_id}', 'BlogController@viewBlogPage');
Route::get('/blog/edit/{blog_id}', 'BlogController@editBlogPage');
Route::post('/blog/edit/{blog_id}', 'BlogController@editBlog');
Route::get('/blog/delete/{blog_id}', 'BlogController@deleteBlog');