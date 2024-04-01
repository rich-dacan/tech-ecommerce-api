<?php

use App\Http\Routes;

Routes::get('/users', 'HomeController@index');
Routes::get('/user/{:id}', 'HomeController@store');

Routes::post('/users', 'HomeController@create');

Routes::put('/users', 'HomeController@update');

Routes::delete('/users', 'HomeController@delete');