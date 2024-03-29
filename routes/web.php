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

// use Symfony\Component\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomePageController@index');
Route::post('/subscribe', 'HomePageController@subscribe');

Route::get('/all-authors', 'PagesController@allAuthors');
Route::get('/all-categories', 'PagesController@allCategory');

Route::get('/about', 'PagesController@about');
Route::get('/membership', 'PagesController@membership');
Route::get('/jobs', 'PagesController@jobs');
Route::get('/sitemap', 'PagesController@sitemap');

Route::get('/contact', 'PagesController@contact');
Route::post('/contact-submit', 'PagesController@contactSubmit');

Route::get('/news-updates', 'PagesController@newsletter');

Route::get('/podcast', 'PagesController@podcast');
Route::get('/advertisement-policy', 'PagesController@advPolicy');

Route::get('/technical-issue', 'PagesController@techIssues');
Route::post('/technical-issue/submit', 'PagesController@techIssuesSubmit');

Route::get('/complaints', 'PagesController@complaint');
Route::post('/complaints/submit', 'PagesController@complaintSubmit');

Route::get('/terms-condition', 'PagesController@termsCondition');
Route::get('/privacy-policy', 'PagesController@privacyPolicy');
Route::get('/cookie-policy', 'PagesController@cookiePolicy'); 

// OAuths
Route::get('/sign-in/google', 'Auth\LoginController@googleLogin');
Route::get('/sign-in/google/redirect', 'Auth\LoginController@googleLoginRedirect');

Route::get('/sign-in/facebook', 'Auth\LoginController@facebookLogin');
Route::get('/sign-in/facebook/redirect', 'Auth\LoginController@facebookLoginRedirect');


Route::get('/listing', 'ListingPageController@index');
Route::get('/category/{id}', 'ListingPageController@listingCategory');
Route::get('/author/{id}', 'ListingPageController@listing');

Route::get('/details', 'DetailsPageController@index');
Route::get('/details/{slug}', 'DetailsPageController@index')->name('details');

