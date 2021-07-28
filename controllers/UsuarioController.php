<?php
ob_start();
require_once 'models/usuario.php';

class usuarioController
{
    public function index()
    {
        require_once 'views/usuario/login.php';
    }

    public function login()
    {
        if (isset($_POST)) {
            // Identificar al usuario
            // Consulta a la base de datos
            $usuario = new Usuario();
            $usuario->setClave($_POST['clave']);
            $usuario->setCurp($_POST['curp']);

            $identity = $usuario->login();

            // var_dump($identity);
            // die();

            // Crear una sesión
            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;
                $_SESSION['error_login'] = 'nothing';
                header('Location:' . base_url . 'gestion/index');
            } else {
                $_SESSION['error_login'] = 'complete';
                header('Location:' . base_url);
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }

        header("Location:" . base_url);
    }
}
ob_end_flush();
