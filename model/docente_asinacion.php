<?php
class Asignacion {
    private $_conexion;
    private $_id_asignacion;
    private $_id_docente;
    private $_id_materia;
    private $_id_curso;
    private $_año_escolar;

    function __construct($conexion, $id_asignacion, $id_docente, $id_materia, $id_curso, $año_escolar) {
        $this->_conexion = $conexion;
        $this->_id_asignacion = $id_asignacion;
        $this->_id_docente = $id_docente;
        $this->_id_materia = $id_materia;
        $this->_id_curso = $id_curso;
        $this->_año_escolar = $año_escolar;
    }

    function insertar() {
        $insercion = mysqli_query($this->_conexion, 
            "INSERT INTO ASIGNACION (id_asignacion, id_docente, id_materia, id_curso, año_escolar)
                    VALUES (null, '$this->_id_docente', '$this->_id_materia', '$this->_id_curso', '$this->_año_escolar')");
        return $insercion;
    }

    function actualizar() {
        $actualizacion = mysqli_query($this->_conexion, 
            "UPDATE ASIGNACION SET id_docente='$this->_id_docente', id_materia='$this->_id_materia',
                    id_curso='$this->_id_curso', año_escolar='$this->_año_escolar' 
                    WHERE id_asignacion = $this->_id_asignacion");
        return $actualizacion;
    }

    function eliminar() {
        $eliminacion = mysqli_query($this->_conexion, 
            "DELETE FROM ASIGNACION WHERE id_asignacion = $this->_id_asignacion");
        return $eliminacion;
    }

    function listar() {
        $listado = mysqli_query($this->_conexion, 
            "SELECT * FROM ASIGNACION ORDER BY id_asignacion");
        return $listado;
    }
}
?>
