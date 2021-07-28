<?php
class Usuario
{

    private $clave;
    private $nombre;
    private $papellido;
    private $sapellido;
    private $curp;

    // Conexión a base de datos
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * Get the value of clave
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set the value of clave
     *
     * @return  self
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of papellido
     */
    public function getPapellido()
    {
        return $this->papellido;
    }

    /**
     * Set the value of papellido
     *
     * @return  self
     */
    public function setPapellido($papellido)
    {
        $this->papellido = $papellido;

        return $this;
    }

    /**
     * Get the value of sapellido
     */
    public function getSapellido()
    {
        return $this->sapellido;
    }

    /**
     * Set the value of sapellido
     *
     * @return  self
     */
    public function setSapellido($sapellido)
    {
        $this->sapellido = $sapellido;

        return $this;
    }

    /**
     * Get the value of curp
     */
    public function getCurp()
    {
        return $this->curp;
    }

    /**
     * Set the value of curp
     *
     * @return  self
     */
    public function setCurp($curp)
    {
        $this->curp = $curp;

        return $this;
    }

    public function login()
    {
        $result = false;
        $clave = $this->clave;
        $curp = $this->curp;

        // Comprobar si existe el usuario
        $sql = "SELECT * FROM DDATEMP WHERE CCVEEMP = '$clave' AND CCURPEM = '$curp'";
        $login = $this->db->query($sql);


        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();

            $result = $usuario;
        }
        return $result;
    }

    public function getAllEmployees()
    {
        $sql = "SELECT CCVEEMP, CNOMBRE, CAPEUNO, CAPEDOS FROM DDATEMP ORDER BY CCVEEMP ASC;";
        $usuarios = $this->db->query($sql);
        return $usuarios;
    }
}
