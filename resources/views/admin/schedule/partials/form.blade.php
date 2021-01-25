<div class="row mt-5">
  <div class="col-md-6">
    <label for="star">Hora de Apertura</label>
    {!! Form::time('start', null, ['class'=>'form-control','required','id'=>'start']) !!}
  </div>


  <div class="col-md-6">
    <label for="star">Hora de Cierre</label>
    {!! Form::time('end', null, ['class'=>'form-control','required','id'=>'end', 'min'=>'01:00:00', "max"=>"24:00:00"]) !!}
  </div>

  <div class="col-md-12 text-center mt-5">
      <button type="submit" class="btn btn-success">cambiar</button>
  </div>
</div>
