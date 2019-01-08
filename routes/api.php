<?php

Route::group(['middleware' => 'api'], function () {
    Route::get('store', 'Store\StoreController@index');
    Route::get('get-states', 'Api\DataController@getStates');

    // parttime endpoint
    Route::post('save_pt_record', 'Api\PartTimeController@save');


    // store cart details
    Route::post('record-transaction', 'Store\StoreController@record');




});