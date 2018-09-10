<?php
Route::get('/', function () {
    return view('pages.home');
})->name('site.home');


Route::get('/contact', function () {
    return view('pages.contact');
})->name('site.contact');


Route::get('/about', function () {
    return view('pages.about');
})->name('site.about');


Route::get('/services', function () {
    return view('pages.service');
})->name('site.services');


Route::get('/store', function () {
    return view('pages.store');
})->name('site.store');