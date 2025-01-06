<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\ActivityService;
use Illuminate\Http\JsonResponse;

class ActivityController extends Controller
{
    private ActivityService $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->activityService->getAllActivities());
    }

    public function tree(): JsonResponse
    {
        return response()->json($this->activityService->getActivityTree());
    }
}