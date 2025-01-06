<?php

namespace App\Services;

use App\Contracts\ActivityRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ActivityService
{
    private ActivityRepositoryInterface $activityRepository;

    public function __construct(ActivityRepositoryInterface $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    public function getAllActivities(): Collection
    {
        return $this->activityRepository->getAll();
    }

    public function getActivityTree(): Collection|array
    {
        return $this->activityRepository->getTree();
    }
}