<?php


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


Route::get('/services', function () {
    return view('pages.service');
})->name('site.services');


Route::get('/store', function () {
    return view('pages.store');
})->name('site.store');

Route::get('/register', function () {
    return view('pages.register');
})->name('site.register');


Route::post('/register', 'AuthController@register')->name('site.register');

Route::post('/solar/register', 'SolarController@save')->name('solar.register');


Route::post('/login', 'AuthController@login')->name('site.login');

Route::get('/logout', 'AuthController@logout')->name('site.logout');

Route::get('/home', 'HomeController@index')->name('home');



/**
 * Dashboard Section
 */

Route::get('dashboard', function () {
    return view('admin.home');
});

Route::get('add-product', function () {
    return view('admin.add-product');
})->name('store.add');

Route::post('add/product', 'Store\AddController@store')->name('store.add');