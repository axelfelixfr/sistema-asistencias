<!-- Inicio de Formulario -->
<div class="container py-5 col-xl-10 col-xxl-8">
    <div class="pt-5 row align-items-center g-lg-5">
        <div class="text-center col-lg-7 text-lg-start">
            <h1 class="mb-3 display-4 fw-bold lh-1">Bienvenido(a) al sistema de asistencias</h1>
            <p class="col-lg-10 fs-4">Inicia sesión con tu clave de empleado y curp</p>
        </div>

        <?php if (!isset($_SESSION['identity'])) : ?>
            <div class="mx-auto col-md-10 col-lg-5">
                <form action="<?= base_url ?>usuario/login" method="POST" enctype="multipart/form-data" class="p-4 border p-md-5 rounded-3 bg-light">
                    <?php if (isset($_SESSION['error_login']) && $_SESSION['error_login'] == 'complete') : ?>
                        <div class="alert alert-danger" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
                            </svg> Datos incorrectos
                        </div>
                    <?php elseif (isset($_SESSION['error_login']) && $_SESSION['error_login'] == 'nothing') : ?>
                        <?php Utils::deleteSession('error_login'); ?>
                    <?php endif; ?>
                    <?php Utils::deleteSession('error_login'); ?>
                    <div class="mb-3 form-floating">
                        <input type="text" required="true" maxlength="6" name="clave" class="form-control" id="clave">
                        <label for="clave">Clave</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" required="true" maxlength="18" name="curp" class="form-control" id="curp">
                        <label for="curp">CURP</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
                    <hr class="my-4">
                    <small class="text-muted">Al dar click en Iniciar sesión aceptas los términos y condiciones.</small>
                </form>
            </div>
        <?php else : ?>
            <p class="text-dark">Tu ya estas identificado</p>
            <a class="btn btn-success col-2" href="<?= base_url ?>gestion/index">Ir al menú de gestión de asistencias</a>
        <?php endif; ?>
    </div>
</div> <!-- Fin de Formulario -->