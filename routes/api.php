<?php

Route::group(['middleware' => 'api'], function () {
    Route::get('store', 'Store\StoreController@index');


    // store cart details
    Route::post('record-transaction', 'Store\StoreController@record');

});