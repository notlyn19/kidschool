<?php
class Salones {
    private $_conexion;
    private $_id_salon;
    private $_nombre_salon;
    private $_capacidad;
    private $_tipo_salon;

    function __construct($conexion, $id_salon, $nombre_salon, $capacidad, $tipo_salon) {
        $this->_conexion = $conexion;
        $this->_id_salon = $id_salon;
        $this->_nombre_salon = $nombre_salon;
        $this->_capacidad = $capacidad;
        $this->_tipo_salon = $tipo_salon;
    }

    function insertar() {
        $insercion = mysqli_query($this->_conexion,
            "INSERT INTO SALONES (id_salon, nombre_salon, capacidad, tipo_salon)
                    VALUES (null, '$this->_nombre_salon', '$this->_capacidad', '$this->_tipo_salon')");
        return $insercion;
    }

    function actualizar() {
        $actualizacion = mysqli_query($this->_conexion,
            "UPDATE SALONES SET nombre_salon='$this->_nombre_salon', capacidad='$this->_capacidad', tipo_salon='$this->_tipo_salon'
                    WHERE id_salon = $this->_id_salon");
        return $actualizacion;
    }

    function eliminar() {
        $eliminacion = mysqli_query($this->_conexion,
            "DELETE FROM SALONES WHERE id_salon = $this->_id_salon");
        return $eliminacion;
    }

    function listar() {
        $listado = mysqli_query($this->_conexion,
            "SELECT * FROM SALONES ORDER BY id_salon");
        return $listado;
    }
}
?>
