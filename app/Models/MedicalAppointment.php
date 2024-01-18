<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalAppointment extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        "patient_id",
        "doctor_id",
        "medical_appointment_date",
    ];

    public function doctor()
    {
        $this->hasOne(Doctor::class);
    }

    public function patient()
    {
        $this->hasOne(Patient::class);
    }
}
