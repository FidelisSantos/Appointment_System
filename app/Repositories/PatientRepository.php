<?php

namespace App\Repositories;

use App\DTOS\PatientDTO;
use App\Models\Patient;
//use Your Model

/**
 * Class PatientRepository.
 */
class PatientRepository
{
    public function create(PatientDTO $patient): void
    {
        Patient::create([
            'cpf' => $patient->cpf,
            'phones' => $patient->phones,
            'address' => $patient->address,
            'birth_date' => $patient->birth,
            'responsible' => $patient->responsible,
            'name' => $patient->name,
            'email' => $patient->email,
            'password' => $patient->password
        ]);
    }

    public function exists(int $id)
    {
        return Patient::exists($id);
    }
}
