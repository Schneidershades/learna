<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {       
	
    Route::group(['prefix' => 'user', 'namespace' => 'Api\User'], function(){
		Route::post('register', 'UserController@register');
    	Route::post('login', 'UserController@login');
    	Route::post('logout', 'UserController@logout');
        Route::get('profile', 'UserController@profile');
        Route::put('update', 'UserController@update');
	});

	Route::group(['prefix' => 'instructor', 'namespace' => 'Api\Instructor'], function(){
		Route::resource('instructor-course', 'CourseController');
        Route::resource('instructor-module', 'ModuleController');
    	Route::resource('instructor-profile', 'InstructorController');
    	Route::resource('instructor-multiple-choice', 'MultipleChoiceController');
    	Route::resource('instructor-project', 'ProjectController');
    	Route::resource('instructor-quiz', 'QuizController');
    	Route::resource('instructor-material', 'TopicMaterialController');
    	Route::resource('instructor-topic', 'TopicController');
	});

    Route::group(['prefix' => 'general', 'namespace' => 'Api\General'], function(){
        Route::resource('currencies', 'CurrencyController');
        Route::resource('categories', 'CategoryController');
    });

	Route::group(['prefix' => 'participant', 'namespace' => 'Api\Participant'], function(){
		Route::resource('participant-course', 'ParticipantCourseController');
        Route::resource('participant-project', 'ParticipantProjectController');
        Route::resource('participant-question', 'ParticipantQuestionController');
        Route::resource('participant-quiz', 'ParticipantQuizController');
        Route::resource('participant-topic', 'ParticipantTopicController');
	});

});

