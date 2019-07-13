<?php
Route::get('/', 'HomeController@index');
Route::get('icons', 'HomeController@icons');
Route::get('docs', 'HomeController@apiDocs');
Route::get('file-manager', 'HomeController@fileManager');
Route::get('theme/open-file', 'Themes\ThemeController@openFile');
Route::get('theme/{theme}', 'Themes\ThemeController@adminPanel');
Route::post('theme/save-file', 'Themes\ThemeController@save');

### commands
Route::get('commands', 'CommandsController@index');
Route::post('command/exe', 'CommandsController@exe');
Route::get('laravel/commands', 'CommandsController@command');
Route::post('command/otherExe', 'CommandsController@otherExe');
Route::post('laravel/haveCommand', 'CommandsController@haveCommand');
Route::get('exportImport', 'CommandsController@exportEmportModels');
Route::post('export', 'CommandsController@export');
Route::post('import', 'CommandsController@import');


### relations
Route::get('relation', 'RelationController@index');
Route::post('relation/exe', 'RelationController@exe');
Route::get('getCols/{model}', 'RelationController@getCols');
Route::post('relation/rollback', 'RelationController@rollback');

#### user control
Route::get('user', 'UserController@index');
Route::get('user/item/{id?}', 'UserController@show');
Route::post('user/item', 'UserController@store');
Route::post('user/item/{id}', 'UserController@update');
Route::post('user/profile/{id}', 'ProfileController@profile');
Route::get('user/profile/{id}', 'ProfileController@profile');
Route::get('user/{id}/delete', 'UserController@destroy');
Route::get('user/{id}/view', 'UserController@getById');
Route::get('user/pluck', 'UserController@pluck');

#### translation
Route::get('translation', 'TranslationController@index');
Route::get('translation/readFile/{file}', 'TranslationController@readFile');
Route::post('translation/save', 'TranslationController@save');
Route::get('translation/getAllContent/{file}', 'TranslationController@getAllContent');
Route::post('translation/both/save', 'TranslationController@bothSave');

#### permissions
Route::get('custom-permissions', 'Development\CustomPermissionsController@index');
Route::get('custom-permissions/readFile/{file}', 'Development\CustomPermissionsController@readFile');
Route::post('custom-permissions/save', 'Development\CustomPermissionsController@save');
Route::get('getControllerByType/{type}', 'Development\PermissionController@getControllerByType');
Route::get('getMethodByController/{controller}/{type}', 'Development\PermissionController@getMethodByController');

#### group control
Route::get('group', 'GroupController@index');
Route::get('group/item/{id?}', 'GroupController@show');
Route::post('group/item', 'GroupController@store');
Route::post('group/item/{id}', 'GroupController@update');
Route::get('group/{id}/delete', 'GroupController@destroy');
Route::get('group/{id}/view', 'GroupController@getById');
Route::get('group/pluck', 'GroupController@pluck');

