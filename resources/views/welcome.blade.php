<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>BANCO PATITO S.A DE CV</title>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/card.css')}}">
</head>
<body>


  @if(Session()->has("error"))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Fuera de horario</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-12 flex">
        <img src="{{asset('images/logo.jpg')}}" alt="logotipo banco" class="img-fluid" style="max-width: 100px">
        <p> <strong>Banco patito S.A de C.V</strong> </p>
      </div>
    </div>

    <div class="container">

      @foreach($typeTickets as $typeTicket)
      <div class="card">
        <div class="face face1">
          <div class="content">
            <div class="icon text-center">
              <h3 class="mt-5">{{$typeTicket->name}}</h3>
              <a href="{{route('typeTickets.get', $typeTicket->id)}}" class="btn btn-info p-3">Generar ticket</a>
            </div>
          </div>
        </div>
      </div>
      @endForeach


    </div>

  </div>

</body>
</html>
