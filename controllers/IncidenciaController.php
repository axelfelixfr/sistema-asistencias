<?php
ob_start();
require_once 'models/incidencia.php';

class incidenciaController
{

    public function gestion()
    {
        Utils::isIdentity();
        $incidencia = new Incidencia();
        $incidencias = $incidencia->getAll();

        require_once 'views/gestion/crudIncidencias.php';
    }

    public function save()
    {
        Utils::isIdentity();
        if (isset($_POST)) {
            $clave = isset($_POST['clave']) ? $_POST['clave'] : false;
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false;
            $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
            $status = isset($_POST['status']) ? $_POST['status'] : false;

            if ($clave && $fecha && $tipo && $status) {
                $incidencia = new Incidencia();
                $incidencia->setClave($clave);
                $incidencia->setFecha($fecha);
                $incidencia->setTipo($tipo);
                $incidencia->setStatus($status);

                $save = $incidencia->save();


                if ($save) {
                    $_SESSION['incidencia'] = "complete";
                    header('Location:' . base_url . 'incidencia/gestion');
                } else {
                    $_SESSION['incidencia'] = "failed";
                    header('Location:' . base_url . 'incidencia/gestion');
                }
            } else {
                $_SESSION['incidencia'] = "failed";
                header('Location:' . base_url . 'incidencia/gestion');
            }
        } else {
            $_SESSION['incidencia'] = "failed";
            header('Location:' . base_url . 'incidencia/gestion');
        }
    }

    public function eliminar()
    {
        Utils::isIdentity();
        if (isset($_GET['clave']) & isset($_GET['fecha']) & isset($_GET['tipo'])) {

            $clave = $_GET['clave'];
            $fecha = $_GET['fecha'];
            $tipo = $_GET['tipo'];

            $incidencia = new Incidencia();
            $incidencia->setClave($clave);
            $incidencia->setFecha($fecha);
            $incidencia->setTipo($tipo);

            $delete = $incidencia->delete();
            if ($delete) {
                $_SESSION['deleteIncidencia'] = 'complete';
            } else {
                $_SESSION['deleteIncidencia'] = 'false';
            }
        } else {
            $_SESSION['deleteIncidencia'] = 'false';
        }
        header('Location:' . base_url . 'incidencia/gestion');
    }

    public function editar()
    {
        Utils::isIdentity();
        if (isset($_GET['clave']) & isset($_GET['fecha']) & isset($_GET['tipo'])) {
            $clave = $_GET['clave'];
            $fecha = $_GET['fecha'];
            $tipo = $_GET['tipo'];
            $edit = true;

            $incidencia = new Incidencia();
            $incidencia->setClave($clave);
            $incidencia->setFecha($fecha);
            $incidencia->setTipo($tipo);

            $inc = $incidencia->getOne();

            require_once 'views/gestion/editarIncidencias.php';
        } else {
            header('Location:' . base_url . 'incidencia/gestion');
        }
    }

    public function editarIncidencia()
    {
        Utils::isIdentity();

        if (isset($_POST)) {


            $clave = isset($_GET['clave']) ? $_GET['clave'] : false;
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false;
            $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
            $status = isset($_POST['status']) ? $_POST['status'] : false;


            if ($clave && $fecha && $tipo && $status) {


                $incidencia = new Incidencia();
                $incidencia->setClave($clave);
                $incidencia->setFecha($fecha);
                $incidencia->setTipo($tipo);
                $incidencia->setStatus($status);


                if (isset($_GET['clave']) && isset($_GET['fecha']) & isset($_GET['tipo'])) {

                    $clave = $_GET['clave'];
                    $fecha = $_GET['fecha'];
                    $tipo = $_GET['tipo'];

                    $incidencia->setClave($clave);
                    $incidencia->setFecha($fecha);
                    $incidencia->setTipo($tipo);


                    $save = $incidencia->edit();
                }

                if ($save) {
                    $_SESSION['editarIncidencia'] = "complete";
                    header('Location:' . base_url . 'incidencia/gestion');
                } else {
                    $_SESSION['editarIncidencia'] = "failed";
                    header('Location:' . base_url . 'incidencia/gestion');
                }
            } else {
                $_SESSION['editarIncidencia'] = "failed";
                header('Location:' . base_url . 'incidencia/gestion');
            }
        } else {
            $_SESSION['editarIncidencia'] = "failed";
            header('Location:' . base_url . 'incidencia/gestion');
        }
    }
}
ob_end_flush();
