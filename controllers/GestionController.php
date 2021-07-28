<?php
ob_start();

class gestionController
{

    public function index()
    {
        Utils::isIdentity();
        require_once 'views/gestion/menu.php';
    }
}
ob_end_flush();
