
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
Route::get('/dashboard', function () {
    return view('template.layouts.master');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/projects/index', function () {
    return view('projects.index');
});
Route::get('/projects/manage', function () {
    return view('projects.manage');
});


Route::group(['prefix'=>'admin','middleware'=>['auth','is_admin']], function (){
//    For Admin Dashboard
    Route::any('/dashboard','UserController@index')->name('admin/dashboard');

    //Admin User CRUD
    Route::any('/user/manage','UserController@index')->name('user/manage');
    Route::any('/user/add','UserController@add')->name('user/add');
    Route::any('/user/create','UserController@create')->name('user/create');
    Route::any('/user/edit','UserController@edit')->name('user/edit');
    Route::any('/user/{uuid}/update','UserController@update')->name('user/update');
    Route::any('/user/delete','UserController@delete')->name('user/delete');

    //For Roles
    Route::any('/role/manage','RoleController@index')->name('role/manage');
    Route::any('/role/create','RoleController@create')->name('role/create');
    Route::any('/role/store','RoleController@store')->name('role/store');
    Route::any('/role/edit','RoleController@edit')->name('role/edit');
    Route::any('/role/{id}/update','RoleController@update')->name('role/update');
    Route::any('/role/delete','RoleController@delete')->name('role/delete');

    //    For Permissions
    Route::any('/permission/manage','PermissionController@index')->name('permission/manage');
    Route::any('/permission/add','PermissionController@add')->name('permission/add');
    Route::any('/permission/create','PermissionController@create')->name('permission/create');
    Route::any('/permission/edit','PermissionController@edit')->name('permission/edit');
    Route::any('/permission/{id}/update','PermissionController@update')->name('permission/update');
    Route::any('/permission/delete','PermissionController@delete')->name('permission/delete');

});




