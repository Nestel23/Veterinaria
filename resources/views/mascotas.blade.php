@extends('inicio')
@section('contenido')
    <div class="row mt-3">
        <div class="col-12 col-lg-8 offset-0 offset-lg-2">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalMascotas">
                    <i class="fa-solid fa-circle-plus"></i> Nueva Mascota

                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Propietario</th>                          
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @php $i = 1; @endphp
                        @foreach ($mascotas as $row)
                            <tr>
                                <td>{{$i++;}}</td>
                                <td>{{$row->nombre}}</td>
                                <td>{{$row->edad}}</td>
                                <td>{{$row->Npropietario}} {{$row->Apropietario}}</td>                                
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{url('mascotas', [$row])}}" class="btn btn-success"> <i class="fa-solid fa-edit"></i></a>

                                        </div>
                                        <div class="col-md-6">

                                            <form method="POST" action="{{url('mascotas', [$row])}}">
                                                @method('delete')
                                                @csrf

                                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

                                            </form>
                                            


                                        </div>

                                    </div>

                                </td>

                                
                            </tr>
                            
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>
        

    </div>

    <div class="modal fade" id="modalMascotas"  tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Mascotas</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="frmMascotas" method="POST" action="{{url('mascotas')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-cat"></i></span>
                            <input type="text" name="nombre" class="form-control" maxlength="50" placeholder="Nombre" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pager"></i></span>
                            <input type="text" name="edad" class="form-control" maxlength="3" placeholder="Edad" required>
                        </div>

                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <select name="idPropietario" class="form-select" required>
                        <option value="">Propietario</option>
                        @foreach($propietarios as $row)
                        <option value="{{$row->id}}">{{$row->nombre}} {{$row->apellido}}</option>
                        @endforeach
                    </select>
                </div>

                


                <div class="d-grid col-6 mx-auto">
                    <button class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

                </div>


              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>              
            </div>
          </div>
        </div>
      </div>


    
@endsection