<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface OrganizationRepositoryInterface
{
    public function getAll(): Collection;
    public function getById(int $id);
    public function getByBuilding(int $buildingId);
    public function getByActivity(int $activityId);
    public function searchByName(string $query);
    public function getByRadius(float $latitude, float $longitude, float $radius);
}