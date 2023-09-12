<div class="modal fade" id="mdlAddCalificacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="calificacionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="calificacionModalLabel">Ingreso de calificaciones.</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form class="row g-3" id="calificacion-form">
                    <div class="col-12">
                        <label for="alumno" class="form-label">Nombre del Estudiante</label>
                        <select id="alumno" class="form-select form-select-sm">
                            <option value="0" selected>Seleccione...</option>
                            <?php foreach($estudiantes as $estudiante) { ?>
                                <option value="<?= $estudiante['id'] ?>"><?= $estudiante['nombre'] . " " . $estudiante['apellidos'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="notaOne" class="form-label">Nota 1</label>
                        <input type="text" id="notaOne" class="form-control form-control-sm" placeholder="5.0">
                    </div>

                    <div class="col-md-2">
                        <label for="notaTwo" class="form-label">Nota 2</label>
                        <input type="text" id="notaTwo" class="form-control form-control-sm" placeholder="6">
                    </div>

                    <div class="col-md-2">
                        <label for="notaThree" class="form-label">Nota 3</label>
                        <input type="text" id="notaThree" class="form-control form-control-sm" placeholder="6.5">
                    </div>

                    <div class="col-md-6">
                        <label for="promedio" class="form-label">Promedio</label>
                        <input type="text" id="promedio" class="form-control form-control-sm" readonly>
                    </div>

                    <div class="col-12">
                        <label for="observacion" class="form-label">Observaciones</label>
                        <textarea id="observacion" class="form-control form-control-sm" rows="3"></textarea>
                    </div>

                    <div class="col-12 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa-regular fa-floppy-disk"></i> Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>