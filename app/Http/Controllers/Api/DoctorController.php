<?php

namespace App\Http\Controllers\Api;

use App\DTOS\DoctorDTO;
use App\Http\Controllers\Controller;
use App\Services\DoctorService;

use App\Validations\Rules\DoctorRequestRules;
use App\Validations\ValidationRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class DoctorController extends Controller
{
    private $services;
    private $rules;

    public function __construct(DoctorService $services, DoctorRequestRules $rules) {
        $this->services = $services;
        $this->rules = $rules;
    }

    public function create(Request $request)
    {
        try {
            ValidationRequest::validateRequest($request, $this->rules->create);
            $this->services->create(new DoctorDTO($request));
            return response()->json([], 200);
        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 500);
        }
    }
}
