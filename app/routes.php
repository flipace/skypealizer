<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('uses' => 'HomeController@home', 'as' => 'home'));

Route::get('/db/{db}', array('uses' => 'DatabaseController@view', 'as' => 'db.view'));
Route::post('/db/upload', array('uses' => 'DatabaseController@upload', 'as' => 'db.upload'));
Route::delete('/db/delete/{db}', array('uses' => 'DatabaseController@delete', 'as' => 'db.delete'));


Route::get('/db/{db}/{table}', array('uses' => 'DatabaseController@table', 'as' => 'db.table'));
Route::get('/db/{db}/{conversation}/messages', array('uses' => 'ConversationController@messages', 'as' => 'db.conversation.messages'));
Route::get('/db/{db}/{conversation}/words', array('uses' => 'ConversationController@words', 'as' => 'db.conversation.words'));