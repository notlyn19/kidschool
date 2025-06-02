<?php
class TipoUsuario {
    private $_conexion;
    private $_id_tipo_usuario;
    private $_tipo_usuario;

    function __construct($conexion, $id_tipo_usuario, $tipo_usuario) {
        $this->_conexion = $conexion;
        $this->_id_tipo_usuario = $id_tipo_usuario;
        $this->_tipo_usuario = $tipo_usuario;
    }

    function insertar() {
        $insercion = mysqli_query($this->_conexion,
            "INSERT INTO TIPO_USUARIO (id_tipo_usuario, tipo_usuario)
                    VALUES (null, '$this->_tipo_usuario')");
        return $insercion;
    }

    function actualizar() {
        $actualizacion = mysqli_query($this->_conexion,
            "UPDATE TIPO_USUARIO SET tipo_usuario='$this->_tipo_usuario'
                    WHERE id_tipo_usuario = $this->_id_tipo_usuario");
        return $actualizacion;
    }

    function eliminar() {
        $eliminacion = mysqli_query($this->_conexion,
            "DELETE FROM TIPO_USUARIO WHERE id_tipo_usuario = $this->_id_tipo_usuario");
        return $eliminacion;
    }

    function listar() {
        $listado = mysqli_query($this->_conexion,
            "SELECT * FROM TIPO_USUARIO ORDER BY id_tipo_usuario");
        return $listado;
    }
}
?>