Route::post('/comments', 'DetailsPageController@comment');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', 'Admin\DashboardController@index');
    
    Route::get('/permission', ['uses'=>'Admin\PermissionController@index', 'as'=>'permission-list', 
                               'middleware'=>'permission:Permission List|All']);
    Route::get('/permission/create', ['uses'=>'Admin\PermissionController@create', 'as'=>'permission-create', 
                                      'middleware'=>'permission:Permission Add|All']);
    Route::post('/permission/store', ['uses'=>'Admin\PermissionController@store', 'as'=>'permission-store', 
                                      'middleware'=>'permission:Permission Add|All']);
    Route::get('/permission/edit/{id}', ['uses'=>'Admin\PermissionController@edit', 'as'=>'permission-edit', 
                                         'middleware'=>'permission:Permission Update|All']);
    Route::put('/permission/update/{id}', ['uses'=>'Admin\PermissionController@update', 'as'=>'permission-update', 
                                           'middleware'=>'permission:Permission Update|All']);
    Route::delete('/permission/delete/{id}', ['uses'=>'Admin\PermissionController@delete', 'as'=>'permission-delete', 
                                              'middleware'=>'permission:Permission Delete|All']);
    
    Route::get('/roles', 'Admin\RoleController@index');
    Route::get('/roles/create', 'Admin\RoleController@create');
    Route::post('/roles/store', 'Admin\RoleController@store');
    Route::get('/roles/edit/{id}', ['uses'=>'Admin\RoleController@edit', 'as'=>'role-edit']);
    Route::put('/roles/update/{id}', ['uses'=>'Admin\RoleController@update', 'as'=>'role-update']);
    Route::delete('/roles/delete/{id}', ['uses'=>'Admin\RoleController@destroy', 'as'=>'role-delete']);

    Route::get('/author', 'Admin\AuthorController@index');
    Route::get('/author/create', 'Admin\AuthorController@create');
    Route::post('/author/store', 'Admin\AuthorController@store');
    Route::put('/author/status/{id}', ['uses'=>'Admin\AuthorController@status', 'as'=>'author-status']);
    Route::get('/author/edit/{id}', ['uses'=>'Admin\AuthorController@edit', 'as'=>'author-edit']);
    Route::put('/author/update/{id}', ['uses'=>'Admin\AuthorController@update', 'as'=>'author-update']);
    Route::delete('/author/delete/{id}', ['uses'=>'Admin\AuthorController@destroy', 'as'=>'author-delete']);

    Route::get('/category', ['uses'=>'Admin\CategoryController@index', 'as'=>'category-list', 
                               'middleware'=>'permission:Category List|All']);
    Route::get('/category/create', ['uses'=>'Admin\CategoryController@create', 'as'=>'category-create', 
                                    'middleware'=>'permission:Category Create|All']);
    Route::post('/category/store', ['uses'=>'Admin\CategoryController@store', 'as'=>'category-store', 
                                    'middleware'=>'permission:Category Store|All']);
    Route::put('/category/status/{id}', ['uses'=>'Admin\CategoryController@status', 'as'=>'category-status', 
                                        'middleware'=>'permission:Category Store|All']);
    Route::get('/category/edit/{id}', ['uses'=>'Admin\CategoryController@edit', 'as'=>'category-edit', 
                                        'middleware'=>'permission:Category Edit|All']);
    Route::put('/category/update/{id}', ['uses'=>'Admin\CategoryController@update', 'as'=>'category-update', 
                                        'middleware'=>'permission:Category Update|All']);
    Route::delete('/category/delete/{id}', ['uses'=>'Admin\CategoryController@destroy', 'as'=>'category-delete', 
                                        'middleware'=>'permission:Category Delete|All']);     
                            
    Route::get('/post', ['uses'=>'Admin\PostController@index', 'as'=>'post-list', 
                        'middleware'=>'permission:Post List|All']);
    Route::get('/post/create', ['uses'=>'Admin\PostController@create', 'as'=>'post-create', 
                                'middleware'=>'permission:Post List|All']);
    Route::post('/post/store', ['uses'=>'Admin\PostController@store', 'as'=>'post-store', 
                                'middleware'=>'permission:Post List|All']);
    Route::put('/post/status/{id}', ['uses'=>'Admin\PostController@status', 'as'=>'post-status', 
                                    'middleware'=>'permission:Post List|All']);
    Route::put('/post/hot/news/{id}', ['uses'=>'Admin\PostController@hot_news', 'as'=>'post-hot news', 
                                    'middleware'=>'permission:Post List|All']);
    Route::get('/post/edit/{id}', ['uses'=>'Admin\PostController@edit', 'as'=>'post-edit', 
                                    'middleware'=>'permission:Post List|All']);
    Route::put('/post/update/{id}', ['uses'=>'Admin\PostController@update', 'as'=>'post-update', 
                                    'middleware'=>'permission:Post Update|All']);
    Route::delete('/post/delete/{id}', ['uses'=>'Admin\PostController@destroy', 'as'=>'post-delete', 
                                    'middleware'=>'permission:Post Delete|All']);

    Route::get('/comments', ['uses'=>'Admin\CommentController@showComments', 'as'=>'comments-all',
                                'middleware'=>'permission:Post List|All']);             
    Route::get('/comment/{id}', ['uses'=>'Admin\CommentController@index', 'as'=>'comment-list', 
                                'middleware'=>'permission:Post List|All']);
    Route::get('/comment/reply/{id}', ['uses'=>'Admin\CommentController@reply', 'as'=>'comment-view', 
                                        'middleware'=>'permission:Post List|All']);
    Route::post('/comment/reply', ['uses'=>'Admin\CommentController@store', 'as'=>'comment-reply', 
                                    'middleware'=>'permission:Post List|All']);
    Route::put('/comment/status/{id}', ['uses'=>'Admin\CommentController@status', 'as'=>'comment-status', 
                                        'middleware'=>'permission:Post List|All']);
    Route::delete('/comment/delete/{id}', ['uses'=>'Admin\CommentController@destroy', 'as'=>'comment-delete', 
                                        'middleware'=>'permission:Post List|All']);

    Route::get('/settings', ['uses'=>'Admin\SettingController@index', 'as'=>'setting', 
                            'middleware'=>'permission:System Settings|All']);
    Route::put('/settings/update', ['uses'=>'Admin\SettingController@update', 'as'=>'setting-update', 
                                    'middleware'=>'permission:System Settings|All']);

    Route::get('/profile', 'Admin\ProfileController@index');
    Route::put('/profile/update', 'Admin\ProfileController@update');

    // Mailbox Routes
    
    Route::get('/contacts/list', 'PagesController@contactList');
    Route::get('/contacts/details/{id}', 'PagesController@contactDetails');
    Route::delete('/contacts/delete/{id}', 'PagesController@contactDestroy');

    Route::get('/newsletters/list', 'PagesController@newsletterList');

    Route::get('/issues/list', 'PagesController@techIssuesList');
    Route::get('/issues/details/{id}', 'PagesController@techIssuesDetails');
    Route::delete('/issues/delete/{id}', 'PagesController@techIssuesDestroy');

    Route::get('/complaints/list', 'PagesController@complaintList');
    Route::get('/complaints/details/{id}', 'PagesController@complaintDetails');
    Route::delete('/complaints/delete/{id}', 'PagesController@complaintDestroy');

});

Auth::routes();




// Route Practice:
Route::get('/hello', function () {
    return 'Hello World';
});
Route::get('/user/{id}/{name?}', function ($id, $name = "Believe Master") { // if no name is define in url it shows default name
    return 'Your Id ' . $id . " and Name is " . $name;
})->where('id', '[0-9]+');  // Regex for to use only integer in url no text
Route::get('/world', 'HelloController@hello');
// adding prefix to the routes
// Route::group(['prefix' => 'back', ' middleware' => 'auth'], function () {
//     Route::get('/', 'Admin\DashboardController@index');
// });

// DB Connectivity and Model
Route::get('/query', 'DbController@index');
Route::get('/joining', 'DbController@joining');
Route::get('/model', 'DbController@model');


Route::get('/home', 'HomePageController@index')->name('home');
