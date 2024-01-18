<?

namespace App\Validations\Rules;

class PatientRequestRules
{
    public $create = array(
        "name"=>"required",
        "email"=>"required",
        "cpf"=>"required",
        "birth"=>"required",
        "phones"=>"required",
        "address"=>"required",
        "password"=>"required",
        "address-number"=>"required",
        "cep"=>"required",
        'state' =>"required",
        "district"=>"required",
    );
}
