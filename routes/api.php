<?php

use App\Http\Controllers\CurrencyController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'currency'], function () {
    Route::post('/', CurrencyController::class.'@create')->name("currency.create");
    Route::patch('/{id}', CurrencyController::class.'@update')->name("currency.update");
    Route::delete('/{id}', CurrencyController::class.'@delete')->name("currency.delete");
});
