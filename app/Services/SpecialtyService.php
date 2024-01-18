<?php

namespace App\Services;

use App\Repositories\SpecialtyRepository;
use Exception;

/**
 * Class SpecialtyService.
 */
class SpecialtyService
{
    public $repository;

    public function __construct(SpecialtyRepository $repository) {
        $this->repository = $repository;
    }

    public function create(string $name) {
        if ($this->repository->existsName($name)) {
            throw new Exception('name already exists');
        }

        $this->repository->create($name);
    }
}
