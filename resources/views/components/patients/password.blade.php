<div class="form-row register-form-row3 row">
    <div class="form-group col-md-10">
        {!! Form::label('patient-password', 'Senha') !!}
        {!! Form::password('patient-password',['class'=>'form-control ', 'id' => 'patient-password']) !!}
    </div>
    <div class="form-group col-md-10">
        {!! Form::label('patient-confirm-password', 'Confirmar Senha') !!}
        {!! Form::password('patient-confirm-password',['id' => 'patient-confirm-password', 'class'=>'form-control ']) !!}
    </div>
</div>
