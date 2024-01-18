<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SpecialtyService;
use App\Validations\Rules\SpecialtyRequestRules;
use App\Validations\ValidationRequest;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    private $services;
    private $rules;

    public function __construct(SpecialtyService $services, SpecialtyRequestRules $rules) {
        $this->services = $services;
        $this->rules = $rules;
    }

    public function create(Request $request)
    {
        try {
            ValidationRequest::validateRequest($request, $this->rules->create);
            $this->services->create($request->input('name'));
            return response()->json([], 200);
        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 500);
        }
    }
}
