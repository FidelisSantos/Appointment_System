<?

namespace App\Validations\Rules;

class DoctorRequestRules
{
    public $create = array(
        "name"=>"required",
        "email"=>"required",
        "password"=>"required",
        "crm"=>"required",
        "specialty_id"=>"required"
    );
}
