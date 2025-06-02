<?php
include_once '../conexion.php';
$objeto_conexion = new Conexion();
$conn = $objeto_conexion->conectar();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST["id_usuario"];
    // anadi el id usuario aca para que en el formluario lo agregen como hidden, asi cuando el formulario envie la solicitud 
    // la solicitud traiga el id que hay que modificar/eliminar    

    $nombre_usuario = $_POST["nombre_usuario"];
    $documento = $_POST["documento"];
    $correo = $_POST["correo"];
    $contraseña = password_hash($_POST["contraseña"], PASSWORD_DEFAULT);
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $genero = $_POST["genero"];
    $rol = $_POST["id_tipo_usuario"];
    $estado = $_POST["estado"];
    $opcion= $_POST["fEnviar"];

    include_once '../model/usuarios.php';
    $objetoUsuario = new Usuario($conn, $id_usuario, $nombre_usuario, $documento, $correo, $contraseña, $rol, $estado, $genero, $fecha_nacimiento);

    switch ($opcion) {
        case 'insertar':
            //try {
                $objetoUsuario->insertar();
                $mensaje = 'exitoso';
            //} catch (Exception $e) {
            //    $mensaje = 'error';
            //    $error= $e->getMessage();
            //}
            break;

        case 'actualizar':
            try {
                $objetoUsuario->actualizar();
                $mensaje = 'exitoso';
            } catch (Exception $e) {
                $mensaje = 'error';
            }
            break;

        case 'eliminar':
            try {
                $objetoUsuario->eliminar();
                $mensaje = 'exitoso';
            } catch (Exception $e) {
                $mensaje = 'error';
            }
            break;

    }
    header("Location: ../index.php?registro=$mensaje&error=$error");
    $objeto_conexion->desconectar();
}
