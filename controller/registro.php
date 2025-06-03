<?php
include_once '../conexion.php';
$objeto_conexion = new Conexion();
$conn = $objeto_conexion->conectar();
//con este solo controlador pueden crear, eliminar, actualizar y consultar usuarios de la base de datos sin la necesidad de el archivo panel_estudiante.php

//para actualizar un usuario deberan listar la informacion del usuario que desean actualizar dentro de un formulario usando una logica como esta:
    // include_once("../modelo/usuarios.php");
    // $objetoUsuario = new Usuario($conn, 0, $nombre_usuario, $documento, $correo, $contraseña, $rol, $estado, $genero, $fecha_nacimiento);
    // $listaUsuarios = $objeetoUsuario->listar();
    // while($unRegistro=mysqli_fetch_array($listaUsuarios)){
    //      echo '<form action="../controller/registro.php" method="post">';
    //      echo '<input type="hidden" name="id_usuario"       value="'.$unRegistro['id_usuario'].'">';
    //      echo '<input type="text"    name="nombre_usuario"    value="'.$unRegistro['nombre_usuario'].'">';
    //      echo '<input type="number" name="documento"     value="'.$unRegistro['documento'].'">';          
    //      // etc etc etc
    //      echo '
    //                <select name="si necesitan un select que traiga datos de una tabla foranea">';
    //                  include_once("../model/tipo_de_usuario.php");
    //                  $objetoTU= new tipoUsuario($conexion,0,'tipo_usuario');
    //                  $listaTU = $objetoTU->listar();
    //                  $opcion=array();
    //                  while($consulta=mysqli_fetch_array($listaTU)){
    //                      $selected='';  
    //                      if($consulta['id_tipo_usuario']==$unRegistro['id_tipo_usuario']){
    //                          $selected='selected';
    //                      }
    //                      $opcion[]='<option value="'.$consulta['id_tipo_usuario'].'" '.$selected.'>'. $consulta['tipo_usuario'].'</option>';
    //                  }
    //                  foreach($opcion as $opcion){
    //                      echo $opcion;
    //                  }
    // echo '<button type="sumbit" name="fEnviar" value="Modificar">Modificar</button>
    // <button type="sumbit" name="fEnviar" value="Eliminar">Eliminar</button>';                   
    // echo '</form>';
    // }     
    
    // ya se que se ve confuso pero esto es una representacion de como listaria los datos de la base de datos y los mostraria en un formulario para que el usuario pueda modificarlos

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
            try {
                $objetoUsuario->insertar();
                $mensaje = 'exitoso';
            } catch (Exception $e) {
                $mensaje = 'error';
                $error= $e->getMessage();
            }
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
    header("Location: ../index.php?registro=$mensaje&descripcion=$error");
    $objeto_conexion->desconectar();
}
