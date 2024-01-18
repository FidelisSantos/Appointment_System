<?php

namespace App\Repositories;

use App\Models\Specialty;

/**
 * Class SpecialtyRepository.
 */
class SpecialtyRepository
{
    public function create(string $name)
    {
        Specialty::create([
            'name' => $name,
        ]);
    }

    public function existsName(string $name)
    {
        return Specialty::where('name',$name)->exists();
    }

    public function exists(int $id)
    {
        return Specialty::exists($id);
    }
}
