
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
Route::get('/manage_projects', function () {
    return view('projects.manage');
});

Route::any('/projects/index','RoleController@list')->name('projects/manage');
Route::group(['prefix'=>'admin','middleware'=>['auth','is_admin']], function (){
//    For Admin Dashboard
    Route::any('/dashboard','UserController@index')->name('admin/dashboard');

    //Admin User CRUD
    Route::any('/manage_users','UserController@index')->name('manage_users');
    Route::any('/create_user','UserController@create')->name('create_user');
    Route::any('/user/store','UserController@store')->name('user/store');
    Route::any('/edit_user','UserController@edit')->name('edit_user');
    Route::any('/user/{uuid}/update','UserController@update')->name('user/update');
    Route::any('/delete_user','UserController@delete')->name('delete_user');

    //For Roles
    Route::any('/manage_roles','RoleController@index')->name('manage_roles');
    Route::any('/create_role','RoleController@create')->name('create_role');
    Route::any('/role/store','RoleController@store')->name('role/store');
    Route::any('/edit_role','RoleController@edit')->name('edit_role');
    Route::any('/role/{id}/update','RoleController@update')->name('role/update');
    Route::any('/delete_role','RoleController@delete')->name('delete_role');

    //    For Permissions
    Route::any('/manage_permissions','PermissionController@index')->name('manage_permission');
    Route::any('/create_permission','PermissionController@create')->name('create_permission');
    Route::any('/permission/store','PermissionController@store')->name('permission/store');
    Route::any('/edit_permission','PermissionController@edit')->name('edit_permission');
    Route::any('/permission/{id}/update','PermissionController@update')->name('permission/update');
    Route::any('/delete_permission','PermissionController@delete')->name('delete_permission');

});
