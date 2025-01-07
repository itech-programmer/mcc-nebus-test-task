<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\OrganizationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    private OrganizationService $organizationService;

    public function __construct(OrganizationService $organizationService)
    {
        $this->organizationService = $organizationService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->organizationService->getAllOrganizations());
    }

    public function show(int $id): JsonResponse
    {
        $organization = $this->organizationService->getOrganizationById($id);

        if (!$organization) {
            return response()->json(['message' => 'Organization not found'], 404);
        }

        return response()->json($organization);
    }

    public function byBuilding($buildingId): JsonResponse
    {
        return response()->json($this->organizationService->getOrganizationsByBuilding($buildingId));
    }

    public function byActivity($activityId): JsonResponse
    {
        return response()->json($this->organizationService->getOrganizationsByActivity($activityId));
    }

    public function search(Request $request): JsonResponse
    {
        $query = $request->input('query');
        return response()->json($this->organizationService->searchOrganizations($query));
    }

    public function byRadius(Request $request): JsonResponse
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $radius = $request->input('radius');

        return response()->json(
            $this->organizationService->getOrganizationsByRadius($latitude, $longitude, $radius)
        );
    }
}