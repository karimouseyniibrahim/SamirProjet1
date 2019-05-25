<?php

Route::get('/', '/LoginController@index');
Route::get('contact' , 'ContactController@index');
Route::post('contact' , 'ContactController@storeContact');


#### news control
Route::get('news' , 'NewsController@index');
#Route::get('news/{id}/view' , 'NewsController@getById');
Route::get('news/{slug}' , 'NewsController@getBySlug');

Auth::routes();

#Route::get('page' , 'PageController@index');
#Route::get('page/{id}/view' , 'PageController@getById');
Route::get('page/{slug}' , 'PageController@getBySlug');