#### role control
Route::get('role', 'RoleController@index');
Route::get('role/item/{id?}', 'RoleController@show');
Route::post('role/item', 'RoleController@store');
Route::post('role/item/{id}', 'RoleController@update');
Route::get('role/{id}/delete', 'RoleController@destroy');
Route::get('role/{id}/view', 'RoleController@getById');
Route::get('role/pluck', 'RoleController@pluck');
#### permission control
Route::get('permission', 'Development\PermissionController@index');
Route::get('permission/item/{id?}', 'Development\PermissionController@show');
Route::post('permission/item', 'Development\PermissionController@store');
Route::post('permission/item/{id}', 'Development\PermissionController@update');
Route::get('permission/{id}/delete', 'Development\PermissionController@destroy');
Route::get('permission/{id}/view', 'Development\PermissionController@getById');
Route::get('permission/pluck', 'PermissionController@pluck');
#### home control
Route::get('home/{pages?}/{limit?}', 'HomeController@index');
#### setting control
Route::get('setting', 'SettingController@index');
Route::get('setting/item/{id?}', 'SettingController@show');
Route::post('setting/item', 'SettingController@store');
Route::post('setting/item/{id}', 'SettingController@update');
Route::get('setting/{id}/delete', 'SettingController@destroy');
Route::get('setting/{id}/view', 'SettingController@getById');
Route::get('setting/pluck', 'SettingController@pluck');
#### menu control
Route::get('menu', 'MenuController@index'); 
Route::get('menu/item/{id?}', 'MenuController@show');
Route::post('menu/item', 'MenuController@store');
Route::post('menu/item/{id}', 'MenuController@update');
Route::get('menu/{id}/delete', 'MenuController@destroy');
Route::get('menu/{id}/view', 'MenuController@getById');
Route::post('update/menuItem', 'MenuController@menuItem');
Route::post('addNewItemToMenu', 'MenuController@addNewItemToMenu');
Route::get('deleteMenuItem/{id}', 'MenuController@deleteMenuItem');
Route::get('getItemInfo/{id}', 'MenuController@getItemInfo');
Route::post('updateOneMenuItem', 'MenuController@updateOneMenuItem');
Route::get('menu/pluck', 'MenuController@pluck');
#### log control
Route::get('log', 'LogController@index');
Route::get('log/item/{id?}', 'LogController@show');
Route::post('log/item', 'LogController@store');
Route::post('log/item/{id}', 'LogController@update');
Route::get('log/{id}/delete', 'LogController@destroy');
Route::get('log/{id}/view', 'LogController@getById');
Route::get('log/pluck', 'LogController@pluck');
#### contact control
Route::get('contact', 'ContactController@index');
Route::get('contact/item/{id?}', 'ContactController@show');
Route::post('contact/item', 'ContactController@store');
Route::post('contact/item/{id}', 'ContactController@update');
Route::get('contact/{id}/delete', 'ContactController@destroy');
Route::get('contact/{id}/view', 'ContactController@getById');
Route::post('contact/replay/{id}', 'ContactController@replayEmail');
Route::get('contact/pluck', 'ContactController@pluck');

#### page control
Route::get('page', 'PageController@index');
Route::get('page/item/{id?}', 'PageController@show');
Route::post('page/item', 'PageController@store');
Route::post('page/item/{id}', 'PageController@update');
Route::get('page/{id}/delete', 'PageController@destroy');
Route::get('page/{id}/view', 'PageController@getById');
Route::get('page/pluck', 'PageController@pluck');
Route::get('page/image/{id}' , 'PageController@filedestroy');
#### page comment
Route::post('page/add/comment/{id}', 'PageCommentController@addComment');
Route::post('page/update/comment/{id}', 'PageCommentController@updateComment');
Route::get('page/delete/comment/{id}', 'PageCommentController@deleteComment');

#### categorie control
Route::get('categorie', 'CategorieController@index');
Route::get('categorie/item/{id?}', 'CategorieController@show');
Route::post('categorie/item', 'CategorieController@store');
Route::post('categorie/item/{id}', 'CategorieController@update');
Route::get('categorie/{id}/delete', 'CategorieController@destroy');
Route::get('categorie/{id}/view', 'CategorieController@getById');
Route::get('categorie/pluck', 'CategorieController@pluck');

#### medias control
Route::get('medias' , 'MediasController@index');
Route::get('medias/item/{id?}' , 'MediasController@show');
Route::post('medias/item' , 'MediasController@store');
Route::post('medias/item/{id}' , 'MediasController@update');
Route::get('medias/{id}/delete' , 'MediasController@destroy');
Route::get('medias/{id}/view' , 'MediasController@getById');
Route::get('medias/pluck', 'MediasController@pluck');
Route::get('medias/file/{id}' , 'MediasController@filedestroy');

