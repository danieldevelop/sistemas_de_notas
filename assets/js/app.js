import { 
    messageDialog, 
    calcularPromedio,
} from "./utils.js";

// Muestramos un valor por defecto en el campo promedio
$("#mdlAddCalificacion").on("show.bs.modal", () => $("#promedio").val(0));

$("#notaOne, #notaTwo, #notaThree").blur(() => {
    const n1 = Number($("#notaOne").val().trim().replace(",", ".")),
        n2 = Number($("#notaTwo").val().trim().replace(",", ".")),
        n3 = Number($("#notaThree").val().trim().replace(",", "."));

    $("#promedio").val(calcularPromedio(n1, n2, n3));
});

$(document).ready(() => {
    const rexp_text = new RegExp(/^([a-zñ ])+$/i);

    // AUTHENTICACION - LOGIN
    $("#login-form").submit((e) => {
        e.preventDefault();

        const username = $("#username").val().trim(),
            pass = $("#pass").val().trim();

        if (username.length == 0 || pass.length == 0) {
            messageDialog("warning", "Por favor ingrese los datos");
            return false;
        }

        if (!rexp_text.test(username)) {
            messageDialog("error", "El nombre de usuario no es valido");
            return false;
        }

        $.ajax({
            url: "includes/ajax_calificacion.php",
            type: "POST",
            data: { 
                username, 
                pass, 
                accion: "validar_login",
            },
            success: (response) => {
                let resultado = JSON.parse(response);

                resultado.forEach(info => {
                    if (info.estado == "success") {
                        messageDialog(info.estado, info.mensaje);
                        setTimeout(() => {
                            window.location.href = "dashboard";
                        }, 3000);
                    } else {
                        messageDialog(info.estado, info.mensaje);
                    }
                })
            },
            error: (xhr, status, error) => {
                console.log(error.message);
            }
        });
    });


    // REGISTRAR CALIFICACION -  DASHBOARD
    $("#calificacion-form").submit((e) => {
        e.preventDefault();

        const nota1 = $("#notaOne").val().trim().replace(",", "."),
            nota2 = $("#notaTwo").val().trim().replace(",", "."),
            nota3 = $("#notaThree").val().trim().replace(",", "."),
            promedio = $("#promedio").val().trim(),
            observacion = $("#observacion").val().trim(),
            alumno = $("#alumno").val().trim();

        if (alumno == "0") {
            messageDialog("warning", "Por favor seleccione un estudiante");
            return false;
        }

        if (nota1.length == 0 || nota2.length == 0 || nota3.length == 0) {
            messageDialog("warning", "Debe ingresar las notas");
            return false;
        }

        $.ajax({
            url: "includes/ajax_calificacion.php",
            type: "POST",
            data: {
                nota1,
                nota2,
                nota3,
                promedio,
                observacion,
                alumno,
                accion: "registrar_calificacion",
            },
            success: (response) => {
                let resultado = JSON.parse(response);

                resultado.forEach(info => {
                    messageDialog(info.estado, info.mensaje);
                });
                $("#calificacion-form")[0].reset();
            },
            error: (xhr, status, error) => {
                console.log(error.message);
            }
        });
    });


    // EDITAR CALIFICACION - DASHBOARD
    $("#edit-calificacion-form").submit((e) => {
        e.preventDefault();
        // console.log($('#id_estudiante').val().trim())

        const nota1 = $("#notaOne").val().trim().replace(",", "."),
            nota2 = $("#notaTwo").val().trim().replace(",", "."),
            nota3 = $("#notaThree").val().trim().replace(",", "."),
            promedio = $("#promedio").val().trim(),
            observacion = $("#observacion").val().trim(),
            idEstudinate = $("#id_estudiante").val().trim();

        if (nota1.length == 0 || nota2.length == 0 || nota3.length == 0) {
            messageDialog("warning", "Debe ingresar las notas");
            return false;
        }

        $.ajax({
            url: "includes/ajax_calificacion.php",
            type: "POST",
            data: {
                nota1,
                nota2,
                nota3,
                promedio,
                observacion,
                idEstudinate,
                accion: "actualizar_calificacion",
            },
            success: (response) => {
                let resultado = JSON.parse(response);

                resultado.forEach(info => {
                    messageDialog(info.estado, info.mensaje);
                });
            },
            error: (xhr, status, error) => {
                console.log(error.message);
            }
        });
    });
});