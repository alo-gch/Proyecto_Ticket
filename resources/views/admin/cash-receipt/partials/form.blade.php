<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="name">Caja *</label>
            {!! Form::text('name', null, ['class'=>'form-control','required','id'=>'name']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <button type="submit" class="btn btn-success">agregar</button>
        <a href="{{ route('cajas.index') }}" class="btn btn-danger">cancelar</a>
    </div>
</div>