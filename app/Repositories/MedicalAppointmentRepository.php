<?php

namespace App\Repositories;

use App\DTOS\MedicalAppointmentDTO;
use App\Models\MedicalAppointment;
use DateTime;

class MedicalAppointmentRepository
{
    public function create(MedicalAppointmentDTO $medicalAppointment)
    {
        MedicalAppointment::create([
            'doctor_id' => $medicalAppointment->doctor_id,
            'patient_id' => $medicalAppointment->patient_id,
            'medical_appointment_date' => $medicalAppointment->medical_appointment_date
        ]);
    }

    public function doctorIsAvailable(MedicalAppointmentDTO $medicalAppointment, $id = null)
    {
        $query = MedicalAppointment::whereBetween(
                'medical_appointment_date',
                [$medicalAppointment->medical_appointment_date->format('Y-m-d H:i:s'),
                $medicalAppointment->medical_appointment_date->modify('+1')->format('Y-m-d H:i:s')]);
        if ($id) {
            $query->where('id', '!=', $id);
        }
        return $query->exists();
    }
}
