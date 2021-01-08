@extends('../app') 

@section('title') 
    Crud Mascotas 
@endsection 

@section('Content')
<div class="w-100 align-items-center justify-content-center text-center p-5" style="height:100%;">
    <div class="w-75 text-center m-auto p-4" style="max-width:800px;">
        <h4 class="text-light">Ver el veterinario con más citas:</h4>    
        <input class="form-control text-center" type="text" id="Resultado">
        <div class="bg-dark justify-content-around d-flex rounded p-2">
            <form id="masSolicitado">
                <div class="form-group">
                    <label for="" class="text-light">Selecciona el mes:</label>
                    <input class="form-control" type="month" id="start" name="start"
                        min="2021-01" value="2021-01">
                </div>
                <button type="button" class="btn btn-outline-primary mt-1" onclick="MasSolicitado()">Buscar</button>
            </form>
        </div>
        <div class="bg-dark justify-content-around d-flex rounded p-2">
            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#CrearCita">Crear cita</button>
        </div>
    </div>
    
    <!-- Tabla para mostrar los dueños existentes -->
    <div class="bg-light w-75-lg w-100-sm text-center px-5">
    <?php $err = Session::get('err'); ?>
    @if($err != "")
    <div class="alert alert-danger text-center" role="alert">
        {{$err}}
    </div>
    @endif
    <?php $ok = Session::get('ok'); ?>
    @if($ok != "")
    <div class="alert alert-success text-center" role="alert">
        {{$ok}}
    </div>
    @endif
        <table class="table px-4 rounded"> 
            <thead class="thead-dark">
                <tr class="d-flex">
                  <th class="col-3">Dueño</th>
                  <th class="col-3">Mascota</th>
                  <th class="col-3">Atiende:</th>
                  <th class="col-3">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($citas as $cita)
                    <tr class="d-flex">
                        <td class="col-3">{{$cita->Mascota->Usuario->correo}}</td>
                        <td class="col-3">{{$cita->Mascota->nombre}}</td>
                        <td class="col-3">{{$cita->Veterinario->correo}}</td>
                        <td class="col-3">{{$cita->date}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

<!-- Modal para crear cita -->
@section('Modal')
<div class="modal fade" id="CrearCita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/cita" method="POST" class="m-3" id="AgregaMascotaForm">
            @csrf 
            @method('POST')
            <!-- Formulario para enviar los datos de un usuario. Recibe la funcion store de UsuariosController. -->
            <div class="form-group row">
                <label for="paciente" class="col-sm-2 col-form-label">Mascota:</label>
                <div class="col-sm-10">
                    <select name="paciente" class="form-control">
                        @foreach($mascotas as $mascota)
                            <option value="{{$mascota->id}}">{{$mascota->Usuario->correo}}: {{$mascota->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="veterinario" class="col-sm-2 col-form-label">Veterinario</label>
                <div class="col-sm-10">
                    <select name="veterinario" class="form-control">
                        @foreach($veterinarios as $veterinario)
                            <option value="{{$veterinario->id}}">{{$veterinario->nombre}}: {{$veterinario->correo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Fecha:</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="date" min="0.0">
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-outline-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal para editar mascota -->
<div class="modal fade" id="EditarMascota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="exampleModalLabel">Edit pet</h5>
      </div>
      <div class="modal-body">
      <form action="/mascota" method="POST" class="m-3" id="EditarMascotaForm">
            @csrf 
            @method('PUT')
            <!-- Formulario para enviar los datos de un usuario. Recibe la funcion store de UsuariosController. -->
            <div class="form-group row">
                <label for="dueño" class="col-sm-2 col-form-label">Dueño:</label>
                <div class="col-sm-10">
                    <select name="dueño" class="form-control">
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre">
                </div>
            </div>
            <div class="form-group row">
                <label for="tipo" id="tipo" class="col-sm-2 col-form-label">Tipo:</label>
                <div class="col-sm-10">
                    <select name="tipo" class="form-control">
                        <option value="1">Perro</option>
                        <option value="2">Gato</option>
                        <option value="3">Ave</option>
                        <option value="4">Roedor</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="edad" class="col-sm-2 col-form-label">Edad:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="edad" min="0">
                </div>
            </div>
            <div class="form-group row">
                <label for="sexo" class="col-sm-2 col-form-label">Sexo:</label>
                <div class="col-sm-10">
                    <select name="sexo" id="sexoE" class="form-control">
                        <option value="1">Macho</option>
                        <option value="2">Hembra</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="peso" class="col-sm-2 col-form-label">Peso:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="peso" min="0.0">
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-outline-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
    
<!-- Modal para eliminar dueño -->
<div id="EliminarD" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text center alert alert-danger"><h2>Eliminar dueño</h2></div>
            <div class="modal-body d-flex m-auto">
                <h5>¿Estas seguro que quieres eliminar el dueño?</h5>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-outline-secondary">Cancelar</button>
                <button class="btn btn-outline-danger" onclick="EliminarMascota()">Eliminar</button>
            </div>
        </div>
    </div>
</div>

@endsection