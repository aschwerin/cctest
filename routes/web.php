<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    $ipAddress = '';

    // Check for X-Forwarded-For headers and use those if found
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && ('' !== trim($_SERVER['HTTP_X_FORWARDED_FOR']))) {
        $ipAddress = trim($_SERVER['HTTP_X_FORWARDED_FOR']);
    } else {
        if (isset($_SERVER['REMOTE_ADDR']) && ('' !== trim($_SERVER['REMOTE_ADDR']))) {
            $ipAddress = trim($_SERVER['REMOTE_ADDR']);
        }
    }
    $browser = $_SERVER['HTTP_USER_AGENT'];
//    $browser_array = get_browser(null, true);
    $host = gethostbyaddr($ipAddress);
    $timestamp = date('Y-m-d H:i:s');
    return view('welcome',
        [
            'ip_address' => $ipAddress,
            'browser' => $browser,
//            'browser_array' => $browser_array,
            'host' => $host,
            'timestamp' => $timestamp
        ]
    );
});

Auth::routes();

Route::get('/registered', 'HomeController@registered');
Route::get('/blog', 'PostController@index');

Route::group(['middleware' => 'role:admin|dm|player'], function () {
    Route::get('/character', 'CharacterController@index');
    Route::get('/character/add', 'CharacterController@add');
    Route::post('/character/create', 'CharacterController@create');
    Route::get('characters/name_gen', 'CharacterController@getName');
    Route::get('characters/char_gen', 'CharacterGenController@getCharacter');
    Route::get('characters/stats_gen', 'CharacterGenController@getStats');
    Route::get('/character/{character}/edit', 'CharacterController@edit');
    Route::patch('/character/{character}/update', 'CharacterController@update');
    Route::delete('/character/{character}', 'CharacterController@destroy');
    Route::get('/blog/{post}/view', 'PostController@view');
    Route::get('/blog/{post}/comment/add', 'CommentController@add');
    Route::post('/blog/{post}/comment/store', 'CommentController@store');
    Route::get('/blog/comment/my_comments', 'CommentController@my_comments');
    Route::delete('/blog/comment/{comment}', 'CommentController@destroy');
    Route::get('/blog/comment/{comment}/edit', 'CommentController@edit');
    Route::patch('/blog/comment/{comment}/update', 'CommentController@update');
    Route::group(['middleware' => 'role:admin|dm'], function () {
        Route::get('/character/all', 'CharacterController@getAll' );
        Route::get('/character/{character}/view', 'CharacterController@view');
        Route::get('/monster', 'MonsterController@index');
        Route::get('/monster/add', 'MonsterController@add');
        Route::post('/monster/create', 'MonsterController@create');
        Route::get('monsters/name_gen', 'MonsterController@getMonsterName');
        Route::get('monsters/mon_gen', 'MonsterController@getMonster');
        Route::get('monsters/stats_gen', 'MonsterController@getStats');
        Route::get('/monster/{monster}/edit', 'MonsterController@edit');
        Route::patch('/monster/{monster}/update', 'MonsterController@update');
        Route::delete('/monster/{monster}', 'MonsterController@destroy');
        Route::get('/blog/add', 'PostController@add');
        Route::post('/blog/store', 'PostController@store');
        Route::get('/blog/{post}/edit', 'PostController@edit');
        Route::patch('/blog/{post}/update', 'PostController@update');
        Route::get('/blog/my_posts', 'PostController@my_posts');
        Route::delete('/blog/{post}', 'PostController@destroy');
        Route::get('/blog/{post}/comments', 'CommentController@post_comments');
        Route::patch('/blog/comment/{comment}/approve', 'CommentController@approve_comment');
        Route::patch('/blog/comment/{comment}/deny', 'CommentController@deny_comment');
    });
});


Route::group(['middleware' => 'active'], function () {
    Route::get('/home', 'HomeController@index');
});


Route::group(['prefix' => 'admin','namespace' => 'Admin', 'middleware' => 'role:admin'], function () {
    Route::get('/users', 'UserController@index');
    Route::post('/users/store', 'UserController@store');
    Route::get('/users/{user}/edit', 'UserController@edit');
    Route::patch('/users/{user}/update', 'UserController@update');
});
