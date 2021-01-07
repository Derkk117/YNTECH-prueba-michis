@extends('../app') 

@section('title') 
    Crud Mascotas 
@endsection 

@section('Content')
<div class="w-100 align-items-center justify-content-center text-center p-5" style="height:100%;">
    <div class="w-75 text-center m-auto p-4" style="max-width:800px;">
        <div class="bg-dark justify-content-around d-flex rounded p-2">
            <div class="form-group w-75 text-light">
                <label for="">Selecciona un dueño para añadir mascotas:</label>
                <select name="" id="UserSelected" class="form-control">
                @foreach($usuarios as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->nombre}}: {{$usuario->correo}}</option>
                @endforeach
            </select>
            </div>
            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#AgregaMascota" onclick="SelectUSer()">Agregar mascota</button>
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
                  <th class="col-2">Nombre</th>
                  <th class="col-2">Tipo</th>
                  <th class="col-1">Edad</th>
                  <th class="col-1">Sexo</th>
                  <th class="col-1">Peso</th>
                  <th class="col-2"></th>
                </tr>
            </thead>
            <tbody>
              @foreach($mascotas as $mascota)
                <tr class="d-flex align-items-center justify-content-center">
                  <td class="col-3">{{$mascota->Usuario->correo}}</td>
                  <td class="col-2">{{$mascota->nombre}}</td>
                  <td class="col-2">{{$mascota->tipo}}</td>
                  <td class="col-1">{{$mascota->edad}}</td>
                  <td class="col-1">{{$mascota->sexo}}</td>
                  <td class="col-1">{{$mascota->peso}}</td>
                  <td class="col-2"> 
                    <button class="btn btn-outline-warning" onclick="EditarMascota({{$mascota->id}})">Modificar</button> 
                    <button class="btn btn-outline-danger" data-toggle="modal" data-target="#EliminarD" onclick="cambiarIdM({{$mascota->id}})">Eliminar</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

<!-- Modal para agregar mascota -->
@section('Modal')
<div class="modal fade" id="AgregaMascota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar mascota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/mascota" method="POST" class="m-3" id="AgregaMascotaForm">
            @csrf 
            @method('POST')
            <!-- Formulario para enviar los datos de un usuario. Recibe la funcion store de UsuariosController. -->
            <div class="form-group row">
                <label for="dueño" class="col-sm-2 col-form-label">Dueño:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="dueño" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre">
                </div>
            </div>
            <div class="form-group row">
                <label for="tipo" class="col-sm-2 col-form-label">Tipo:</label>
                <div class="col-sm-10">
                    <select name="tipo" id="tipoE" class="form-control">
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
                    <select name="sexo" id="sexo" class="form-control">
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
                    @foreach($usuarios as $usuario)
                        <option value="{{$usuario->id}}">{{$usuario->nombre}}: {{$usuario->correo}}</option>
                    @endforeach
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