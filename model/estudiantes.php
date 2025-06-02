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
        $conexion, $id_estudiante, $id_usuario, $nombre_completo, $documento, $fecha_nacimiento, $genero, $direccion, $telefono, $correo, $curso_actual_id, $fecha_matricula) 
        {
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

    function insertar() {
        $insercion = mysqli_query($this->_conexion,
            "INSERT INTO ESTUDIANTES (id_estudiante, id_usuario, nombre_completo, documento, fecha_nacimiento, genero, direccion, telefono, correo, curso_actual_id, fecha_matricula)
                    VALUES (null, '$this->_id_usuario', '$this->_nombre_completo', '$this->_documento', '$this->_fecha_nacimiento', 
                            '$this->_genero', '$this->_direccion', '$this->_telefono', '$this->_correo', '$this->_curso_actual_id', '$this->_fecha_matricula')");
        return $insercion;
    }

    function actualizar() {
        $actualizacion = mysqli_query($this->_conexion,
            "UPDATE ESTUDIANTES SET id_usuario='$this->_id_usuario', nombre_completo='$this->_nombre_completo', documento='$this->_documento', 
                    fecha_nacimiento='$this->_fecha_nacimiento', genero='$this->_genero', direccion='$this->_direccion', telefono='$this->_telefono', 
                    correo='$this->_correo', curso_actual_id='$this->_curso_actual_id', fecha_matricula='$this->_fecha_matricula'
                    WHERE id_estudiante = $this->_id_estudiante");
        return $actualizacion;
    }

    function eliminar() {
        $eliminacion = mysqli_query($this->_conexion,
            "DELETE FROM ESTUDIANTES WHERE id_estudiante = $this->_id_estudiante");
        return $eliminacion;
    }

    function listar() {
        $listado = mysqli_query($this->_conexion,
            "SELECT * FROM ESTUDIANTES ORDER BY id_estudiante");
        return $listado;
    }
}
?>
