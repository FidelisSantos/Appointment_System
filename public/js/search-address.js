async function searchCep(cep) {
    activateLoad();
    await $.ajax({
        type: 'GET',
        url: `https://viacep.com.br/ws/${cep}/json/`,
        datatype: "json",
        success: function (result) {
            if (result.erro || !result.uf || !result.localidade) return alert('Cep Inválido');
            else if(!result.logradouro && !result.bairro) alert('Cep único para a cidade. Por favor preencher os dados do bairro e logradouro');
            else if(!result.logradouro) alert('Cep único para o bairro. Por favor preencher os dados do logradouro');
            addAddressInputValues(result);
        },
        error: function () {
            alert('Não foi Possível Encontrar o Cep');
        }
    });
    deactivateLoad();
}

function addAddressInputValues(result){
    const validate = {
        city: () => {
            if (result.localidade) {
                $('#city').val(result.localidade);
            }
        },
        address: () => {
            if (result.logradouro ){
                $('#address').val(result.logradouro);
            } else {
                $('#address').removeAttr('disabled');
            }
        },
        district: () => {
            if (result.bairro) {
                $('#district').val(result.bairro);
            } else {
                $('#district').removeAttr('disabled');
            }
        },
        state: () => {
            if (result.uf) {
                $('#state').val(result.uf);
                return true;
            }
        }
    }
    Object.values(validate).forEach((callback) => {
        callback();
    })
}
