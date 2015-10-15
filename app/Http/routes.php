<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Blog Pages
Route::get('/', function () {
    return redirect('/blog');
});

get('blog','BlogController@index');
get('blog/{slug}','BlogController@showPost');
$router->get('contact','ContactController@showForm');
Route::post('contact','ContactController@sendContactInfo');


// Admin area
get('admin',function(){
    return redirect(('/admin/post'));
});
$router->group([
    'namespace' => 'Admin',
    'middleware' => 'auth',
],function(){
    resource('admin/post','PostController',['except'=>'show']);
    resource('admin/tag','TagController',['except'=>'show']);
    get('admin/upload','UploadController@index');
    post('admin/upload/file','UploadController@uploadFile');
    delete('admin/upload/file','UploadController@deleteFile');
    post('admin/upload/folder','UploadController@createFolder');
    delete('admin/upload/folder','UploadController@deleteFolder');
    get('admin/jointjs','JointJSController@index');
    get('admin/googlemaps','GoogleMapsController@index');
    get('admin/trello','TrelloController@index');
    get('admin/trello/board/{boardId}','TrelloController@getBoard');
    get('admin/mail','MailController@index');
    get('admin/rt','RTController@index');
});


// Logging In and Out
get('/auth/login','Auth\AuthController@getLogin');
post('/auth/login','Auth\AuthController@postLogin');
get('/auth/logout','Auth\AuthController@getLogout');

// Trello - Logging In and Out
get('auth/trello','Auth\AuthController@redirectToProvider');
get('auth/trello/callback','Auth\AuthController@handleProviderCallback');