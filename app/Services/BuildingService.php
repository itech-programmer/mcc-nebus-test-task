<?php

namespace App\Services;

use App\Contracts\BuildingRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class BuildingService
{
    private BuildingRepositoryInterface $buildingRepository;

    public function __construct(BuildingRepositoryInterface $buildingRepository)
    {
        $this->buildingRepository = $buildingRepository;
    }

    public function getAllBuildings(): Collection
    {
        return $this->buildingRepository->getAll();
    }
}