<?php
class CursoMateria {
    private $_conexion;
    private $_id_curso_materia;
    private $_id_curso;
    private $_id_materia;

    function __construct($conexion, $id_curso_materia, $id_curso, $id_materia) {
        $this->_conexion = $conexion;
        $this->_id_curso_materia = $id_curso_materia;
        $this->_id_curso = $id_curso;
        $this->_id_materia = $id_materia;
    }

}
?>
