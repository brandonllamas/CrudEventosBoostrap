@extends('layouts.boostrapAdmin')
@section('content')
<div class="row justify-content-center h-100 ">

    <div class="col-sm-8 align-self-center text-center">
        @if ( session('mensaje') )
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif
        @error('NombreEvento')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            El nombre Del evento es requerido
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @enderror
        <h1>Lista de eventos</h1>
    <button class="btn btn-primary " data-toggle="modal" data-target="#Añadir">Añadir</button>
<table class="table table-borderless mt-2">

<thead class="thead-dark">
    <tr>
        <th scope="col">id Restaurante</th>
        <th scope="col">Nombre del evento</th>
        <th scope="col">Fecha</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>
<tbody>
    @foreach ($Eventos as $item)
    <tr>
    <td>{{$item->idRestaurante}}</td>
    <td>{{$item->NombreEvento}}</td>
    <td>{{$item->Fecha}}</td>
    <td>
        <a class="btn btn-warning"  href="{{ route('Evento.Actualizar',$item->id ) }}">Editar</a>
        <form action="{{ route('Evento.eliminar', $item->id) }}" class="d-inline" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit"
                class="btn btn-danger">Eliminar</button> <br>
        </form>
        <a class="btn btn-primary" href="{{ route('Evento.Demo',$item->id ) }}">Ver Demo</a>
    </td>
</tr>
    @endforeach
</tbody>
</table>
<!-- Ventanas -->

<div class="modal fade" id="Añadir" tabindex="-1" aria-labelledby="Añadir" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Añadir">Añadir Evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{ route('Evento.crear') }}"  accept-charset="UTF-8" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <label for="NombreEventos">Nombre Del evento</label>
                    <input type="text" class="form-control" name="NombreEvento" placeholder="Ingrese el nombre del evento a crear"  required>

                </div>
                <div class="form-group">
                <label for="Fecha"> Fecha del Evento  </label>
                <input type="date" name="Fecha" value="2018-07-22" min="2018-01-01" >
                </div>
                <div class="form-group">
                    <label for="Descripcion" >Descripcion</label>

                    <textarea class="form-control"  placeholder="Ingrese la descripcion del evento" name="Descripcion" rows="3" > </textarea>
                </div>
                <div class="form-group">
                    <label for="Imagen">Ingrese la imagen del evento</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                          <input type="file"  name="Imagen">

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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit"class="btn btn-primary ">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>


</div>
</div>


@endsection
