<?php

#### page control
//Route::get('page/item/{id?}', 'PageController@show');
//Route::post('page/item', 'PageController@store');
//Route::post('page/item/{id}', 'PageController@update');
//Route::get('page/{id}/delete', 'PageController@destroy');
#### page comment
//Route::post('page/add/comment/{id}', 'PageCommentController@addComment');
//Route::post('page/update/comment/{id}', 'PageCommentController@updateComment');
//Route::get('page/delete/comment/{id}', 'PageCommentController@deleteComment');

#### categorie control
//Route::get('categorie', 'CategorieController@index');
//Route::get('categorie/item/{id?}', 'CategorieController@show');
//Route::post('categorie/item', 'CategorieController@store');
//Route::post('categorie/item/{id}', 'CategorieController@update');
//Route::get('categorie/{id}/delete', 'CategorieController@destroy');
//Route::get('categorie/{id}/view', 'CategorieController@getById');

#### formation control
// Route::get('formation' , 'FormationController@index');
// Route::get('formation/item/{id?}' , 'FormationController@show');
// Route::post('formation/item' , 'FormationController@store');
// Route::post('formation/item/{id}' , 'FormationController@update');
// Route::get('formation/{id}/delete' , 'FormationController@destroy');
// Route::get('formation/{id}/view' , 'FormationController@getById');

#### inscription control
// Route::get('inscription' , 'InscriptionController@index');
// Route::get('inscription/item/{id?}' , 'InscriptionController@show');
// Route::post('inscription/item' , 'InscriptionController@store');
// Route::post('inscription/item/{id}' , 'InscriptionController@update');
// Route::get('inscription/{id}/delete' , 'InscriptionController@destroy');
// Route::get('inscription/{id}/view' , 'InscriptionController@getById');

#### produits control
Route::get('produits' , 'ProduitsController@index');
Route::get('produits/item/{id?}' , 'ProduitsController@show');
Route::post('produits/item' , 'ProduitsController@store');
Route::post('produits/item/{id}' , 'ProduitsController@update');
Route::get('produits/{id}/delete' , 'ProduitsController@destroy');
Route::get('produits/{id}/view' , 'ProduitsController@getById');

#### produits control
Route::get('produits' , 'ProduitsController@index');
Route::get('produits/item/{id?}' , 'ProduitsController@show');
Route::post('produits/item' , 'ProduitsController@store');
Route::post('produits/item/{id}' , 'ProduitsController@update');
Route::get('produits/{id}/delete' , 'ProduitsController@destroy');
Route::get('produits/{id}/view' , 'ProduitsController@getById');

#### trajet control
Route::get('trajet' , 'TrajetController@index');
Route::get('trajet/item/{id?}' , 'TrajetController@show');
Route::post('trajet/item' , 'TrajetController@store');
Route::post('trajet/item/{id}' , 'TrajetController@update');
Route::get('trajet/{id}/delete' , 'TrajetController@destroy');
Route::get('trajet/{id}/view' , 'TrajetController@getById');

#### zoneactivite control
Route::get('zoneactivite' , 'ZoneactiviteController@index');
Route::get('zoneactivite/item/{id?}' , 'ZoneactiviteController@show');
Route::post('zoneactivite/item' , 'ZoneactiviteController@store');
Route::post('zoneactivite/item/{id}' , 'ZoneactiviteController@update');
Route::get('zoneactivite/{id}/delete' , 'ZoneactiviteController@destroy');
Route::get('zoneactivite/{id}/view' , 'ZoneactiviteController@getById');

#### bureauposte control
Route::get('bureauposte' , 'BureauposteController@index');
Route::get('bureauposte/item/{id?}' , 'BureauposteController@show');
Route::post('bureauposte/item' , 'BureauposteController@store');
Route::post('bureauposte/item/{id}' , 'BureauposteController@update');
Route::get('bureauposte/{id}/delete' , 'BureauposteController@destroy');
Route::get('bureauposte/{id}/view' , 'BureauposteController@getById');

#### trajetlivreur control
Route::get('trajetlivreur' , 'TrajetlivreurController@index');
Route::get('trajetlivreur/item/{id?}' , 'TrajetlivreurController@show');
Route::post('trajetlivreur/item' , 'TrajetlivreurController@store');
Route::post('trajetlivreur/item/{id}' , 'TrajetlivreurController@update');
Route::get('trajetlivreur/{id}/delete' , 'TrajetlivreurController@destroy');
Route::get('trajetlivreur/{id}/view' , 'TrajetlivreurController@getById');

#### localisationlivreur control
Route::get('localisationlivreur' , 'LocalisationlivreurController@index');
Route::get('localisationlivreur/item/{id?}' , 'LocalisationlivreurController@show');
Route::post('localisationlivreur/item' , 'LocalisationlivreurController@store');
Route::post('localisationlivreur/item/{id}' , 'LocalisationlivreurController@update');
Route::get('localisationlivreur/{id}/delete' , 'LocalisationlivreurController@destroy');
Route::get('localisationlivreur/{id}/view' , 'LocalisationlivreurController@getById');

#### commandeproduit control
Route::get('commandeproduit' , 'CommandeproduitController@index');
Route::get('commandeproduit/item/{id?}' , 'CommandeproduitController@show');
Route::post('commandeproduit/item' , 'CommandeproduitController@store');
Route::post('commandeproduit/item/{id}' , 'CommandeproduitController@update');
Route::get('commandeproduit/{id}/delete' , 'CommandeproduitController@destroy');
Route::get('commandeproduit/{id}/view' , 'CommandeproduitController@getById');