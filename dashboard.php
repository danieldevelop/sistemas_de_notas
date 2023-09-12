<?php 
require_once("includes/cdb_calificacion.php");

$calificaciones = listarCalificaciones();
$estudiantes = mostrarInformacion("estudiante");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <title>AIEP - Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="./assets/css/estilos.css">
</head>
<body>
    <header>
        <?php include("components/navbar/navbar.html") ?>
    </header>

    <main>
        <h1 class="text-center fw-normal h3 mt-4 mb-4">Mis Calificaciones</h1>

        <div class="container">
            <section class="d-flex gap-3 justify-content-between mb-3">
                <input type="search" class="form-control form-control-sm w-25" placeholder="Buscar Estudiante...">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#mdlAddCalificacion">Agregar Notas</button>
            </section>
        </div>

        <div class="table-responsive">
            <div class="container">
                <table class="table table-sm table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>NOMBRE ESTUDIANTE</th>
                            <th>NOTA 1</th>
                            <th>NOTA 2</th>
                            <th>NOTA 3</th>
                            <th>PROMEDIO</th>
                            <th>OBSERVACIONES</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!$calificaciones) { ?>
                                <tr class="text-center">
                                    <td colspan="8">No hay calificaciones registradas</td>
                                </tr>
                        <?php } else { ?>
                            <?php foreach ($calificaciones as $calificacion) { ?>
                                <tr class="text-center">
                                    <td><?= $calificacion['id']; ?></td>
                                    <td><?= $calificacion['nombre'] . " " . $calificacion['apellidos'] ?></td>
                                    <td><?= $calificacion['nota1'] ?></td>
                                    <td><?= $calificacion['nota2'] ?></td>
                                    <td><?= $calificacion['nota3'] ?></td>
                                    <td><?= $calificacion['promedio']?></td>
                                    <td><?php
                                        if ($calificacion['observaciones'] === "") {
                                            echo "";
                                        } else {
                                            echo $calificacion['observaciones'];
                                        }
                                    ?></td>
                                    <td class="d-flex gap-3">
                                        <a href="edit-calificacion?mod=<?= $calificacion['id_estudiante']; ?>" class="text-success" title="editar calificacion"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="javascript:confirmDelete('del-calificacion?del=<?= $calificacion['id']; ?>')" class="text-danger" title="eliminar calificacion"><i class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>


    <!-- Modal -->
    <?php include("components/addcalificacion/addcalificacion.php") ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./lib/jQuery/jquery-3.7.1.min.js"></script>
    <script src="./assets/js/app.js" type="module"></script>
    <script src="./lib/sweetalert2/sweetalert2@11.js"></script>
    <script src="https://kit.fontawesome.com/141371d4e4.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
        // Ver la forma de moverlo a un archivo externo
        const confirmDelete = (url) => {
            Swal.fire({
                title: '¿Está seguro?',
                text: "¡No podrás revertir esto!",
                confirmButtonColor: '#157347',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonText: "SI",
                cancelButtonText: "NO",
                allowOutsideClick: false

            }).then((result) => {
                if (result.isConfirmed) {
                    document.location = url;
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        text: "El registro seleccionado está a salvo!!",
                        confirmButtonColor: '#157347',
                        confirmButtonText: "Aceptar",
                        allowOutsideClick: false
                    });
                }
            });
        };
    </script>
</body>
</html>