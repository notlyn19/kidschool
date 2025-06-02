<?php
class Cursos {
    private $_conexion;
    private $_id_curso;
    private $_nombre_curso;
    private $_nivel;
    private $_año_escolar;
    private $_director_curso_id;

    function __construct($conexion, $id_curso, $nombre_curso, $nivel, $año_escolar, $director_curso_id) {
        $this->_conexion = $conexion;
        $this->_id_curso = $id_curso;
        $this->_nombre_curso = $nombre_curso;
        $this->_nivel = $nivel;
        $this->_año_escolar = $año_escolar;
        $this->_director_curso_id = $director_curso_id;
    }

    function insertar() {
        $insercion = mysqli_query($this->_conexion, 
            "INSERT INTO CURSOS (id_curso, nombre_curso, nivel, año_escolar, director_curso_id) 
                    VALUES (null, '$this->_nombre_curso', '$this->_nivel', '$this->_año_escolar', '$this->_director_curso_id')");
        return $insercion;
    }

    function actualizar() {
        $actualizacion = mysqli_query($this->_conexion, 
            "UPDATE CURSOS SET nombre_curso='$this->_nombre_curso', nivel='$this->_nivel', 
                    año_escolar='$this->_año_escolar', director_curso_id='$this->_director_curso_id' 
                    WHERE id_curso = $this->_id_curso");
        return $actualizacion;
    }

    function eliminar() {
        $eliminacion = mysqli_query($this->_conexion, 
            "DELETE FROM CURSOS WHERE id_curso = $this->_id_curso");
        return $eliminacion;
    }

    function listar() {
        $listado = mysqli_query($this->_conexion, 
            "SELECT * FROM CURSOS ORDER BY id_curso");
        return $listado;
    }
}
?>
