<div class="card" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-title">Numero: {{ $ticket->id }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Tipo: {{ $ticket->type->name }}</h6>
        <div class="form-group">
            <label for="solution">Solución</label>
            {!! Form::textarea('solution', null, ['class'=>'form-control','id'=>'solution','rows'=>3,'required']) !!}
        </div>
        <button type="submit" class="btn btn-success">Cerrar</button>
    </div>
</div>