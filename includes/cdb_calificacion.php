<?php 
require_once("conexion_db.php");

function mostrarInformacion($table) {
    global $conn;
    $campos = array();

    $query = "SELECT * FROM $table ";
    $resultado = mysqli_query($conn, $query);

    while($fila = mysqli_fetch_assoc($resultado)) {
        $campos[] = $fila;
    }
    return $campos;
}


function authenticar($username, $pass) {
    global $conn;
    
    $query = "SELECT p.username, p.password ";
    $query.= "FROM profesor p ";
    $query.= "WHERE username = ? AND password = ? ";
    
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    
    mysqli_stmt_bind_param($stmt, "ss", $username, $pass);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    // Cerramos las conexiones y liberemos memoria de la consulta y la conexion
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    return (mysqli_num_rows($result) > 0) ? true : false;
}


function listarCalificaciones() {
    global $conn;
    $campos = array();

    $query = "SELECT * FROM estudiante e ";
    $query.= "INNER JOIN calificaciones c on e.id = c.id_estudiante ";
    $query.= "ORDER BY c.id DESC ";
    $resultado = mysqli_query($conn, $query);

    while($fila = mysqli_fetch_assoc($resultado)) {
        $campos[] = $fila;
    }
    return $campos;
}


function insertarCalificacion($nota1, $nota2, $nota3, $promedio, $observacion, $alumno) {
    global $conn;

    $query = "INSERT INTO calificaciones (nota1, nota2, nota3, promedio, observaciones, id_estudiante) ";
    $query.= "VALUES (?, ?, ?, ?, ?, ?) ";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);

    mysqli_stmt_bind_param($stmt, "ddddsi", $nota1, $nota2, $nota3, $promedio, $observacion, $alumno);
    $resultado = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $resultado;
}


// Ver como mejorarlo con la funcion listarCalificaciones()
function buscarEstudiante($id) {
    global $conn;
    
    $query = "SELECT * FROM calificaciones c ";
    $query.= "INNER JOIN estudiante e on c.id_estudiante = e.id ";
    $query.= "WHERE c.id_estudiante = ? ";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);

    $fila = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $fila;
}


function actualizarCalificacion($nota1, $nota2, $nota3, $promedio, $observacion, $idEstudiante) {
    global $conn;

    $query = "UPDATE calificaciones SET nota1 = ?, nota2 = ?, nota3 = ?, promedio = ?, observaciones = ? ";
    $query.= "WHERE id_estudiante = ? ";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);

    mysqli_stmt_bind_param($stmt, "ddddsi", $nota1, $nota2, $nota3, $promedio, $observacion, $idEstudiante);
    $resultado = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $resultado;
}


function borrarCalificacion($id) {
    global $conn;

    $query = "DELETE FROM calificaciones WHERE id = ? ";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);

    mysqli_stmt_bind_param($stmt, "i", $id);
    $resultado = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $resultado;
}

?>
