<?php

namespace App\DTOS;

use DateTime;
use Illuminate\Http\Request;

class MedicalAppointmentDTO
{
    public int $patient_id;
    public int $doctor_id;
    public DateTime $medical_appointment_date;

    public function __construct(Request $request)
    {
        $this->patient_id = $request->input('patient_id');
        $this->doctor_id = $request->input('doctor_id');
        $this->medical_appointment_date = new DateTime($request->input('medical_appointment_date'));
    }
}
