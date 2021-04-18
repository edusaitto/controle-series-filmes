<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/series', 'SeriesController@index')
    ->name('list_all');

Route::get('/series/create', 'SeriesController@create')
    ->name('form_create_serie');

Route::post('/series/create', 'SeriesController@store');

Route::delete('/series/remove/{id}', 'SeriesController@destroy');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');

