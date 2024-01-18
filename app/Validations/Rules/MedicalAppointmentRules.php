<?

namespace App\Validations\Rules;

class MedicalAppointmentRules
{
    public $create = array(
        "patient_id"=>"required",
        "doctor_id"=>"required",
        "medical_appointment_date"=>"required",
    );
}
