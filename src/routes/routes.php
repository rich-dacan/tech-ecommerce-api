<?php

use App\Http\Routes;

Routes::get('/', 'HomeController@index');

Routes::get('/users', 'HomeController@store');
Routes::post('/users', 'HomeController@create');
Routes::put('/users', 'HomeController@update');
Routes::delete('/users', 'HomeController@delete');
