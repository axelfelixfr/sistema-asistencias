<?php

class Utils
{
    public static function deleteSession($name)
    {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }
    public static function isIdentity()
    {
        if (!isset($_SESSION['identity'])) {
            header('Location:' . base_url);
        } else {
            return true;
        }
    }
    public static function showEmployees()
    {
        require_once 'models/usuario.php';
        $usuario = new Usuario();
        $usuarios = $usuario->getAllEmployees();
        return $usuarios;
    }
    public static function showDocuments()
    {
        require_once 'models/justificante.php';
        $justificante = new Justificante();
        $justificantes = $justificante->getAllDocuments();
        return $justificantes;
    }
}
