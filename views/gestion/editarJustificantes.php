<!-- Inicio de Editar Justificantes por Empleado -->
<div class="container px-4 py-5">
    <?php if (isset($edit) && isset($jus) && is_object($jus)) : ?>
        <?php $url_action = base_url . "justificante/editarJustificante&clave=" . $jus->CCVEEMP . "&fecha=" . $jus->DFECINC . "&id=" . $jus->NIDTPJU; ?>
    <?php endif; ?>
    <h1 class="pb-2 text-center text-danger border-bottom">Editar Justificante de Empleado</h1>
    <div class="container-fluid">

        <form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data" class="pt-3 row gy-2 gx-3 align-items-center">
            <p class="mx-auto fw-bold text-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                </svg> Se recomienda solo cambiar el status del justificante para conservar la integridad de los registros</p>

            <div class="pb-4 col-4">
                <label for="clave" class="form-label">Empleado</label>
                <input type="text" readonly class="form-control" id="clave" value="<?= isset($jus) && is_object($jus) ? $jus->CCVEEMP : ''; ?>" name="clave" required="true">
            </div>
            <div class="pb-4 col-2">
                <label class="form-label" for="fecha">Fecha de la incidencia</label>
                <input type="date" readonly name="fecha" id="fecha" value="<?= isset($jus) && is_object($jus) ? $jus->DFECINC : ''; ?>" pattern="^(0?[1-9]|1[0-2])[\/](0?[1-9]|[12]\d|3[01])[\/](19|20)\d{2}$" class="form-control" required="true" />
            </div>
            <div class="pb-4 col-3">
                <label for="id" class="form-label">Justificante</label>
                <?php $justificantes = Utils::showDocuments() ?>
                <select class="form-select" id="id" name="id" required="true">
                    <!-- <option selected disabled value="">Selecciona un justificante</option> -->
                    <?php while ($justify = $justificantes->fetch_object()) : ?>
                        <option style="display: none;" value="<?= $justify->NIDTPJU ?>" <?= isset($jus) && is_object($jus) && $justify->NIDTPJU == $jus->NIDTPJU ? 'selected' : ''; ?> />
                        <?= $justify->CDESJUS ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-3">
                <label for="status" class="form-label">Estatus</label>
                <input type="text" class="form-control" pattern="[A,I]{1}" maxlength="1" aria-describedby="statusHelp" id="status" value="<?= isset($jus) && is_object($jus) ? $jus->CSTATUS : ''; ?>" name="status" required="true">
                <span id="statusHelp" class="form-text"><span class="fw-bold">A</span> = Activo, <span class="fw-bold">I</span> = Inactivo</span>
            </div>
            <div class="py-3 row d-flex align-content-center">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                        </svg> Guardar justificante</button>
                    <a class="btn btn-danger" href="<?= base_url ?>justificante/gestion"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-reply-all" viewBox="0 0 16 16">
                            <path d="M8.098 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L8.8 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L4.114 8.254a.502.502 0 0 0-.042-.028.147.147 0 0 1 0-.252.497.497 0 0 0 .042-.028l3.984-2.933zM9.3 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z" />
                            <path d="M5.232 4.293a.5.5 0 0 0-.7-.106L.54 7.127a1.147 1.147 0 0 0 0 1.946l3.994 2.94a.5.5 0 1 0 .593-.805L1.114 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.5.5 0 0 0 .042-.028l4.012-2.954a.5.5 0 0 0 .106-.699z" />
                        </svg> Regresar</a>
                </div>
            </div>

        </form>
    </div>
</div> <!-- Fin de Editar Justificantes por Empleado -->