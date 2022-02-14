<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');



Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
});
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
Route::group(['middleware' => 'auth'], function () {
	Route::get('example/entel', ['as' => 'pages.exampleConvert.entelExample', 'uses' => 'PageController@example']);
	Route::get('viva/register/XLSX', ['as' => 'pages.excel', 'uses' => 'VivaController@excel']);
	Route::post('viva/register/XLSX', ['as' => 'pages.excel', 'uses' => 'VivaController@subirExcel']);
	Route::get('carrier', ['as' => 'pages.choiseCarrier', 'uses' => 'PageController@carrier']);
	Route::get('viva/register',['as' => 'viva.create','uses' => 'VivaController@create']);
	Route::post('viva/register/XLSX',['as' => 'viva.store','uses' => 'VivaController@store']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('entel/register/XLSX', ['as' => 'entel.excel', 'uses' => 'EntelController@excel']);
	Route::post('entel/register/XLSX/view', ['as' => 'entel.subirExcel', 'uses' => 'EntelController@subirExcel']);
	//Route::get('entel/informe/registro/{registro}', ['as' => 'entel.informe', 'uses' => 'EntelController@informe']);
	Route::get('entel/informe/registro/{registro}', ['as' => 'entel.informeCoincidencia', 'uses' => 'EntelController@informeCoincidencia']);
	Route::get('entel/informe/registro/{registro}/{filtrado}', ['as' => 'entel.informefiltrado', 'uses' => 'EntelController@informefiltrado']);
	Route::get('entel/informe/registro', ['as' => 'entel.informeRegistro', 'uses' => 'EntelController@informeRegistro']);
	//Route::get('entel/informe/registro/{registro}', ['as' => 'entel.informeRegistro', 'uses' => 'EntelController@informeRegistro ']);
	Route::get('entel/informe/registro/{registro}/{filtrado}/{fecha}', ['as' => 'entel.informeFecha', 'uses' => 'EntelController@informeFecha']);
	Route::get('entel/register/XLSX/view', ['as' => 'entel.mostrarTabla', 'uses' => 'EntelController@mostrarTabla']);
	Route::get('entel/register',['as' => 'entel.create','uses' => 'EntelController@create']);
	Route::post('entel/register/XLSX',['as' => 'entel.store','uses' => 'EntelController@store']);
	//IMPRIMIR
	Route::get('entel/informe/registros/pdf',['as' => 'entel.printTotal','uses' => 'EntelController@printTotal']);
	Route::get('entel/informe/registros/pdf/{registro}',['as' => 'entel.printPDF','uses' => 'EntelController@printPDF']);
	//GPS
	Route::get('entel/informe/registro/{registro}/{filtrado}/{fecha}/{coordenada}/{id}',['as' => 'entel.gps','uses' => 'EntelController@gps']);
	Route::post('entel/informe/GPS',['as' => 'entel.localizacion','uses' => 'EntelController@localizacion']);
	
	
});

Route::group(['middleware' => 'auth'], function () {
	
	Route::get('tigo/register/XLSX', ['as' => 'tigo.excel', 'uses' => 'TigoController@excel']);
	Route::post('tigo/register/XLSX/view', ['as' => 'tigo.subirExcel', 'uses' => 'TigoController@subirExcel']);
	Route::get('tigo/register/XLSX/view', ['as' => 'entel.mostrarTabla', 'uses' => 'TigoController@mostrarTabla']);
	Route::get('tigo/register',['as' => 'tigo.create','uses' => 'TigoController@create']);
	Route::post('tigo/register/XLSX',['as' => 'tigo.store','uses' => 'TigoController@store']);
	Route::get('tigo/informe/registro', ['as' => 'tigo.informeRegistro', 'uses' => 'TigoController@informeRegistro']);
	Route::get('tigo/informe/registro/{registro}', ['as' => 'tigo.informeCoincidencia', 'uses' => 'TigoController@informeCoincidencia']);
	Route::get('tigo/informe/registro/{registro}/{filtrado}', ['as' => 'tigo.informefiltrado', 'uses' => 'TigoController@informefiltrado']);
});


