<?php
//Route::get('/test', 'TestController@index');

Route::get('/', function () {
    return view('pages.home');
})->name('site.home');


Route::get('/contact', function () {
    return view('pages.contact');
})->name('site.contact');

Route::get('/solar-training', function () {
    return view('pages.solar');
})->name('site.solar');


Route::get('/about', function () {
    return view('pages.about');
})->name('site.about');


//Route::get('/post-utme', function () {
//    return view('pages.jamb');
//})->name('site.post-jamb');
// Route::get('/post-utme', function () {
//     return view('pages.jamb');
// })->name('site.post-jamb');


Route::get('services', 'Service\ServiceController@home')->name('site.services');
Route::get('service-details/{service}', 'Service\ServiceController@details')->name('service.details');


Route::get('/store', function () {
    return view('pages.store');
})->name('site.store');

 Route::get('/programs', function () {
     return view('pages.reg');
 })->name('site.fun-reg');

Route::get('/register', function () {
    return view('pages.register');
})->name('site.register');

Route::get('properties', 'Property\PropertyController@home')->name('properties');
Route::get('property-details/{property}', 'Property\PropertyController@details')->name('property.details');

Route::post('/register', 'AuthController@register')->name('site.register');

Route::post('/solar/register', 'SolarController@save')->name('solar.register');

Route::post('/login', 'AuthController@login')->name('site.login');

Route::get('/logout', 'AuthController@logout')->name('site.logout');



/**
 * Dashboard Section
 */
Route::group(['prefix' => 'dashboard'], function () {
    
 Route::get('/', function () {
    return view('admin.home');
})->name('dashboard')->middleware('role:ADMIN,AGENT,CASHIER');


Route::group(['middleware' => 'role:ADMIN'], function () {

    Route::get('all-products', 'Store\AddController@index')->name('store.index');

    Route::get('add-product', function () {
        return view('admin.add-product');
    })->name('store.add');

    Route::post('add/product', 'Store\AddController@store')->name('store.add');

    Route::get('/registrations', 'Api\RegController@index')->name('get-regs');

    Route::get('training', 'SolarController@index')->name('solar.index');

    Route::view('all-properties', 'admin.all-properties')->name('all-properties');

    Route::get('add-user', 'Dashboard\AdminController@users')->name('add.user');
    Route::get('edit-user/{user}', 'Dashboard\AdminController@editUser')->name('edit-user');
    Route::post('edit-user/{user}', 'Dashboard\AdminController@update')->name('edit-user');

    Route::view('/files', 'admin.pages.file')->name('all-files');
    Route::view('/file/add', 'admin.pages.add-file')->name('add-file');

});


// sales agent route
Route::view('/transaction', 'admin.pages.transact')->name('agent.transact')->middleware('role:admin,agent');
});

