<?php
require_once("includes/cdb_calificacion.php");

$alumno = buscarEstudiante((int)$_GET['mod']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <title>AIEP - Editar Calificacion</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="./assets/css/estilos.css">
</head>
<body>
    <header>
        <?php include("components/navbar/navbar.html") ?>
    </header>

    <main>
        <nav aria-label="breadcrumb" class="d-flex align-items-center">
            <div class="container">
                <ol class="breadcrumb mt-3">
                    <li class="breadcrumb-item"><i class="fa-solid fa-angle-left"></i> 
                        <a href="dashboard" class="link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Modificar</li>
                </ol>
            </div>
        </nav>

        <h1 class="text-center h3 fw-normal">Editar Calificación</h1>
        <p class="mb-4 text-center text-muted">Estudiante: <?= $alumno['nombre'] . " " . $alumno['apellidos']; ?></p>

        <form id="edit-calificacion-form">
            <div class="container">
                <input type="hidden" id="id_estudiante" value="<?= $alumno['id_estudiante'] ?>" readonly>

                <section class="row mb-3">
                    <label for="notaOne" class="col-sm-1 col-form-label col-form-label-sm fw-semibold">NOTA 1:</label>
                    <div class="col-sm-11">
                        <input type="text" id="notaOne" class="form-control form-control-sm shadow-none" value="<?= $alumno['nota1']; ?>">
                    </div>
                </section>
                <section class="row mb-3">
                    <label for="notaTwo" class="col-sm-1 col-form-label col-form-label-sm fw-semibold">NOTA 2:</label>
                    <div class="col-sm-11">
                        <input type="text" id="notaTwo" class="form-control form-control-sm shadow-none" value="<?= $alumno['nota2']; ?>">
                    </div>
                </section>
                <section class="row mb-3">
                    <label for="notaThree" class="col-sm-1 col-form-label col-form-label-sm fw-semibold">NOTA 3:</label>
                    <div class="col-sm-11">
                        <input type="text" id="notaThree" class="form-control form-control-sm shadow-none" value="<?= $alumno['nota3']; ?>">
                    </div>
                </section>
                <section class="row mb-3">
                    <label for="promedio" class="col-sm-1 col-form-label col-form-label-sm fw-semibold">PROMEDIO:</label>
                    <div class="col-sm-11">
                        <input type="text" id="promedio" class="form-control form-control-sm shadow-none" value="<?= $alumno['promedio']; ?>" readonly>
                    </div>
                </section>
                <section class="row mb-3">
                    <label for="observacion" class="col-sm-2 col-form-label col-form-label-sm fw-semibold">OBSERVACION:</label>
                    <div class="col-sm-10">
                        <textarea id="observacion" rows="4" class="form-control form-control-sm shadow-none"><?= $alumno['observaciones']; ?></textarea>
                    </div>
                </section>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-sm text-uppercase" style="width: 10rem;">Actualizar</button>
                </div>
            </div>
        </form>
    </main>                            


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./lib/jQuery/jquery-3.7.1.min.js"></script>
    <script src="./assets/js/app.js" type="module"></script>
    <script src="./lib/sweetalert2/sweetalert2@11.js"></script>
    <script src="https://kit.fontawesome.com/141371d4e4.js" crossorigin="anonymous"></script>
</body>
</html>