<?php

namespace App\Services;

use App\Contracts\OrganizationRepositoryInterface;
use App\Models\Organization;
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

    public function getOrganizationById(int $id): ?Organization
    {
        return $this->organizationRepository->getById($id);
    }

    public function getOrganizationsByBuilding(int $buildingId): Collection
    {
        return $this->organizationRepository->getByBuilding($buildingId);
    }

    public function getOrganizationsByActivity(int $activityId): Collection
    {
        return $this->organizationRepository->getByActivity($activityId);
    }

    public function searchOrganizations(string $query): Collection
    {
        return $this->organizationRepository->searchByName($query);
    }

    public function getOrganizationsByRadius(float $latitude, float $longitude, float $radius): Collection
    {
        return $this->organizationRepository->getByRadius($latitude, $longitude, $radius);
    }
}
