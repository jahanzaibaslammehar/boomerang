<?php

use App\Http\Controllers\admin\GroupLocationController;
use App\Http\Controllers\admin\LenderController;
use App\Http\Controllers\admin\LenderFundingRequirementController;
use App\Http\Controllers\admin\LenderPayoffDeliveryMethodController;
use App\Http\Controllers\admin\LenderPayoffRequirementController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\api\admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::prefix('lender')->group(function () {
        Route::controller(LenderController::class)->group(function () {
            // Route::get('/', 'index');
            Route::post('/', 'create');
            // Route::get('/{lender}', 'show');
            // Route::put('/{lender}', 'update');
            // Route::delete('/{lender}', 'destroy');
        });

        Route::prefix('fundingRequirements')->group(function () {
            Route::controller(LenderFundingRequirementController::class)->group(function () {
                Route::get('/', 'index');
            });
        });

        Route::prefix('payoffDeliveryMethods')->group(function () {
            Route::controller(LenderPayoffDeliveryMethodController::class)->group(function () {
                Route::get('/', 'index');
            });
        });

        Route::prefix('payoffRequirements')->group(function () {
            Route::controller(LenderPayoffRequirementController::class)->group(function () {
                Route::get('/', 'index');
            });
        });

    });

    Route::prefix('location')->group(function () {
        Route::prefix('group')->group(function () {
                Route::controller(GroupLocationController::class)->group(function () {
                    Route::get('/', 'index');
                    Route::post('/', 'store');
            });
        });

        Route::controller(LocationController::class)->group(function () {
            Route::post('/', 'store');
        });
    });
});
