<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <label for="first_name">Primer Nombre *</label>
            {!! Form::text('first_name', null, ['class'=>'form-control','required','id'=>'first_name']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="second_name">Segundo Nombre</label>
            {!! Form::text('second_name', null, ['class'=>'form-control','id'=>'second_name']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="first_surname">Primer Apellido *</label>
            {!! Form::text('first_surname', null, ['class'=>'form-control','required','id'=>'first_surname']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="second_surname">Segundo Apellido</label>
            {!! Form::text('second_surname', null, ['class'=>'form-control','id'=>'second_surname']) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="enrollment">Matricula *</label>
            {!! Form::number('enrollment', null, ['class'=>'form-control','required','id'=>'enrollment']) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="phone">Teléfono *</label>
            {!! Form::number('phone', null, ['class'=>'form-control','required','id'=>'phone']) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="cash_receipt_id">Caja *</label>
            {!! Form::select('cash_receipt_id', $cashReceipts, null, ['class'=>'form-control','id'=>'cash_receipt_id']) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="email">Correo *</label>
            {!! Form::email('email', null, ['class'=>'form-control','required','id'=>'email']) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="password">Password{{ \Request::route()->getName()=='cajeros.edit'?'':' *' }}</label>
            {!! Form::password('password', ['class'=>'form-control',\Request::route()->getName()=='cajeros.edit'?'':'required','id'=>'password']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <button type="submit" class="btn btn-success">agregar</button>
        <a href="{{ route('cajeros.index') }}" class="btn btn-danger">cancelar</a>
    </div>
</div>