<?php

Route::group(['middleware' => 'api'], function () {
    Route::get('store', 'Store\StoreController@index');
    Route::get('get-states', 'Api\DataController@getStates');
    /**
     * Funaab Registrations
     */

    // parttime endpoint
    Route::post('save_pt_record', 'Api\PartTimeController@save');

    //postgradute endpoint
    Route::post('save_pg_record', 'Api\PostGraduateController@save');

    //save predegree record
    Route::post('save_pd_record', 'Api\PreDegreeController@save');

    /**
     * Payments stuffs
     */
    Route::get('verify/{ref}', 'Api\VerifyController@verifyTransaction');

    // update refcode status
    Route::get('ref-update/{transaction}', 'Api\VerifyController@updateRefCode');

    Route::get('verify-payment/{transaction}/{ref}', 'Api\VerifyPayment@verify');

    // store cart details
    Route::post('record-transaction', 'Store\StoreController@record');



    /**
     * Registration Parts
     */
    Route::get('get-students', 'Api\RegController@getAllReg');
    Route::get('student-detail/{student}', 'Api\RegController@getStudent');

    /**
     * Solar Registration
     */
    Route::post('solar-register', 'Api\SolarController@save');

    /**
     * Properties
     */
    Route::post('create-property', 'Property\PropertyController@create');

    /**
     * Agent Routes
     */
    Route::get('{user}/statistics', 'Dashboard\DashboardController@agentStatistics');
    Route::post('/create', 'Dashboard\DashboardController@create');

    /**
     * Cashier Routes
     */
    Route::get('{user}/paid-records', 'Dashboard\DashboardController@cashierStatistics');

    //search
    Route::get('/q={query}', 'Dashboard\DashboardController@searchRecords');

    //Approve pay
    Route::post('approve/user/{user}/record/{record}', 'Dashboard\DashboardController@approve');

    // Admin Stats
    Route::get('admin-stats/{user}', 'Dashboard\AdminController@adminStats');
    Route::get('admin-stats/{user}/yesterday', 'Dashboard\AdminController@yesterday');
    Route::get('admin-stats/{user}/week', 'Dashboard\AdminController@week');
    Route::get('admin-stats/{user}/thirtyDays', 'Dashboard\AdminController@thirtyDays');
});