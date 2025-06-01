<?php
class Estudiante {
    private $_conexion;
    private $_id_estudiante;
    private $_id_usuario;
    private $_nombre_completo;
    private $_documento;
    private $_fecha_nacimiento;
    private $_genero;
    private $_direccion;
    private $_telefono;
    private $_correo;
    private $_curso_actual_id;
    private $_fecha_matricula;

    function __construct(
        $conexion, 
        $id_estudiante, 
        $id_usuario, 
        $nombre_completo, 
        $documento, 
        $fecha_nacimiento, 
        $genero, 
        $direccion, 
        $telefono, 
        $correo, 
        $curso_actual_id, 
        $fecha_matricula
    ) {
        $this->_conexion = $conexion;
        $this->_id_estudiante = $id_estudiante;
        $this->_id_usuario = $id_usuario;
        $this->_nombre_completo = $nombre_completo;
        $this->_documento = $documento;
        $this->_fecha_nacimiento = $fecha_nacimiento;
        $this->_genero = $genero;
        $this->_direccion = $direccion;
        $this->_telefono = $telefono;
        $this->_correo = $correo;
        $this->_curso_actual_id = $curso_actual_id;
        $this->_fecha_matricula = $fecha_matricula;
    }

}
?>
