<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <!-- Viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link rel="icon" type="favicon/x-icon" href="<?= base_url ?>assets/img/lista-de-asistentes.svg" />
  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/bootstrap/css/bootstrap.min.css">
  <style type="text/css">
    /* --------------------------------------------- */
    /* 		Iconos del menú			*/
    /* --------------------------------------------- */
    .icon-square {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 3rem;
      height: 3rem;
      font-size: 1.5rem;
      border-radius: .75rem;
    }

    /* --------------------------------------------- */
    /* 		Página 404			*/
    /* --------------------------------------------- */

    .four_zero_four_bg {
      background-image: url('<?= base_url ?>assets/img/404/error404.gif');
      height: 400px;
      background-position: center;
    }

    .four_zero_four_bg h1 {
      font-size: 80px;
    }

    .link_404 {
      color: #fff !important;
      padding: 10px 20px;
      background: #39ac31;
      margin: 20px 0;
      display: inline-block;
    }
  </style>
  <title>Sistema de asistencias</title>
</head>

<body class="d-flex flex-column h-100">
  <!-- Inicio del Header -->
  <header class="text-white bg-light">
    <div class="px-3 py-2">
      <div class="container flex-wrap d-flex justify-content-center">
        <div class="mb-2 col-12 col-lg-auto mb-lg-0 me-lg-auto">
          <img width="50" height="45" src="<?= base_url ?>assets/img/lista-de-asistentes.svg" alt="Sistema Asistencia">
        </div>


        <div class="text-end">
          <?php if (isset($_SESSION['identity'])) : ?>
            <a class="btn btn-danger" href="<?= base_url ?>usuario/logout"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="text-center align-middle bi bi-power" viewBox="0 0 16 16">
                <path d="M7.5 1v7h1V1h-1z" />
                <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
              </svg> Cerrar Sesión</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </header> <!-- Fin del Header -->

  <main class="flex-shrink-0" style="min-height: 540px;">