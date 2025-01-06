<?php

namespace App\Services;

use App\Contracts\OrganizationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class OrganizationService
{
    private OrganizationRepositoryInterface $organizationRepository;

    public function __construct(OrganizationRepositoryInterface $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    public function getAllOrganizations(): Collection
    {
        return $this->organizationRepository->getAll();
    }

    public function getOrganizationById(int $id)
    {
        return $this->organizationRepository->getById($id);
    }

    public function getOrganizationsByBuilding(int $buildingId)
    {
        return $this->organizationRepository->getByBuilding($buildingId);
    }

    public function getOrganizationsByActivity(int $activityId)
    {
        return $this->organizationRepository->getByActivity($activityId);
    }

    public function searchOrganizations(string $query)
    {
        return $this->organizationRepository->searchByName($query);
    }

    public function getOrganizationsByRadius(float $latitude, float $longitude, float $radius)
    {
        return $this->organizationRepository->getByRadius($latitude, $longitude, $radius);
    }
}
