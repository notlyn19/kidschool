<?php
class CursoMateria
{
    private $_conexion;
    private $_id_curso_materia;
    private $_id_curso;
    private $_id_materia;

    function __construct($conexion, $id_curso_materia, $id_curso, $id_materia)
    {
        $this->_conexion = $conexion;
        $this->_id_curso_materia = $id_curso_materia;
        $this->_id_curso = $id_curso;
        $this->_id_materia = $id_materia;
    }

    function insertar()
    {
        $insercion = mysqli_query(
            $this->_conexion,
            "INSERT INTO CURSO_MATERIA (id_curso_materia, id_curso, id_materia) 
                    VALUES (null, '$this->_id_curso', '$this->_id_materia')"
        );
        return $insercion;
    }

    function actualizar()
    {
        $actualizacion = mysqli_query(
            $this->_conexion,
            "UPDATE CURSO_MATERIA SET id_curso='$this->_id_curso', id_materia='$this->_id_materia' 
                    WHERE id_curso_materia = $this->_id_curso_materia"
        );
        return $actualizacion;
    }

    function eliminar()
    {
        $eliminacion = mysqli_query(
            $this->_conexion,
            "DELETE FROM CURSO_MATERIA WHERE id_curso_materia = $this->_id_curso_materia"
        );
        return $eliminacion;
    }

    function listar()
    {
        $listado = mysqli_query(
            $this->_conexion,
            "SELECT * FROM CURSO_MATERIA ORDER BY id_curso_materia"
        );
        return $listado;
    }
}
