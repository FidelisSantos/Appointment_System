$(() => {
    var $form = $('#patient-register-form');

    if ($form.legnth) {
        $form.validate({
            rules: {
                cep: {
                    required: true
                },
                city: {
                    required: true
                },
                state: {
                    required: true
                },
                district: {
                    required: true
                },
                cpf: {
                    required: true
                },
                birth: {
                    required: true
                },
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                responsible_cpf: {
                    required: true
                },
                password: {
                    required: true,
                    equalTo: '#confirm_password'
                },
                confirm_password: {
                    required: true,
                    equalTo: '#password'
                }
            }
        })
    }
});
