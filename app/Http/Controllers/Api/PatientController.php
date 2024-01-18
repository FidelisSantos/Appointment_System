<?php

namespace App\Http\Controllers\Api;

use App\DTOS\PatientDTO;
use App\Http\Controllers\Controller;
use App\Services\PatientService;
use App\Validations\Rules\PatientRequestRules;
use App\Validations\ValidationRequest;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    private $patientService;
    private $rules;

    public function __construct(PatientService $patientService, PatientRequestRules $rules) {
        $this->patientService = $patientService;
        $this->rules = $rules;
    }

    public function create(Request $request)
    {
        try {
            ValidationRequest::validateRequest($request, $this->rules->create);
            $this->patientService->create(new PatientDTO($request));
            return response()->json([], 200);
        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 500);
        }
    }
}
