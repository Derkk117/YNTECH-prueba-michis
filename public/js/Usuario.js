var UsuarioId = -1;

function EditarD(id) {
    UsuarioId = id;
    $("#EditarUserForm").attr({ 'action': '/usuario/' + id });

    $.get('/usuario/' + id, function(usuario) {
        UsuarioId = usuario.id;
        console.log(id);
        $("#EditarUserForm [name='nombre']").val(usuario.nombre);
        $("#EditarUserForm [name='telefono']").val(usuario.telefono);
        $("#EditarUserForm [name='correo']").val(usuario.correo);
    });
    $("#EditarD").modal('show');
}

function cambiarId(id) {
    UsuarioId = id;
}

function EliminarD() {
    var usuario = {
        _token: $("#EditarUserForm [name='_token']").val(),
        _method: "DELETE"
    };

    $.post('/usuario/' + UsuarioId, usuario, function(data, status) {
        //console.log(data);
        window.location = "/usuario";
    }).fail(function(data) {
        console.log(data);
    });
}