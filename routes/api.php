<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {       
    Route::group(['prefix' => 'user', 'namespace' => 'Api\User'], function(){
		Route::post('register', 'UserController@register')->name('user-register');
    	Route::post('login', 'UserController@login')->name('user-login');
    	Route::post('logout', 'UserController@logout')->name('user-logout');
	});

	Route::group(['prefix' => 'instructor', 'namespace' => 'Api\Instructor'], function(){
		Route::resource('course', 'CourseController');
    	Route::resource('instructor', 'InstructorController');
    	Route::resource('multiple-choice', 'MultipleChoiceController');
    	Route::resource('project', 'ProjectController');
    	Route::resource('quiz', 'QuizController');
    	Route::resource('material', 'TopicMaterialController');
    	Route::resource('topic', 'TopicController');
	});
});

