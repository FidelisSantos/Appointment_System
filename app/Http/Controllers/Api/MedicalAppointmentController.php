<?php

namespace App\Http\Controllers\Api;

use App\DTOS\MedicalAppointmentDTO;
use App\Http\Controllers\Controller;
use App\Services\MedicalAppointmentService;
use App\Validations\Rules\MedicalAppointmentRules;
use App\Validations\ValidationRequest;
use Illuminate\Http\Request;

class MedicalAppointmentController extends Controller
{
    private $services;
    private $rules;

    public function __construct(MedicalAppointmentService $services, MedicalAppointmentRules $rules) {
        $this->services = $services;
        $this->rules = $rules;
    }

    public function create(Request $request)
    {
        try {
            ValidationRequest::validateRequest($request, $this->rules->create);
            $this->services->create(new MedicalAppointmentDTO($request));
            return response()->json([], 200);
        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 500);
        }
    }
}
