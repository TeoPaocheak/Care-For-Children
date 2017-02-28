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

use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {
//    Route::auth();

    Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
    Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@loginWithCondition']);
    // Route::get('/#/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);
    Route::get('/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

    Route::get('/lang/{locale}', ['as' => 'language', function ($locale) {
        Session::set('locale', $locale);
        return redirect()->back();
    }]);

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/', 'HomeController@index');
        Route::resource('users', 'UserController');

        // Route::get('/', ['as' => 'dashboard', function () {
        //     return view('content.dashboard');
        // }]);
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
    Route::get('get-district-by-pro-code/{p_code}', 'UserController@getDistrict');

    Route::get('inspect/inspect-chart', 'InspectController@index');
    Route::get('inspect/get-chart-result', 'InspectController@getChartResult');

    Route::get('inspect/inspect-table', 'InspectController@inspectTable');
    Route::get('inspect/get-table-result', 'InspectController@getTableResult');
    Route::get('inspect/get-district-result', 'InspectController@getDistrictLevelResult');

    Route::get('inspect/inspect-children', 'InspectController@inspectChildren');
    Route::get('inspect/get-children-result', 'InspectController@getChildrenResult');

    Route::get('inspect/get-inspection-name','InspectController@changeInspectionName');

    // Route::get('/graph', function () {
    //     return view('content.inspection.inspection-charts');
    // });
});

Route::group(['prefix' => 'api', 'middleware' => 'auth.basic'], function () {
    /**
     * Use for API Access Only
     */
    require (__DIR__ . '/api.php');
});
