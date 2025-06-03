<?php
class Usuario {
    private $_conexion;
    private $_id_usuario;
    private $_nombre_usuario;
    private $_documento;
    private $_correo;
    private $_contraseña;
    private $_rol;
    private $_estado;
    private $_genero;
    private $_fecha_nacimiento;

    function __construct($conexion, $id_usuario, $nombre_usuario, $documento, $correo, $contraseña, $rol, $estado, $genero, $fecha_nacimiento) {
        $this->_conexion = $conexion;
        $this->_id_usuario = $id_usuario;
        $this->_nombre_usuario = $nombre_usuario;
        $this->_documento = $documento;
        $this->_correo = $correo;
        $this->_contraseña = $contraseña;
        $this->_rol = $rol;
        $this->_estado = $estado;
        $this->_genero = $genero;
        $this->_fecha_nacimiento = $fecha_nacimiento;
    } 

    function insertar() {
        $insercion = mysqli_query($this->_conexion,
            "INSERT INTO USUARIOS (id_usuario, nombre_usuario, documento, correo, contraseña, rol, estado, genero, fecha_nacimiento)
                    VALUES (null, '$this->_nombre_usuario', '$this->_documento','$this->_correo', '$this->_contraseña', '$this->_rol', '$this->_estado', '$this->_genero', '$this->_fecha_nacimiento')");
        return $insercion;
    }

    function actualizar() { 
        $actualizacion = mysqli_query($this->_conexion,
            "UPDATE USUARIOS SET nombre_usuario='$this->_nombre_usuario', documento='$this->_documento', correo='$this->_correo', contraseña='$this->_contraseña', rol='$this->_rol', estado='$this->_estado', genero='$this->_genero', fecha_nacimiento='$this->_fecha_nacimiento'
                    WHERE id_usuario = $this->_id_usuario");
        return $actualizacion;
    }

    function eliminar() {
        $eliminacion = mysqli_query($this->_conexion,
            "DELETE FROM USUARIOS WHERE id_usuario = $this->_id_usuario");
        return $eliminacion;
    }

    function listar() {
        $listado = mysqli_query($this->_conexion,
            "SELECT * FROM USUARIOS ORDER BY id_usuario");
        return $listado;
    }
    function listarPorCorreo($correo) {
        $consulta = mysqli_query($this->_conexion,
            "SELECT * FROM USUARIOS WHERE correo = '$correo'");
        return $consulta;
    }
}
?>
