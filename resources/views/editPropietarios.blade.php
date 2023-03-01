@extends('inicio')
@section('contenido')

<div class="row mt-3">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Editar Propietario
            </div>
            <div class="card-body">
                <form id="frmPropietarios" method="POST" action="{{url('propietarios', [$propietario])}}">
                    @method("PUT")
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <input type="text" name="nombre" value="{{$propietario->nombre}}" class="form-control" maxlength="50" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <input type="text" name="apellido" value="{{$propietario->apellido}}"  class="form-control" maxlength="50" placeholder="Apellido" required>
                            </div>
    
                        </div>
                    </div>
    
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" value="{{$propietario->email}}" maxlength="50" placeholder="Email" required>
                    </div>
    
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                        <input type="text" name="telefono" class="form-control" value="{{$propietario->telefono}}" maxlength="12" placeholder="Telefono" required>
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