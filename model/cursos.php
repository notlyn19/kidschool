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


}
?>
