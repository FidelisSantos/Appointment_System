<?php

namespace App\DTOS;

use DateTime;
use Illuminate\Http\Request;

class PatientDTO
{
    public string $name;
    public string $email;
    public string $password;
    public string $address;
    public string $phones;
    public string $cpf;
    public DateTime $birth;
    public string $responsible;

    public function __construct(Request $request)
    {
        $this->name = $request->input('name');
        $this->email = $request->input('email');
        $this->password = $request->input('password');
        $this->address = json_encode($this->mountAddress($request));
        $this->phones = json_encode($this->mountPhonesArray($request->input('phones')));
        $this->cpf = $request->input('cpf');
        $this->birth = new DateTime($request->input('birth'));
        $this->responsible = json_encode($this->mountResponsible($request));
    }

    private function mountAddress(Request $request)
    {
        $address= [
            'cep'=>$request->input('cep'),
            'city'=>$request->input('city'),
            'address'=>$request->input('address'),
            'district'=>$request->input('district'),
            'state'=>$request->input('state'),
            'address-number'=>$request->input('address-number'),
            'complement'=>$request->input('complement'),
        ];
        return $address;
    }

    private function mountResponsible(Request $request)
    {
        $responsible = [
            'name' => $request->input('responsible-name'),
            'cpf' => $request->input('cpf')
        ];

        return $responsible;
    }

    private function mountPhonesArray($phones)
    {
        return is_array($phones) ? $phones :explode(',', $phones);
    }
}
