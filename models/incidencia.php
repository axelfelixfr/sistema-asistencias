<?php

class Incidencia
{

    private $status;
    private $clave;
    private $fecha;
    private $tipo;
    // Conexión a base de datos
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
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
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function save()
    {
        $sql = "INSERT INTO TINCEMP VALUES('{$this->getClave()}', '{$this->getFecha()}', '{$this->getTipo()}', '{$this->getStatus()}', NULL, NULL, NULL, NULL);";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function getOne()
    {
        $incidencia = $this->db->query("SELECT * FROM TINCEMP WHERE CCVEEMP={$this->clave} AND DFECINC='{$this->fecha}' AND CTIPINC ='{$this->tipo}';");
        return $incidencia->fetch_object();
    }

    public function edit()
    {
        $sql = "UPDATE TINCEMP SET DFECINC='{$this->getFecha()}', CTIPINC ='{$this->getTipo()}', CSTATUS='{$this->getStatus()}'";

        $sql .= " WHERE CCVEEMP={$this->clave} AND DFECINC='{$this->fecha}' AND CTIPINC ='{$this->tipo}';";


        $save = $this->db->query($sql);
        //UPDATE TINCEMP SET DFECINC='2019-06-25', CTIPINC ='W', CSTATUS='W' WHERE CCVEEMP=600351 AND DFECINC='2021-06-21';
        // echo $this->db->error;
        // die();


        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM TINCEMP WHERE CCVEEMP={$this->clave} AND DFECINC='{$this->fecha}' AND CTIPINC ='{$this->tipo}';";
        $delete = $this->db->query($sql);

        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

    public function getAll()
    {
        $incidencias = $this->db->query("SELECT incidencias.*, empleados.CCVEEMP, CNOMBRE, CAPEUNO FROM TINCEMP incidencias INNER JOIN DDATEMP empleados ON incidencias.CCVEEMP = empleados.CCVEEMP");
        return $incidencias;
    }
}
