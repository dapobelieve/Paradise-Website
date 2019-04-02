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
    Route::post('save-pg-record', 'Api\PostGraduateController@save');

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


});