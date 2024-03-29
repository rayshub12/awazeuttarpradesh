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

Auth::routes();

Route::get('/', 'HomeController@index');

// View Single Post
Route::get('/news/{url}', 'PostController@singlePost');

// View Category Posts
Route::get('/category/{url}', 'PostCatController@viewCategoryPost');

// View Searched Posts
Route::get('/blog', 'PostCatController@searchResult');

// News filter by Nation
Route::get('/news/nation', 'PostController@newsNation');
// Statewise News
Route::get('/news/state/{id}', 'PostController@stateWiseNews');

Route::get('/privacy-policy', function(){
    return view('privacy');
});

Route::get('/terms', function(){
    return view('terms');
});

// Admin Login and Dashboard Routes
Route::match(['get', 'post'], '/admin', 'AdminController@adminLogin');
Route::get('/admin/dashboard', 'AdminController@dashboard');


// Subscribers Route
    Route::match(['get', 'post'], '/subscribe-now', 'HomeController@subscribe');
    

Route::group(['middleware' => ['auth']], function()
{
    Route::get('/admin/dashboard', 'AdminController@dashboard');

    // Post Module (Add/Edit/Delete/Update)
    Route::match(['get', 'post'], '/admin/new-post', 'PostController@addNewPost');
    Route::match(['get', 'post'], '/admin/edit-post/{id}', 'PostController@editPost');
    Route::get('/admin/posts', 'PostController@viewPosts');
    Route::match(['get', 'post'], '/admin/new-category', 'PostCatController@addPostCat');
    Route::get('/admin/category', 'PostCatController@viewCategory');
    Route::get('/admin/post/delete/{id}', 'PostController@deletePost');

    // Subscribers Route
    Route::get('/admin/subscribers', 'AdminController@subscriberList');
    
    // Routes for Getting State List and City List Dynamically
    Route::get('/admin/get-state-list','PostController@getStateList');
    Route::get('/admin/get-city-list','PostController@getCityList');
    Route::get('/admin/edit-post/get-state-list','PostController@getStateList');
    Route::get('/admin/edit-post/get-city-list','PostController@getCityList');
    
    // system routes
    Route::get('/admin/robots.txt','SystemController@getRobot');
    Route::post('/admin/robots.txt','SystemController@postRobot');
    Route::get('/admin/htaccess','SystemController@getHtaccess');
    Route::post('/admin/htaccess','SystemController@postHtaccess');
    
    // Breaking News Module
    Route::match(['get', 'post'], '/admin/add-breaking-news', 'PostController@addBreakingNews');

});


Route::get('/logout', 'AdminController@logout');
