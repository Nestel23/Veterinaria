@extends('inicio')
@section('contenido')
    <div class="row mt-3">
        <div class="col-12 col-lg-8 offset-0 offset-lg-2">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalPropietarios">
                    <i class="fa-solid fa-circle-plus"></i> Nuevo Propietario

                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @php $i = 1; @endphp
                        @foreach ($propietarios as $row)
                            <tr>
                                <td>{{$i++;}}</td>
                                <td>{{$row->nombre}}</td>
                                <td>{{$row->apellido}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->telefono}}</td> 
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{url('propietarios', [$row])}}" class="btn btn-success"> <i class="fa-solid fa-edit"></i></a>

                                        </div>
                                        <div class="col-md-6">

                                            <form method="POST" action="{{url('propietarios', [$row])}}">
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

    <div class="modal fade" id="modalPropietarios"  tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Propietarios</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="frmPropietarios" method="POST" action="{{url('propietarios')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="nombre" class="form-control" maxlength="50" placeholder="Nombre" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="apellido" class="form-control" maxlength="50" placeholder="Apellido" required>
                        </div>

                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" maxlength="50" placeholder="Email" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                    <input type="text" name="telefono" class="form-control" maxlength="12" placeholder="Telefono" required>
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