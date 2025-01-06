<?php

use Illuminate\Support\Facades\Route;

Route::prefix('organizations')->group(function () {
    Route::get('/', [OrganizationController::class, 'index']); // Все организации
    Route::get('/{id}', [OrganizationController::class, 'show']); // Организация по ID
    Route::get('/building/{buildingId}', [OrganizationController::class, 'byBuilding']); // Организации в здании
    Route::get('/activity/{activityId}', [OrganizationController::class, 'byActivity']); // Организации по деятельности
    Route::get('/search', [OrganizationController::class, 'search']); // Поиск организаций
    Route::get('/radius', [OrganizationController::class, 'byRadius']); // Организации в радиусе
});

Route::prefix('buildings')->group(function () {
    Route::get('/', [BuildingController::class, 'index']); // Все здания
});

Route::prefix('activities')->group(function () {
    Route::get('/', [ActivityController::class, 'index']); // Все виды деятельности
    Route::get('/tree', [ActivityController::class, 'tree']); // Дерево деятельностей
});
