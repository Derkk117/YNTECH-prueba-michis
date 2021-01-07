var MascotaId = -1;

function SelectUSer(){
    var usuario = $("#UserSelected").val();
    $.get("/usuario/"+usuario, function(u){
        $("#AgregaMascotaForm [name='dueño']").val(u.correo);
    });
}

function EditarMascota(id) {
    MascotaId = id;
    $("#EditarMascotaForm").attr({ 'action': '/mascota/' + id });

    $.get('/mascota/' + id, function(mascota) {
        MascotaId = mascota.id;
        $("#EditarMascotaForm [name='nombre']").val(mascota.nombre);
        $("#EditarMascotaForm [name='dueño']").val(mascota.usuario_id);
        $("#EditarMascotaForm [name='tipo']").val();
        switch(mascota.tipo){
            case 'Perro': 
                $("#EditarMascotaForm [name='tipo']").val(1);
                break;
            case 'Gato':
                $("#EditarMascotaForm [name='tipo']").val(2);
                break;
            case 'Ave':
                $("#EditarMascotaForm [name='tipo']").val(3);
                break;
            case 'Roedor':
                $("#EditarMascotaForm [name='tipo']").val(4); 
                break;
        }
        $("#EditarMascotaForm [name='edad']").val(mascota.edad);
        if(mascota.sexo === "Macho"){
            $("#EditarMascotaForm [name='sexo']").val(1);
        }else $("#EditarMascotaForm [name='sexo']").val(2);
        $("#EditarMascotaForm [name='peso']").val(mascota.peso);
    });
    $("#EditarMascota").modal('show');
}

function cambiarIdM(id) {
    MascotaId = id;
}

function EliminarMascota() {
    var mascota = {
        _token: $("#EditarMascotaForm [name='_token']").val(),
        _method: "DELETE"
    };

    $.post('/mascota/' + MascotaId, mascota, function(data, status) {
        //console.log(data);
        window.location = "/mascota";
    }).fail(function(data) {
        console.log(data);
    });
}