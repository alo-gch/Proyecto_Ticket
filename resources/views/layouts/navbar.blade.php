<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if (auth()->user()->role_id==1)
                @include('partials.nav-admin')
            @else
                @include('partials.nav-checker')
            @endif
        </ul>
        {!! Form::open(['route'=>'logout','method'=>'post','class'=>'form-inline my-2 my-lg-0']) !!}
            <button class="btn btn-danger my-2 my-sm-0" type="submit">Loogut</button>
        {!! Form::close() !!}
    </div>
</nav>