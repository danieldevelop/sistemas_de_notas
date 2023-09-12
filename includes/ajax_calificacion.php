<?php
require_once("cdb_calificacion.php");

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    if (isset($accion)) 
    {
        switch ($accion) 
        {
            case 'validar_login': 
                $username = $_POST['username'];
                $pass = $_POST['pass'];

                $patron_text = "/^[a-zñ \s]+$/i";
                $json = array();

                // Validamos los campos antes de enviar los datos a la base de datos
                if (empty($username) || empty($pass)) 
                {
                    $json[] = array("estado" => "warning", "mensaje" => "Debe ingresar sus credenciales");
                    echo json_encode($json);
                    return false;
                }

                if (!preg_match($patron_text, $username)) 
                {
                    $json[] = array("estado" => "error", "mensaje" => "El nombre de usuario no es valido");
                    echo json_encode($json);
                    return false;
                }

                /**
                 * Llamamos a la funcion Authenticar que esta en el Manejador y le pasamos los parametros 
                 * necesarios para validar el login. 
                 * Si el login es correcto, redirijimos a la vista dashboard y si no, un mensaje de error.
                 */
                $auth = authenticar($username, $pass);
                
                if ($auth) {
                    $json[] = array("estado" => "success", "mensaje" => "Hola, Bienvenido al sistema...");
                    echo json_encode($json);
                } else {
                    $json[] = array("estado" => "error", "mensaje" => "Credenciales incorrectas");
                    echo json_encode($json);
                }
                break;


            case 'registrar_calificacion':
                $nota1 = floatval($_POST['nota1']);
                $nota2 = floatval($_POST['nota2']);
                $nota3 = floatval($_POST['nota3']);
                $promedio = floatval($_POST['promedio']);
                $observacion = $_POST['observacion'];
                $alumno = intval($_POST['alumno']);

                $json = array();

                if ($alumno === "0") {
                    $json[] = array("estado" => "warning", "mensaje" => "Debe seleccionar un estudiante");
                    echo json_encode($json);
                    return false;
                }

                if ($nota1 === "" || $nota2 === "" || $nota3 === "") {
                    $json[] = array("estado" => "warning", "mensaje" => "Debe ingresar las notas");
                    echo json_encode($json);
                    return false;
                }

                $resultado = insertarCalificacion($nota1, $nota2, $nota3, $promedio, $observacion, $alumno);
                
                if ($resultado) {
                    $json[] = array("estado" => "success", "mensaje" => "Calificaciones registrada correctamente");
                    echo json_encode($json);
                } else {
                    $json[] = array("estado" => "error", "mensaje" => "Error al registrar las calificaciones");
                    echo json_encode($json);
                }
                break;


                case 'actualizar_calificacion':
                    $nota1 = floatval($_POST['nota1']);
                    $nota2 = floatval($_POST['nota2']);
                    $nota3 = floatval($_POST['nota3']);
                    $promedio = floatval($_POST['promedio']);
                    $observacion = $_POST['observacion'];
                    $idEstudinate = intval($_POST['idEstudinate']);

                    $json = array();

                    if ($nota1 === "" || $nota2 === "" || $nota3 === "") {
                        $json[] = array("estado" => "warning", "mensaje" => "Debe ingresar las notas");
                        echo json_encode($json);
                        return false;
                    }

                    $resultado = actualizarCalificacion($nota1, $nota2, $nota3, $promedio, $observacion, $idEstudinate);

                    if ($resultado) {
                        $json[] = array("estado" => "success", "mensaje" => "Calificaciones registrada correctamente");
                        echo json_encode($json);
                    } else {
                        $json[] = array("estado" => "error", "mensaje" => "Error al registrar las calificaciones");
                        echo json_encode($json);
                    }
                break;
        }
    }
}

?>