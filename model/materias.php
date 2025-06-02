<?php
class Materias {
    private $_conexion;
    private $_id_materia;
    private $_nombre_materia;
    private $_descripcion;

    function __construct($conexion, $id_materia, $nombre_materia, $descripcion) {
        $this->_conexion = $conexion;
        $this->_id_materia = $id_materia;
        $this->_nombre_materia = $nombre_materia;
        $this->_descripcion = $descripcion;
    }

    function insertar() {
        $insercion = mysqli_query($this->_conexion,
            "INSERT INTO MATERIAS (id_materia, nombre_materia, descripcion)
                    VALUES (null, '$this->_nombre_materia', '$this->_descripcion')");
        return $insercion;
    }

    function actualizar() {
        $actualizacion = mysqli_query($this->_conexion,
            "UPDATE MATERIAS SET nombre_materia='$this->_nombre_materia', descripcion='$this->_descripcion'
                    WHERE id_materia = $this->_id_materia");
        return $actualizacion;
    }

    function eliminar() {
        $eliminacion = mysqli_query($this->_conexion,
            "DELETE FROM MATERIAS WHERE id_materia = $this->_id_materia");
        return $eliminacion;
    }

    function listar() {
        $listado = mysqli_query($this->_conexion,
            "SELECT * FROM MATERIAS ORDER BY id_materia");
        return $listado;
    }
}
?>
