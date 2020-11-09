@extends('layouts.boostrapAdmin')
@section('content')
<div class="row justify-content-center h-100 ">
    <div class="col-sm-8 align-self-center ">
        <h1 class="mt-2">Demos del evento "{{$EventoDemo->NombreEvento}}"</h1>

        <div class="card bg-dark text-black mt-10">
        <img src="{{ asset('storage/'.$EventoDemo->Imagen) }}" class="card-img"  >
            <div class="card-img-overlay">
              <h5 class="card-title"><strong>{{$EventoDemo->NombreEvento}}</strong></h5>
              <p class="card-text">{{$EventoDemo->Descripcion}}</p>
              <p class="card-text"><strong>{{$EventoDemo->Fecha}}</strong></p>
            </div>
          </div> <br>

          <div class="card mb-3 mt-10" style="max-width: 540px;" >
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="{{ asset('storage/'.$EventoDemo->Imagen) }}"  class="card-img" alt="540px" width="540px">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><strong>{{$EventoDemo->NombreEvento}}</strong></h5>
                  <p class="card-text">{{$EventoDemo->Descripcion}}</p>
                  <p class="card-text"><small class="text-muted"><strong>{{$EventoDemo->Fecha}}</strong></small></p>
                </div>
              </div>
            </div>
          </div><br>


          <div class="card text-center" style="width: 18rem;">
            <img  src="{{ asset('storage/'.$EventoDemo->Imagen) }}"  class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><strong>{{$EventoDemo->NombreEvento}}</strong></h5>
              <p class="card-text">{{$EventoDemo->Descripcion}}</p>
              <p class="card-text"><small class="text-muted"><strong>{{$EventoDemo->Fecha}}</strong></small></p>
              <div class="card-footer">
                <button type="button" class="btn btn-success btn-lg btn-block">Ver evento</button>
              </div>
            </div>
          </div>


    </div>

</div>
@endsection
