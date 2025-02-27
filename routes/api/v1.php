<?php

use App\Http\Controllers\Api\V1\ActivityController;
use App\Http\Controllers\Api\V1\BuildingController;
use App\Http\Controllers\Api\V1\OrganizationController;
use Illuminate\Support\Facades\Route;

Route::prefix('organizations')->group(function () {
    Route::get('/', [OrganizationController::class, 'index']);
    Route::get('/building/{buildingId}', [OrganizationController::class, 'byBuilding']);
    Route::get('/activity/{activityId}', [OrganizationController::class, 'byActivity']);
    Route::get('/search', [OrganizationController::class, 'search']);
    Route::get('/radius', [OrganizationController::class, 'byRadius']);
    Route::get('/{id}', [OrganizationController::class, 'show']);
});

Route::prefix('buildings')->group(function () {
    Route::get('/', [BuildingController::class, 'index']);
});

Route::prefix('activities')->group(function () {
    Route::get('/', [ActivityController::class, 'index']);
    Route::get('/tree', [ActivityController::class, 'tree']);
});
