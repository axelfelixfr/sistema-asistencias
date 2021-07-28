<?php

class Justificante
{
    private $id;
    private $descripcion;
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
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $this->db->real_escape_string($id);

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);

        return $this;
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
        $this->status = $this->db->real_escape_string($status);

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
        $this->clave = $this->db->real_escape_string($clave);

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
        $this->tipo = $this->db->real_escape_string($tipo);

        return $this;
    }

    public function save()
    {
        $sql = "INSERT INTO CJUSASI VALUES('{$this->getId()}', '{$this->getDescripcion()}', '{$this->getStatus()}', NULL, NULL, NULL, NULL);";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function getAllDocuments()
    {
        $sql = "SELECT NIDTPJU, CDESJUS, CSTATUS FROM CJUSASI ORDER BY NIDTPJU ASC;";
        $justificantes = $this->db->query($sql);
        return $justificantes;
    }

    public function getOne()
    {
        $justificante = $this->db->query("SELECT * FROM PJUSASI WHERE CCVEEMP={$this->clave} AND DFECINC='{$this->fecha}' AND NIDTPJU={$this->id}");
        return $justificante->fetch_object();
        // SELECT * FROM pjusasi WHERE CCVEEMP=000300 AND DFECINC='2021-06-29' AND NIDTPJU=56
    }

    public function insert()
    {
        $sql = "INSERT INTO PJUSASI VALUES('{$this->getClave()}', '{$this->getFecha()}', '{$this->getId()}', '{$this->getStatus()}', NULL, NULL, NULL, NULL);";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function edit()
    {
        $sql = "UPDATE PJUSASI SET CSTATUS='{$this->getStatus()}', NIDTPJU ='{$this->getId()}' ";

        $sql .= " WHERE CCVEEMP={$this->clave} AND DFECINC='{$this->fecha}' AND NIDTPJU={$this->id};";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        // Consulta correcta:
        // UPDATE PJUSASI SET CSTATUS='A', NIDTPJU=2 WHERE CCVEEMP=000300 AND DFECINC='2021-06-29' AND NIDTPJU=56;

        // Consulta incorrecta:
        // UPDATE PJUSASI SET DFECINC ='2021-07-03', CSTATUS='A', NIDTPJU=2 WHERE CCVEEMP=000300 AND DFECINC='2021-06-29' AND NIDTPJU=56;
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM PJUSASI WHERE CCVEEMP={$this->clave} AND DFECINC='{$this->fecha}' AND NIDTPJU={$this->id}";
        $delete = $this->db->query($sql);
        // DELETE FROM PJUSASI WHERE CCVEEMP=600351 AND DFECINC='2021-06-22' AND NIDTPJU=5
        $result = false;

        if ($delete) {
            $result = true;
        }
        return $result;
    }

    public function getAll()
    {
        $justifiEmpleados = $this->db->query("SELECT justificantes.*, empleados.CCVEEMP, CNOMBRE, CAPEUNO FROM PJUSASI justificantes INNER JOIN DDATEMP empleados ON justificantes.CCVEEMP = empleados.CCVEEMP");
        return $justifiEmpleados;
    }
}
