<?php

namespace App\Repositories;

use App\Contracts\OrganizationRepositoryInterface;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Collection;

class OrganizationRepository implements OrganizationRepositoryInterface
{
    public function getAll(): Collection
    {
        return Organization::all();
    }

    public function getById(int $id)
    {
        return Organization::find($id);
    }

    public function getByBuilding(int $buildingId)
    {
        return Organization::where('building_id', $buildingId)->get();
    }

    public function getByActivity(int $activityId)
    {
        return Organization::whereHas('activities', function ($query) use ($activityId) {
            $query->where('id', $activityId);
        })->get();
    }

    public function searchByName(string $query)
    {
        return Organization::where('name', 'LIKE', "%$query%")->get();
    }

    public function getByRadius(float $latitude, float $longitude, float $radius)
    {
        return Organization::whereHas('building', function ($query) use ($latitude, $longitude, $radius) {
            $query->whereRaw(
                "(ST_Distance_Sphere(point(longitude, latitude), point(?, ?)) / 1000) <= ?",
                [$longitude, $latitude, $radius]
            );
        })->get();
    }
}