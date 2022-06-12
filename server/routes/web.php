<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\CommentController;

// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: *');
// header('Access-Control-Allow-Headers: *');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('reset', [
    'uses' => 'ResetController@index'
]);

$router->get('get-random-question', [
    'uses' => 'QuestionController@randomQuestion'
]);

$router->get('get-question/{id}', [
    'uses' => 'QuestionController@getQuestion'
]);

$router->post('save-comment', [
    'uses' => 'CommentController@saveComment'
]);