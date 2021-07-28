<?php
ob_start();
require_once 'models/justificante.php';

class justificanteController
{

    public function registrar()
    {
        Utils::isIdentity();
        require_once 'views/gestion/registrarJustificantes.php';
    }

    public function gestion()
    {
        Utils::isIdentity();
        $justifiEmpleado = new Justificante();
        $justifiEmpleados = $justifiEmpleado->getAll();

        require_once 'views/gestion/empleadoJustificantes.php';
    }

    public function new()
    {
        Utils::isIdentity();
        if (isset($_POST)) {
            $id = isset($_POST['id']) ? $_POST['id'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $status = isset($_POST['status']) ? $_POST['status'] : false;

            if ($id && $descripcion && $status) {
                $justificante = new Justificante();
                $justificante->setId($id);
                $justificante->setDescripcion($descripcion);
                $justificante->setStatus($status);

                $save = $justificante->save();

                // var_dump($save);
                // die();

                if ($save) {
                    $_SESSION['justificante'] = "complete";
                    header('Location:' . base_url . 'justificante/registrar');
                } else {
                    $_SESSION['justificante'] = "failed";
                    header('Location:' . base_url . 'justificante/registrar');
                }
            } else {
                $_SESSION['justificante'] = "failed";
                header('Location:' . base_url . 'justificante/registrar');
            }
        } else {
            $_SESSION['justificante'] = "failed";
            header('Location:' . base_url . 'justificante/registrar');
        }
    }

    public function insert()
    {
        Utils::isIdentity();
        if (isset($_POST)) {
            $clave = isset($_POST['clave']) ? $_POST['clave'] : false;
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false;
            $id = isset($_POST['id']) ? $_POST['id'] : false;
            $status = isset($_POST['status']) ? $_POST['status'] : false;

            if ($clave && $fecha && $id && $status) {
                $justificante = new Justificante();
                $justificante->setClave($clave);
                $justificante->setFecha($fecha);
                $justificante->setId($id);
                $justificante->setStatus($status);

                $save = $justificante->insert();
                // var_dump($save);
                // die();


                if ($save) {
                    $_SESSION['justificante_empleado'] = "complete";
                    header('Location:' . base_url . 'justificante/gestion');
                } else {
                    $_SESSION['justificante_empleado'] = "failed";
                    header('Location:' . base_url . 'justificante/gestion');
                }
            } else {
                $_SESSION['justificante_empleado'] = "failed";
                header('Location:' . base_url . 'justificante/gestion');
            }
        } else {
            $_SESSION['justificante_empleado'] = "failed";
            header('Location:' . base_url . 'justificante/gestion');
        }
    }

    public function eliminar()
    {
        Utils::isIdentity();
        if (isset($_GET['clave']) & isset($_GET['fecha']) & isset($_GET['id'])) {
            $clave = $_GET['clave'];
            $fecha = $_GET['fecha'];
            $id = $_GET['id'];

            $justificante = new Justificante();
            $justificante->setClave($clave);
            $justificante->setFecha($fecha);
            $justificante->setId($id);

            $delete = $justificante->delete();
            if ($delete) {
                $_SESSION['deleteJustificante'] = 'complete';
            } else {
                $_SESSION['deleteJustificante'] = 'false';
            }
        } else {
            $_SESSION['deleteJustificante'] = 'false';
        }
        header('Location:' . base_url . 'justificante/gestion');
    }

    public function editar()
    {
        Utils::isIdentity();
        if (isset($_GET['clave']) & isset($_GET['fecha']) & isset($_GET['id'])) {
            $clave = $_GET['clave'];
            $fecha = $_GET['fecha'];
            $id = $_GET['id'];
            $edit = true;

            $justificante = new Justificante();
            $justificante->setClave($clave);
            $justificante->setFecha($fecha);
            $justificante->setId($id);

            $jus = $justificante->getOne();

            require_once 'views/gestion/editarJustificantes.php';
        } else {
            header('Location:' . base_url . 'incidencia/gestion');
        }
    }

    public function editarJustificante()
    {
        Utils::isIdentity();

        if (isset($_POST)) {

            $clave = isset($_GET['clave']) ? $_GET['clave'] : false;
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false;
            $id = isset($_POST['id']) ? $_POST['id'] : false;
            $status = isset($_POST['status']) ? $_POST['status'] : false;

            if ($clave && $fecha && $id && $status) {


                $justificante = new Justificante();
                $justificante->setClave($clave);
                $justificante->setFecha($fecha);
                $justificante->setId($id);
                $justificante->setStatus($status);

                if (isset($_GET['clave']) & isset($_GET['fecha']) & isset($_GET['id'])) {

                    $clave = $_GET['clave'];
                    $fecha = $_GET['fecha'];
                    $id = $_GET['id'];
                    $justificante->setClave($clave);
                    $justificante->setFecha($fecha);
                    $justificante->setId($id);
                    $save = $justificante->edit();
                }

                if ($save) {
                    $_SESSION['editarJustificante'] = "complete";
                    header('Location:' . base_url . 'justificante/gestion');
                } else {
                    $_SESSION['editarJustificante'] = "failed";
                    header('Location:' . base_url . 'justificante/gestion');
                }
            } else {
                $_SESSION['editarJustificante'] = "failed";
                header('Location:' . base_url . 'justificante/gestion');
            }
        } else {
            $_SESSION['editarJustificante'] = "failed";
            header('Location:' . base_url . 'justificante/gestion');
        }
    }
}
ob_end_flush();
