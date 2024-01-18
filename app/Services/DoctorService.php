<?php

namespace App\Services;

use App\DTOS\DoctorDTO;
use App\Repositories\DoctorRepository;
use App\Repositories\SpecialtyRepository;
use Exception;
/**
 * Class DoctorService.
 */
class DoctorService
{
    private $repository;
    private $scpecialtyRepository;

    public function __construct(DoctorRepository $repository, SpecialtyRepository $scpecialtyRepository) {
       $this->repository = $repository;
       $this->scpecialtyRepository = $scpecialtyRepository;
    }

    public function create(DoctorDTO $doctorDTO)
    {
        if (!$this->scpecialtyRepository->exists($doctorDTO->specialty_id)) {
            throw new Exception('Specialty dont exist');
        }
        else if ($this->repository->existsCrm($doctorDTO->crm)) {
            throw new Exception('Crm already exists');
        }
        else if ($this->repository->existsEmail($doctorDTO->crm)) {
            throw new Exception('Email already exists');
        }

        $this->repository->create($doctorDTO);
    }
}
