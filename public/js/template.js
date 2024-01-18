let phones = [];

$(document).ready(() => {
    $('input[name="phones"]').amsifySuggestags({});
    $('.amsify-suggestags-input').mask('00 00000-0000', {reverse: true});
    $('#cpf').mask('000.000.000-00', {reverse: true});
    $('#zipcode').mask('00000-000', {reverse: true});
    $('#address-number').mask('00000000000', {reverse: true});
    $('#responsible-cpf').mask('000.000.000-00', {reverse: true});

    $('#birth').attr('max', new Date().getFullYear() + '-'  + new Date().getMonth() + 1 + '-' + new Date().getDate());


    $('#search-zipcode').on('click', () => {
        const cep = $('#cep').val().replace('-', '')
        if (validateCEP(cep)) searchCep(cep)
    });

    $('#birth').on('change', () => {
        const birth = $('#birth').val()
        const age = getAge(birth);
        if (age < 0) {
            console.log('sei la0')
        } else if (age < 18) {
            console.log('sei la')
            $('#responsible-div').css('display', 'block')
        } else {
            console.log('sei la1')
            $('#responsible-div').css('display', 'none')
        }
    });

    $('#register-patient-form').submit(function(e) {
        e.preventDefault();
        patientRequest.create($(this));
    });

    $('#phones').on('change', function(event) {
        var tag = event.item;
        console.log(event.item);
        if(true){ //if tag is not a url or process other text conditions.
          event.cancel = true
        }
    });

    $('#phones').on('itemAdded', function(event) {
        alert(event.item)
     });

    $('#register-patient').on('click', function(event) {

    });
});

function addPhone(phones)
{
    phones.push(phones)
}

function activateLoad() {
    $('#loading').css('display', 'flex')
}

function deactivateLoad() {
    $('#loading').css('display', 'none')
}
