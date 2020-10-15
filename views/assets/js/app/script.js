$(document).on("click", "#submit", function(e) {
    e.preventDefault();

    var nombre_usuario = $("#nombre_usuario").val();
    var correo = $("#correo").val();
    var password = $("#password").val();
    var laboratorio = $("#laboratorio").val();
    var rol = $("#rol").val();
    var submit = $("#submit").val();

    $.ajax({
        url: "model/ModeloUsuarioInsertar.php",
        type: "post",
        data: {
            nombre_usuario: nombre_usuario,
            correo: correo,
            password: password,
            laboratorio: laboratorio,
            rol: rol,
            submit: submit
        },
        success: function(data) {
            fetch();
            $("#result").html(data);
        }
    });
    $("#form")[0].reset();
});
//fetch record
function fetch() {
    $.ajax({
        url: "model/ModeloUsuarioTabla.php",
        type: "post",
        success: function(data) {
            $("#fetch").html(data);
        }
    });
}
fetch();
//borrar

$(document).on("click", "#del", function(e) {
    e.preventDefault();
    if (window.confirm("Quieres Eliminar este Registro?")) {
        var del_id = $(this).attr("value");

        $.ajax({
            url: "model/ModeloUsuarioEliminar.php",
            type: "post",
            data: {
                del_id: del_id
            },
            success: function(data) {
                fetch();
                $("#show").html(data);
            }
        });
    } else {
        return false;
    }
});

//ver

$(document).on("click", "#ver", function(e) {
    e.preventDefault();
    var ver_id = $(this).attr("value");

    $.ajax({
        url: "model/ModeloUsuarioVer.php",
        type: "post",
        data: {
            ver_id: ver_id
        },
        success: function(data) {
            $("#ver_datos").html(data);
        }
    });
});
//edit
$(document).on("click", "#edit", function(e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    $.ajax({
        url: "model/ModeloUsuarioEditar.php",
        type: "post",
        data: {
            edit_id: edit_id
        },
        success: function(data) {
            $("#edit_datos").html(data);
        }
    });
});
//recorrido editar

$(document).on("click", "#update", function(e) {
    e.preventDefault();
    var editnombre_usuario = $("#editnombre_usuario").val();
    var editcorreo = $("#editcorreo").val();
    var editlaboratorio = $("#editlaboratorio").val();
    var update = $("#update").val();
    var edit_id = $("#edit_id").val();

    $.ajax({
        url: "model/ModeloUsuarioUpdate.php",
        type: "post",
        data: {
            edit_id: edit_id,
            editnombre_usuario: editnombre_usuario,
            editcorreo: editcorreo,
            editlaboratorio: editlaboratorio,
            update: update

        },
        success: function(data) {
            fetch();
            $("#show").html(data);
        }
    })
})