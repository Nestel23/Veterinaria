@extends('inicio')
@section('contenido')

<div class="row mt-3">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Editar Mascotas
            </div>
            <div class="card-body">
                <form id="frmMascotas" method="POST" action="{{url('mascotas', [$mascota])}}">
                    @method("PUT")
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-cat"></i></span>
                                <input type="text" name="nombre" value="{{$mascota->nombre}}" class="form-control" maxlength="50" placeholder="Nombre" required>                             
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-pager"></i></span>
                                <input type="text" name="edad" value="{{$mascota->edad}}" class="form-control" maxlength="3" placeholder="Edad" required>
                            </div>
    
                        </div>
                    </div>
    
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <select name="idPropietario" class="form-select" required>
                            <option value="">Propietario</option>
                            @foreach($propietarios as $row)
                            @if ($row->id == $mascota->idPropietario)
                                <option selected value="{{$row->id}}">{{$row->nombre}} {{$row->apellido}}</option>                  
                            @else
                            <option value="{{$row->id}}">{{$row->nombre}} {{$row->apellido}}</option>      
                            @endif                      
                            
                            @endforeach
                        </select>

                    </div>
    
                    <div class="d-grid col-6 mx-auto">
                        <button class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Actualizar</button>
    
                    </div>
    
    
                  </form>

            </div>

        </div>

    </div>

</div>

@endsection