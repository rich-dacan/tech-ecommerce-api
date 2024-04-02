<?php

use App\Http\Routes;

Routes::get('/', 'HomeController@index');

// Users
Routes::get('/users/fetch', 'UserController@fetch');
Routes::post('/users/create', 'UserController@create');
Routes::post('/users/login', 'UserController@login');
Routes::delete('/users/{id}/delete', 'UserController@delete');
