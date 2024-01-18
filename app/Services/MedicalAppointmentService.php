<?php

namespace App\Services;

use App\DTOS\MedicalAppointmentDTO;
use App\Repositories\MedicalAppointmentRepository;
use App\Validations\MedicalAppointmentValidation ;
use Exception;
/**
 * Class MedicalAppointmentService.
 */
class MedicalAppointmentService
{
    private $repository;
    private $validation;

    public function __construct(MedicalAppointmentRepository $repository, MedicalAppointmentValidation $validation) {
        $this->repository = $repository;
        $this->validation = $validation;
    }

    public function create(MedicalAppointmentDTO $medicalAppointmentDTO)
    {
        $this->validation->create($medicalAppointmentDTO);
        $this->repository->create($medicalAppointmentDTO);
    }
}
