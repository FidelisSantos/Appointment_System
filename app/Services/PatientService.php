<?php

namespace App\Services;

use App\DTOS\PatientDTO;
use App\Repositories\PatientRepository;
use Illuminate\Auth\Events\Failed;

/**
 * Class PatientService.
 */
class PatientService
{
    private $repository;

    public function __construct(PatientRepository $repository) {
        $this->repository = $repository;
    }

    public function create(PatientDTO $patientDTO)
    {
        $this->repository->create($patientDTO);
    }
}
