@extends('layouts.boostrapAdmin')
@section('content')
<div class="row justify-content-center h-100 ">
    <div class="col-sm-8 align-self-center text-center">
        <div class="modal-body">
            @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }} <br>
            <a href="{{route('index')}}" class="btn btn-primary">Volver</a>
            </div>
        @endif
        @if (session('mensajeErr'))
        <div class="alert alert-danger">
            {{ session('mensajeErr') }}
        </div>
    @endif
            <form action="{{ route('Evento.ActualizarF',$EventoActualizar->id) }}"  accept-charset="UTF-8" enctype="multipart/form-data" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="NombreEventos">Nombre Del evento</label>
                <input type="text" value="{{$EventoActualizar->NombreEvento}}" class="form-control" name="NombreEvento" placeholder="Ingrese el nombre del evento a crear"  required>

                </div>
                <div class="form-group">
                <label for="Fecha"> Fecha del Evento  </label>
                <input type="date" name="Fecha" value="{{$EventoActualizar->Fecha}}" min="2018-01-01" >
                </div>
                <div class="form-group">
                    <label for="Descripcion" >Descripcion</label>

                    <textarea class="form-control"  placeholder="Ingrese la descripcion del evento" name="Descripcion" rows="3"  >{{$EventoActualizar->Descripcion}} </textarea>
                </div>
                <div class="form-group">
                    <label for="Imagen">Ingrese la imagen del evento</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                        <input type="file"  name="Imagen" required value="{{$EventoActualizar->Imagen}}">

                        </div>
                </div>

                <div class="form-group">
                    <label for="Restaurante">Seleccione el Restaurante</label>
                    <select class="custom-select mr-sm-2" name="idRestaurante" required >
                        <option  selected  value="1">Restaurante sopa fria</option>
                        <option value="2">Restaurante leyo</option>
                        <option value="3">Papa jaime</option>
                      </select>
                </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
