<?php

namespace App\DTOS;

use Illuminate\Http\Request;

class DoctorDTO
{
    public string $name;
    public string $email;
    public string $password;
    public string $crm;
    public int $specialty_id;

    public function __construct(Request $request)
    {
        $this->name = $request->input('name');
        $this->email = $request->input('email');
        $this->password = $request->input('password');
        $this->crm = $request->input('crm');
        $this->specialty_id = $request->input('specialty_id');
    }
}
