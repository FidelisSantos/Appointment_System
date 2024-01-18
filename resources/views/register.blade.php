@section('title', __('login.Register'))

@include('partials.header')

<div class="register-div">
    <form id="register-patient-form" action="POST">
        <h2>Cadastrar Paciente</h2>
        <div class="form-group col-md-6 row">
            <label for="zipcode">Pesquisar Endereço por CEP</label>
            <div class="div-zipcode-search">
                <input type="text" required ="form-control" name="cep" id="cep" placeholder="00000-000">
                <div class="div-zipcode-search-img" id="search-zipcode">
                    <x-lineawesome-search-location-solid class="div-zipcode-search-img-icon"/>
                </div>
            </div>
        </div>
        <div class="form-row register-form-row2 row">
            <div class="form-group col-md-10">
                <label for="city">Cidade</label>
                <input type="text" required class="form-control" name="city" id="city" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="state">UF</label>
                <input id="state" required name="state" class="form-control" disabled>
            </div>
        </div>
        <div class="form-row register-form-row2 row">
            <div class="form-group col-md-10">
                <label for="address">Endereço</label>
                <input type="text" required name="address" class="form-control" id="address" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="address-number">Número</label>
                <input type="text" name="address-number" id="address-number" class="form-control">
            </div>
        </div>
        <div class="form-row register-form-row3 row">
            <div class="form-group col-md-10 ">
                <label for="complement">Complemento</label>
                <input type="text" name="complement" class="form-control" id="complement">
            </div>
            <div class="form-group col-md-10 ">
                <label for="district">Bairro</label>
                <input type="text" required name="district" class="form-control" id="district" disabled>
            </div>
        </div>

        <div class="form-group col-md-11 row unique-line">
            <label for="name">Nome</label>
            <input type="text" required name="name" class="form-control" id="name" >
        </div>

        <div class="form-row register-form-row3 row">
            <div class="form-group col-md-10 grid2">
                <label for="cpf">CPF</label>
                <input type="text" required name="cpf" class="form-control" id="cpf" placeholder="000.000.000-00">
            </div>

            <div class="form-group col-md-10 row grid2">
                <label for="birth">Data de Nascimento</label>
                <input type="date" required name="birth" class="form-control" id="birth" placeholder="000.000.000-00">
            </div>
        </div>

        <div id="responsible-div" class="row" style="display: none">
            <div class="form-group col-md-11 unique-line">
                <label for="responsible-cpf">CPF do Responsável</label>
                <input type="text" name="responsible-cpf" class="form-control" id="responsible-cpf" placeholder="000.000.000-00">
            </div>

            <div class="form-group col-md-11 unique-line">
                <label for="responsible-name">Nome do Responável</label>
                <input type="text" name="responsible-name" class="form-control" id="responsible-name" >
            </div>
        </div>


        <div class="form-group col-md-11 row unique-line">
            <label for="email">Email</label>
            <input type="email" required name="email" class="form-control" id="email" placeholder="Email">
        </div>

        <div class="form-group col-md-11 row unique-line">
            <label for="phones">Telefones</label>
            <input class=" form-control " required type="text" name="phones" id="phones">
        </div>

        <div class="form-row register-form-row3 row">
            <div class="form-group col-md-10">
                <label for="phones">Senha</label>
                <input class=" form-control " required type="text" name="password" id="password">
            </div>
        </div>
        <button class='btn btn-primary' type="submit" id='register-patient'>Cadastrar</button>
    </form>

</div>
@include('partials.loading')
<script>
    $(document).ready(function() {
        $('#register-patient-form').submit(function(e) {
            e.preventDefault();
            activateLoad();
            const disabled = $(this).find(':input:disabled').removeAttr('disabled');
            $.ajax({
                type: 'POST',
                url: "{!! route('patient.api.create') !!}",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    alert('Paciente criado')
                },
                error: function(xhr, status, error) {
                    alert('Erro ao criar paciente')
                }
            });
            disabled.attr('disabled','disabled');
            deactivateLoad();
        });
    });
</script>
@include('partials.footer')

