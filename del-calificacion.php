<?php
require_once("includes/cdb_calificacion.php");

$resultado = borrarCalificacion((int)$_GET['del']); 

if ($resultado) {
    header("Location: dashboard.php");
} else {
    echo "Error al eliminar";
}
?>
