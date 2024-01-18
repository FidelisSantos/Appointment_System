function validateCPF(cpf) {
    var Soma;
    var Resto;
    Soma = 0;
  if (cpf == "00000000000") return false;

  for (i=1; i<=9; i++) Soma = Soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(cpf.substring(9, 10)) ) return false;

  Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(cpf.substring(10, 11) ) ) return false;
    return true;
}

function validateCEP(cep) {
  return cep != "00000000" && cep.length == 8
}


function validateRegisterPatient()
{
    const zipcode = $('#cep').val();
    const city = $('#city').val();
    const address = $('#address').val();
    const state = $('#state').val();
    const complement = $('#complement').val();
    const number = $('#address-number').val();
    const name = $('#name').val();
    const cpf = $('#cpf').val();
    const birth = $('#birth').val();
    const email = $('#email').val();
    const responsibleCpf = $('#responsible-cpf').val();
    const responsibleName = $('#responsible-name').val();
    const phones = $('#phones').val();
    const password = $('#password').val();
    const confirmPassword = $('#confirm-password').val();

    if (cpf) {
        if (!validateCPF(cpf)) {
            $('#cpf').addClass('invalid');
        } else if (cpf == responsibleCpf) {
            $('#cpf').addClass('invalid');
        } else {
            $('#cpf').addClass('valid');
        }
    }


    if (responsibleCpf) {
        if (!validateCPF(cpf)) {
            $('#cpf').addClass('invalid');
        } else if (cpf == responsibleCpf) {
            $('#cpf').addClass('invalid');
        } else {
            $('#cpf').addClass('valid');
        }
    }

}
