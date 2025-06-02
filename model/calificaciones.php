<?php
class Calificaciones
{
    private $_conexion;
    private $_id_calificacion;
    private $_id_estudiante;
    private $_id_materia;
    private $_id_docente;
    private $_nota;
    private $_fecha_registro;

    function __construct($conexion, $id_calificacion, $id_estudiante, $id_materia, $id_docente, $nota, $fecha_registro)
    {
        $this->_conexion = $conexion;
        $this->_id_calificacion = $id_calificacion;
        $this->_id_estudiante = $id_estudiante;
        $this->_id_materia = $id_materia;
        $this->_id_docente = $id_docente;
        $this->_nota = $nota;
        $this->_fecha_registro = $fecha_registro;
    }

    function insertar()
    {
        $insercion = mysqli_query($this->_conexion, "INSERT INTO CALIFICACIONES (id_calificacion, id_estudiante, id_materia, id_docente, nota, fecha_registro) 
                                                                VALUES (null,'$this->_id_estudiante','$this->_id_materia','$this->_id_docente','$this->_nota','$this->_fecha_registro')");
        return $insercion;
    }

    function actualizar()
    {
        $actualizacion = mysqli_query($this->_conexion, "UPDATE CALIFICACIONS SET id_estudiante='$this->_id_estudiante', id_materia='$this->_id_materia', 
                            id_docente ='$this->_id_docente', nota='$this->_nota, fecha_registro = '$this->_fecha_registro' WHERE id_calificacion = $this->_id_calificacion");
        return $actualizacion;
    }

    function eliminar(){
        $eliminacion = mysqli_query($this->_conexion, "DELETE FROM CALIFICACIONES WHERE id_calificacion = $this->_id_calificacion");
        return $eliminacion;
    }

    function listar(){
        $listado = mysqli_query($this->_conexion,"SELECT * FROM CALIFICACIONES ORDER BY id_calificacion");
        return $listado;
    }
}
