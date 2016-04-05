<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['domain' => '{account}.localhost:8000'], function () {
    Route::get('user/{id}', function ($account, $id) {
        return $id;
    });
});


Route::group([ 'prefix' => 'admin', 'before' => 'admin'], function(){
	Route::get('dashboard', 'PagesController@index');
	Route::get('students', 'PagesController@students');

	Route::get('classes', 'ClassController@index');
	Route::get('new-section','SectionController@create');
	Route::get('new-class', 'ClassController@create');
	Route::get('edit-class/{id}', 'ClassController@edit');
	Route::get('edit-section/{id}', 'SectionController@edit');
	Route::post('edit-section/{id}', 'SectionController@update');
	Route::post('new-class', 'ClassController@store');
	Route::post('new-section','SectionController@store');
	Route::patch('edit-class/{id}', 'ClassController@update');



	Route::get('teachers', 'TeacherController@index');
	Route::get('new-teacher', 'TeacherController@create');
	Route::get('edit-teacher/{id}', 'TeacherController@edit');
	Route::post('edit-teacher/{id}', 'TeacherController@update');
	Route::post('new-teacher', 'TeacherController@store');

	Route::get('students','StudentController@index');
	Route::get('new-student','StudentController@create');
	Route::get('edit-student/{id}','StudentController@edit');
	Route::post('edit-student/{id}','StudentController@update');
	Route::post('new-student','StudentController@store');


	Route::get('parents','ParentController@index');


	Route::get('sessterm','SessionTermController@index');
	Route::get('new-session','SessionTermController@createSession');
	Route::post('new-session','SessionTermController@storeSession');

	//ajax routes
	Route::get('classsection','ClassController@sectionClass');
	Route::get('divisionclass','ClassController@divisionClass');

});

