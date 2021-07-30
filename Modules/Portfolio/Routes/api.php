<?php

use Illuminate\Http\Request;
use Modules\Portfolio\Http\Controllers\PortfolioController;

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
Route::get('/v1/portfolio', [PortfolioController::class, 'getPortfolio']);
Route::get('/v1/userInfo', [PortfolioController::class, 'getAccountInfo']);
Route::get('/v1/symbol/search', [PortfolioController::class, 'SearchSymbol']);
Route::get('/v1/symbol/info/{code}', [PortfolioController::class, 'SymbolInfo']);
Route::get('/v1/portfolio/order/history', [PortfolioController::class, 'getOrderHistory']);

Route::get('/v1/order/buy', [PortfolioController::class, 'buyOrder']);
Route::get('/v1/order/sell', [PortfolioController::class, 'sellOrder']);
/*
Route::middleware('/v1/portfolio')->group(function () {
    Route::get('/userInfo', [PortfolioController::class, 'getAccountInfo']);

});
*/
