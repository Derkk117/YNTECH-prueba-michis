@extends('../app') 

@section('title') 
    Crud Usuarios 
@endsection 

@section('Content')
<div class="w-100 align-items-center justify-content-center text-center p-5" style="height:100%;">
    <div class="w-75 text-center m-auto p-4" style="max-width:300px;">
        <div class="bg-dark justify-content-around d-flex rounded p-2">
            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#AgregarUsuario">Agregar dueño</button>
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
                  <th class="col-3">Nombre</th>
                  <th class="col-3">Telefono</th>
                  <th class="col-3">Correo</th>
                  <th class="col-3"></th>
                </tr>
            </thead>
            <tbody>
              @foreach($usuarios as $usuario)
                <tr class="d-flex align-items-center justify-content-center">
                  <td class="col-3">{{$usuario->nombre}}</td>
                  <td class="col-3">{{$usuario->telefono}}</td>
                  <td class="col-3">{{$usuario->correo}}</td>
                  <td class="col-3"> 
                    <button class="btn btn-outline-warning" onclick="EditarD({{$usuario->id}})">Modificar</button> 
                    <button class="btn btn-outline-danger" data-toggle="modal" data-target="#EliminarD" onclick="cambiarId({{$usuario->id}})">Eliminar</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

<!-- Modal para agregar usuario -->
@section('Modal')
<div class="modal fade" id="AgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar dueño</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/usuario" method="POST" class="m-3">
            @csrf 
            @method('POST')
            <!-- Formulario para enviar los datos de un usuario. Recibe la funcion store de UsuariosController. -->
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre">
                </div>
            </div>
            <div class="form-group row">
                <label for="lastname" class="col-sm-2 col-form-label">Telefono:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telefono">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Correo:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="correo">
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

<!-- Modal para editar dueño -->
<div class="modal fade" id="EditarD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="exampleModalLabel">Editar dueño</h5>
      </div>
      <div class="modal-body">
      <form  action="/usuario/"id="EditarUserForm" method="POST">
        @csrf 
        @method('PUT')
            <div class="w-100 m-auto border border-primary rounded p-3 text-center">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label font-weight-bold">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nombre">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label font-weight-bold">Telefono:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="telefono">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label font-weight-bold">Correo:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="correo">
                    </div>
                </div>
            </div>
          <div class="modal-footer justify-content-around">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-outline-primary">Editar dueño</button>
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
                <button class="btn btn-outline-danger" onclick="EliminarD()">Eliminar</button>
            </div>
        </div>
    </div>
</div>

@endsection