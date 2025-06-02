<?php
class Inscripciones {
    private $_conexion;
    private $_id_inscripcion;
    private $_id_estudiante;
    private $_id_materia;
    private $_id_curso;
    private $_fecha_inscripcion;
    private $_estado_inscripcion;

    function __construct($conexion, $id_inscripcion, $id_estudiante, $id_materia, $id_curso, $fecha_inscripcion, $estado_inscripcion) {
        $this->_conexion = $conexion;
        $this->_id_inscripcion = $id_inscripcion;
        $this->_id_estudiante = $id_estudiante;
        $this->_id_materia = $id_materia;
        $this->_id_curso = $id_curso;
        $this->_fecha_inscripcion = $fecha_inscripcion;
        $this->_estado_inscripcion = $estado_inscripcion;
    }

    function insertar() {
        $insercion = mysqli_query($this->_conexion,
            "INSERT INTO INSCRIPCIONES (id_inscripcion, id_estudiante, id_materia, id_curso, fecha_inscripcion, estado_inscripcion)
                    VALUES (null, '$this->_id_estudiante', '$this->_id_materia', '$this->_id_curso', 
                            '$this->_fecha_inscripcion', '$this->_estado_inscripcion')");
        return $insercion;
    }

    function actualizar() {
        $actualizacion = mysqli_query($this->_conexion,
            "UPDATE INSCRIPCIONES SET id_estudiante='$this->_id_estudiante', id_materia='$this->_id_materia', 
                    id_curso='$this->_id_curso', fecha_inscripcion='$this->_fecha_inscripcion', 
                    estado_inscripcion='$this->_estado_inscripcion' 
                    WHERE id_inscripcion = $this->_id_inscripcion");
        return $actualizacion;
    }

    function eliminar() {
        $eliminacion = mysqli_query($this->_conexion,
            "DELETE FROM INSCRIPCIONES WHERE id_inscripcion = $this->_id_inscripcion");
        return $eliminacion;
    }

    function listar() {
        $listado = mysqli_query($this->_conexion,
            "SELECT * FROM INSCRIPCIONES ORDER BY id_inscripcion");
        return $listado;
    }
}
?>
