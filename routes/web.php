<?php

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

/*
 * Routes for Lists
 * */
Route::group([], function () {

    Route::get("lists", "ListsController@showListsView");   // Shows List View
    Route::get("lists/all", "ListsController@getAllLists"); // Gets All Lists Data
    Route::post("list", "ListsController@createNewList");   // Create a new List

});