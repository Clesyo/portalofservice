<?php

use Illuminate\Support\Facades\Route;

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

Route::get('send-mail-user','EmailController@emailUser');


Route::get('empresa', 'CompanyController@index');
Route::get('empresa/novo', 'CompanyController@create');
Route::post('empresa/store', 'CompanyController@store');
Route::get('empresa/edit/{id}', 'CompanyController@edit');
Route::patch('empresa/update/{id}', 'CompanyController@update');


Route::get('servico', 'ServiceController@index');
Route::get('servico/novo', 'ServiceController@create');
Route::get('servico/novo/{empresa}', 'ServiceController@createWithCompany');
Route::post('servico/store', 'ServiceController@store');


Route::get('endereco', 'AndressController@index');
Route::get('endereco/novo', 'AndressController@create');
Route::get('endereco/novo/{empresa}', 'AndressController@createWithCompany');
Route::post('endereco/store', 'AndressController@store');
Route::get('endereco/editar/{id}', 'AndressController@edit');
Route::patch('endereco/update/{id}', 'AndressController@update');

Route::get('categorias','CategoryController@index');
Route::post('category/store','CategoryController@store');
Route::patch('category/update','CategoryController@update');

Route::get('settings/users','UserController@index');
Route::post('settings/user/active/{id}','UserController@active');
Route::post('settings/user/assign','UserController@assignRole');

Route::get('settings/module','ModuleController@index');
Route::get('settings/module/new','ModuleController@create');
Route::post('settings/module/store','ModuleController@store');

Route::get('settings/role','RoleController@index');
Route::get('settings/role/new','RoleController@create');
Route::post('settings/role/store','RoleController@store');
Route::get('settings/role/edit/{id}','RoleController@edit');
Route::post('settings/role/update/{id}','RoleController@update');

Route::get('settings/permission','PermissionController@index');
Route::post('settings/permission/store','PermissionController@store');
