
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

Route::get('/projects/index', function () {
    return view('projects.index');
});
Route::get('/projects/manage', function () {
    return view('projects.manage');
});

Route::get('admin/dashboard', function (){
   return view('admin.index');
});

//For Roles
Route::group(['prefix'=>'admin','middleware'=>['auth','is_admin']], function (){
    Route::any('/role/manage','RoleController@index')->name('role/manage');
    Route::any('/role/add','RoleController@add')->name('role/add');
    Route::any('/role/create','RoleController@create')->name('role/create');
    Route::any('/role/edit','RoleController@edit')->name('role/edit');
    Route::any('/role/{id}/update','RoleController@update')->name('role/update');
    Route::any('/role/delete','RoleController@delete')->name('role/delete');
});