#### produits control
Route::get('produits' , 'ProduitsController@index');
Route::get('produits/item/{id?}' , 'ProduitsController@show');
Route::post('produits/item' , 'ProduitsController@store');
Route::post('produits/item/{id}' , 'ProduitsController@update');
Route::get('produits/{id}/delete' , 'ProduitsController@destroy');
Route::get('produits/{id}/view' , 'ProduitsController@getById');
Route::get('produits/pluck', 'ProduitsController@pluck');
#### trajet control
Route::get('trajet' , 'TrajetController@index');
Route::get('trajet/item/{id?}' , 'TrajetController@show');
Route::post('trajet/item' , 'TrajetController@store');
Route::post('trajet/item/{id}' , 'TrajetController@update');
Route::get('trajet/{id}/delete' , 'TrajetController@destroy');
Route::get('trajet/{id}/view' , 'TrajetController@getById');
Route::get('trajet/pluck', 'TrajetController@pluck');
#### zoneactivite control
Route::get('zoneactivite' , 'ZoneActiviteController@index');
Route::get('zoneactivite/item/{id?}' , 'ZoneActiviteController@show');
Route::post('zoneactivite/item' , 'ZoneActiviteController@store');
Route::post('zoneactivite/item/{id}' , 'ZoneActiviteController@update');
Route::get('zoneactivite/{id}/delete' , 'ZoneActiviteController@destroy');
Route::get('zoneactivite/{id}/view' , 'ZoneActiviteController@getById');
Route::get('zoneactivite/pluck', 'ZoneActiviteController@pluck');
#### bureauposte control
Route::get('bureauposte' , 'BureauPosteController@index');
Route::get('bureauposte/item/{id?}' , 'BureauPosteController@show');
Route::post('bureauposte/item' , 'BureauPosteController@store');
Route::post('bureauposte/item/{id}' , 'BureauPosteController@update');
Route::get('bureauposte/{id}/delete' , 'BureauPosteController@destroy');
Route::get('bureauposte/{id}/view' , 'BureauPosteController@getById');
Route::get('bureauposte/pluck', 'BureauPosteController@pluck');
#### trajetlivreur control
Route::get('trajetlivreur' , 'TrajetLivreurController@index');
Route::get('trajetlivreur/item/{id?}' , 'TrajetLivreurController@show');
Route::post('trajetlivreur/item' , 'TrajetLivreurController@store');
Route::post('trajetlivreur/item/{id}' , 'TrajetLivreurController@update');
Route::get('trajetlivreur/{id}/delete' , 'TrajetLivreurController@destroy');
Route::get('trajetlivreur/{id}/view' , 'TrajetLivreurController@getById');
Route::get('trajetlivreur/pluck', 'TrajetLivreurController@pluck');
#### localisationlivreur control
Route::get('localisationlivreur' , 'LocalisationlivreurController@index');
Route::get('localisationlivreur/item/{id?}' , 'LocalisationlivreurController@show');
Route::post('localisationlivreur/item' , 'LocalisationlivreurController@store');
Route::post('localisationlivreur/item/{id}' , 'LocalisationlivreurController@update');
Route::get('localisationlivreur/{id}/delete' , 'LocalisationlivreurController@destroy');
Route::get('localisationlivreur/{id}/view' , 'LocalisationlivreurController@getById');
Route::get('localisationlivreur/pluck', 'LocalisationlivreurController@pluck');
#### commandeproduit control
Route::get('commandeproduit' , 'CommandeproduitController@index');
Route::get('commandeproduit/item/{id?}' , 'CommandeproduitController@show');
Route::post('commandeproduit/item' , 'CommandeproduitController@store');
Route::post('commandeproduit/item/{id}' , 'CommandeproduitController@update');
Route::get('commandeproduit/{id}/delete' , 'CommandeproduitController@destroy');
Route::get('commandeproduit/{id}/view' , 'CommandeproduitController@getById');
Route::get('commandeproduit/pluck', 'CommandeproduitController@pluck');

#### colis control
Route::get('colis' , 'ColisController@index');
Route::get('colis/item/{id?}' , 'ColisController@show');
Route::post('colis/item' , 'ColisController@store');
Route::post('colis/item/{id}' , 'ColisController@update');
Route::get('colis/{id}/delete' , 'ColisController@destroy');
Route::get('colis/{id}/view' , 'ColisController@getById');
Route::get('colis/pluck', 'ColisController@pluck');

Route::get('mescolis' , 'HomeController@clientColis');