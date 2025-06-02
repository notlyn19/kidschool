<?php
class Docentes {
    private $_conexion;
    private $_id_docente;
    private $_id_usuario;
    private $_nombre_completo;
    private $_documento;
    private $_correo;
    private $_telefono;
    private $_especialidad;

    function __construct($conexion, $id_docente, $id_usuario, $nombre_completo, $documento, $correo, $telefono, $especialidad) {
        $this->_conexion = $conexion;
        $this->_id_docente = $id_docente;
        $this->_id_usuario = $id_usuario;
        $this->_nombre_completo = $nombre_completo;
        $this->_documento = $documento;
        $this->_correo = $correo;
        $this->_telefono = $telefono;
        $this->_especialidad = $especialidad;
    }

    function insertar() {
        $insercion = mysqli_query($this->_conexion,
            "INSERT INTO DOCENTES (id_docente, id_usuario, nombre_completo, documento, correo, telefono, especialidad)
                    VALUES (null, '$this->_id_usuario', '$this->_nombre_completo', '$this->_documento', 
                            '$this->_correo', '$this->_telefono', '$this->_especialidad')");
        return $insercion;
    }

    function actualizar() {
        $actualizacion = mysqli_query($this->_conexion,
            "UPDATE DOCENTES SET id_usuario='$this->_id_usuario', nombre_completo='$this->_nombre_completo',
                    documento='$this->_documento', correo='$this->_correo', telefono='$this->_telefono', especialidad='$this->_especialidad' 
                    WHERE id_docente = $this->_id_docente");
        return $actualizacion;
    }

    function eliminar() {
        $eliminacion = mysqli_query($this->_conexion,
            "DELETE FROM DOCENTES WHERE id_docente = $this->_id_docente");
        return $eliminacion;
    }

    function listar() {
        $listado = mysqli_query($this->_conexion,
            "SELECT * FROM DOCENTES ORDER BY id_docente");
        return $listado;
    }
}
?>
