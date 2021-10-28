<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('companies')->group(function () {

    Route::get('','CompanyController@index')->name('company.index');
    Route::get('search', 'CompanyController@search')->name('company.search');
    Route::get('create', 'CompanyController@create')->name('company.create');
    Route::post('store', 'CompanyController@store')->name('company.store');
    // Route::get('edit/{book}', 'BookController@edit')->name('book.edit');
    // Route::post('update/{book}', 'BookController@update')->name('book.update');
    // Route::post('delete/{book}', 'BookController@destroy' )->name('book.destroy');
    // Route::get('show/{book}', 'BookController@show')->name('book.show');

});

Route::prefix('types')->group(function () {

    Route::get('','TypeController@index')->name('type.index');
    // Route::get('create', 'TypeController@create')->name('type.create');
    // Route::post('store', 'AuthorController@store')->name('author.store');
    // Route::get('edit/{author}', 'AuthorController@edit')->name('author.edit');
    // Route::post('update/{author}', 'AuthorController@update')->name('author.update');
    // Route::post('delete/{author}', 'AuthorController@destroy' )->name('author.destroy');
    // Route::get('show/{author}', 'AuthorController@show')->name('author.show');

});

Route::prefix('clients')->group(function () {

    Route::get('','ClientController@index')->name('client.index');
    Route::get('/pdf', 'ClientController@generatePDF')->name('client.pdf');
    Route::get('pdfClient/{client}', 'ClientController@generateClientPDF')->name('client.pdfclient');

    // Route::get('create', 'TypeController@create')->name('type.create');
    // Route::post('store', 'AuthorController@store')->name('author.store');
    // Route::get('edit/{author}', 'AuthorController@edit')->name('author.edit');
    // Route::post('update/{author}', 'AuthorController@update')->name('author.update');
    // Route::post('delete/{author}', 'AuthorController@destroy' )->name('author.destroy');
    Route::get('show/{client}', 'ClientController@show')->name('client.show');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
