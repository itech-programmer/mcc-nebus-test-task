<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\BuildingService;
use Illuminate\Http\JsonResponse;

class BuildingController extends Controller
{
    private BuildingService $buildingService;

    public function __construct(BuildingService $buildingService)
    {
        $this->buildingService = $buildingService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->buildingService->getAllBuildings());
    }
}