<?
namespace App\Validations;

use App\DTOS\MedicalAppointmentDTO;
use App\Repositories\DoctorRepository;
use App\Repositories\MedicalAppointmentRepository;
use App\Repositories\PatientRepository;
use DateTime;
use Exception;

class MedicalAppointmentValidation
{
    private $repository;
    private $patientRepository;
    private $doctorRepository;

    public function __construct(MedicalAppointmentRepository $repository, PatientRepository $patientRepository, DoctorRepository $doctorRepository) {
        $this->repository = $repository;
        $this->doctorRepository = $doctorRepository;
        $this->patientRepository = $patientRepository;
    }

    public function create(MedicalAppointmentDTO $dto)
    {
        $this->doctorExists($dto->doctor_id);
        $this->patientExists($dto->patient_id);
        $this->valideHours($dto->medical_appointment_date);
        $this->doctorIsAvailable($dto);
    }

    private function doctorExists(int $doctor_id)
    {
        if (!$this->doctorRepository->exists($doctor_id)) {
            throw new Exception('Doctor dont exist');
        }
    }

    private function patientExists(int $patient_id)
    {
        if (!$this->patientRepository->exists($patient_id)) {
            throw new Exception('Patient dont exist');
        }
    }

    private function valideHours(DateTime $date)
    {
        $open = new DateTime('05:00:00');
        $close = new DateTime('18:00:00');
        if ($date->format('H:i') < $open->format('H:i') || $date->format('H:i') > $close->format('H:i')) {
            throw new Exception('Invalid hour');
        }
    }

    private function doctorIsAvailable(MedicalAppointmentDTO $dto, $id = null)
    {
        if ($this->repository->doctorIsAvailable($dto, $id)) {
            throw new Exception('This time doctor is not avaible hour');
        }
    }
}
