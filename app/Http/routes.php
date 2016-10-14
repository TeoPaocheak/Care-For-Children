<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['middleware' => ['web']], function () {
    Route::auth();

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
        Route::resource('users', 'UserController');
    });

//        Route::get('/dashboard', ['as' => 'dashboard', function () {
//            return view('content.dashboard');
//        }]);

        Route::get('/lang/{locale}', function ($locale) {
            Session::set('locale', $locale);
            return redirect()->back();
        });

        Route::resource('system/table', 'TableController');
        Route::resource('system/condition', 'ConditionController');
        Route::resource('system/language', 'LanguageController');
        Route::resource('system/category', 'EntityDefinedCategoryController');
        Route::get('system/entity-field/getColumnAndCategoryName/{id}', 'EntityDefinedFieldController@getColumnAndCategoryName');
        Route::resource('system/entity-field-condition', 'EntityDefinedFieldConditionController');
        Route::resource('system/entity-field', 'EntityDefinedFieldController');
        Route::get('system/edf-import', function () {
            return view('content.system.import_field');
        });

        Route::get('system/edf-export', 'EntityDefinedFieldController@exportVariable');
        Route::post('system/edf-import/process', 'EntityDefinedFieldController@importVariable');
        Route::post('system/edf-export/process', 'EntityDefinedFieldController@exportProcess');
        Route::resource('system/entity-field-search', 'EntityDefinedSearchController');

        // change language
        // Route::get('system/language/change-language/{lang}', function($lang) {
        //     App::setLocale($lang);
        //     echo 'working';
        // });

        // monitoring
        Route::get('monitor/entity-info-field/{fieldID}', 'InformationController@showFieldListValue'); // show list value
        // Route::get('monitor/entity-info/{tableID}/{category}', 'InformationController@showFieldRelatedWithCategory');
        Route::resource('monitor/entity-info', 'InformationController');
        Route::get('monitor/entity/{tableID}/{edfCode}', 'InformationController@compareEDF');
        Route::get('PDCV/{type}/{code}', 'PDCVController@getLocation');
        Route::resource('monitor/entity-agg', 'AggregateController');

});

