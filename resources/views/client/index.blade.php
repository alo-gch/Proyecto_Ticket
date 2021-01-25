<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FILA BANCO PATITO S.A. DE C.V</title>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/fila.css')}}">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

  <style media="screen">
  .bg-black{
    background: #000;
  }
  .color-red{
    color: #ff0000;
  }
  .font-size-6 h2{
    font-size: 3rem;
  }
  .font-size-4 h2{
    font-size: 2rem;
  }
  .flex-center{
    justify-content: center;
    align-items: center;
    display: flex;
    flex-direction: column;
  }

  .table-container{
    height: 150px;
    overflow-y: auto;
    width: 100%;

  }
  tbody tr td{
    text-align: center;
  }
</style>

<!--
<div class="container-fluid m-5">
<div class="row">
<div class="col-md-12 text-center">
<h1>Turno  <span id="turno-id" style="text-transform: uppercase;">  </span>  : Pasar a  caja <span id="caja"> </span> </h1>
</div>
</div>
</div>
-->

<div class="container">
  <div class="col-md-12 text-center">
    Anteriores
  </div>

<div class="table-container">
  <table class="table">
    <thead>
      <tr>
        <td class="text-center">Turno</td>
        <td class="text-center">Caja</td>
      </tr>
    </thead>
    <tbody id="before">
      @if(isset($befores))
      @foreach($befores as $before)
      <tr>
        <td>{{$before["turno"]}}</td>
        <td>{{$before["caja"]}}</td>
      </tr>
      @endforeach
      @endif
    </tbody>

  </table>
</div>


</div>


<div class="container-fluid mt-5 flex-center">
  <div class="row">
    <div class="p-3 bg-black color-red font-size-6 text-center">
      <h2>Turno</h2>
    </div>
  </div>

  <div class="row bg-black">
    <div class="p-3 mt-1 font-size-4 text-center color-red">
      <h2 id="turno-id"> @if(isset($data["turno"])) {{$data["turno"]}} @endif  </h2>
    </div>
  </div>




  <div class="row bg-black">
    <div class="p-3 bg-black color-red font-size-6 text-center">
      <h2>Caja</h2>
    </div>
  </div>

  <div class="row bg-black">
    <div class="p-3 font-size-4 text-center color-red">
      <h2 id="caja">@if(isset($data["caja"])) {{$data["caja"]}} @endif</h2>
    </div>
  </div>

</div>













<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script type="text/javascript">

function getFila() {

  $.get( "{{route('client.getFila')}}", function( data ) {


    if(data["turno"] != undefined || data["turno"] != "" && data["mensaje"] != "no hay fila"){
      $("#turno-id").html(data["turno"]);
      $("#caja").html(data["caja"]);

      $row =  ` <tr> <td> ${data["turno"]}  </td> <td> ${data["caja"]}</td> </tr> `;
      $("#before").prepend($row)
    }


  });

}



setInterval('getFila()',3000);


</script>

</body>
</html>
