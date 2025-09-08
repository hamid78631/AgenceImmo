<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Admin\PropertyController;
Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('property' , PropertyController::class)->except(['show']);

});