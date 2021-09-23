<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Bank CRUD routes
 */
Route::group(['prefix' => 'bank', 'middleware' => 'cors'], function () {

        Route::get('/', [BankController::class, 'index'])
            ->name('bank.index');
        Route::get('{id}', [BankController::class, 'show'])
            ->name('bank.show');
        Route::post('store', [BankController::class, 'store'])
            ->name('bank.store');
        Route::post('{id}/update', [BankController::class, 'update'])
            ->name('bank.update');
        Route::post('{id}/delete', [BankController::class, 'destroy'])
            ->name('bank.destroy');
});