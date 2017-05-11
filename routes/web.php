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
use App\User;

Route::get('/', function(){
	return redirect('/auth/login');
});
Route::group(['prefix'=> 'auth'], function(){
	Route::get('/login', [
		'as'=> 'login',
		'uses'=> 'AuthController@login'
	]);
	Route::post('/login', [
		'as'=> 'login_parse',
		'uses'=> 'AuthController@login_parse'
	]);

});

Route::group(['prefix'=> 'staff'], function(){
	Route::get('/main', [
		'as'=> 'staff_main',
		'uses'=> 'StaffController@main'
	]);
	Route::get('/import', [
		'as'=> 'staff_import',
		'uses'=> 'StaffController@import'
	]);
	Route::get('/archives', [
		'as'=> 'staff_archives',
		'uses'=> 'StaffController@archives'
	]);
	Route::get('/archives/year-{year}/semester-{semester}/code-{subject}', [
		'as'=> 'staff_gradesheet',
		'uses'=> 'StaffController@gradesheet'
	]);
	Route::post('/import', [
		'as'=> 'staff_import_parse',
		'uses'=> 'StaffController@upload'
	]);
	Route::get('/logout', [
		'as'=> 'logout',
		'uses'=> 'StaffController@logout'
	]);

});

Route::group(['prefix'=> 'guest'], function(){
	Route::get('/main', [
		'as'=> 'guest_main',
		'uses'=> 'GuestController@main'
	]);
	Route::post('/search', [
		'as'=> 'search',
		'uses'=> 'GuestController@search'
	]);
});

Route::group(['prefix'=> 'admin'], function(){
	Route::get('/main', [
		'as'=> 'admin_main',
		'uses'=> 'AdminController@main'
	]);
	Route::get('/logout', [
		'as'=> 'admin_logout',
		'uses'=> 'AdminController@logout'
	]);
});



Route::get('/adduser', function(){
	$user = new User;
	$user->lastname = 'kwek';
	$user->firstname = 'kwak';
	$user->email = 'admin123@yahoo.com';
	$user->password = bcrypt('admin123');
	$user->role_id = 1;
	$user->status_id = 1;
	$user->save();
});