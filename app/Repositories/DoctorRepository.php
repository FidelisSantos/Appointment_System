<?php

namespace App\Repositories;

use App\DTOS\DoctorDTO;
use App\Models\Doctor;

/**
 * Class DoctorRepository.
 */
class DoctorRepository
{
    public function create(DoctorDTO $doctor): void
    {
        Doctor::create([
            'name' => $doctor->name,
            'email' => $doctor->email,
            'password' => $doctor->password,
            'crm'=> $doctor->crm,
            'specialty_id' => $doctor->specialty_id
        ]);
    }

    public function existsCrm(string $crm)
    {
        return Doctor::where('crm', $crm)->exists();
    }

    public function existsEmail(string $email)
    {
        return Doctor::where('email', $email)->exists();
    }

    public function exists(int $id)
    {
        return Doctor::exists($id);
    }
}
