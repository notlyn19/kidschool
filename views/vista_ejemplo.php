<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Estudiante</title>
</head>
<body>
    <div style="display: flex;justify-content: center;">
        <div>
            <table style="box-shadow:5px 5px 5px 5px rgb(0 0 0 / 14%), 0 3px 1px -2px rgb(0 0 0 / 12%), 0 1px 5px 0 rgb(0 0 0 / 20%);border: solid green;border-radius: 5px;">
                <tbody>
                    <tr>
                        <th scope="col" style="padding: 1%;">
                            Nombre Usuario
                        </th>
                        <th scope="col" style="padding: 1%;">
                            Documento
                        </th>
                        <th scope="col" style="padding: 1%;">
                            correo
                        </th>
                        <th scope="col" style="padding: 1%;">
                            Rol
                        </th>
                        <th scope="col" style="padding: 1%;">
                            Estado
                        </th>
                        <th scope="col" style="padding: 1%;">
                            Genero
                        </th>
                        <th scope="col" style="padding: 1%;">
                            Fecha de Nacimiento
                        </th>
                    </tr>
                    <?php
                        include_once("../conexion.php");
                        $objetoConexion = new Conexion();
                        $conexion = $objetoConexion->conectar();
                        include_once("../model/usuarios.php");
                        $objetoUsuario = new Usuario($conexion, 0, 'nombre_usuario', 0, 'correo', 'contraseña', 0, 0, 'genero', '2025-02-01');
                        $listaUsuarios = $objetoUsuario->listar(); // listar los usuarios de la base de datos en un array
                        while ($unUsuario=mysqli_fetch_array($listaUsuarios)){ // recorrer el array de usuarios
                            echo '<tr><form action="../controller/registro.php" method="post">'; // ejecutar el controlador registro.php que se encarga de registrar/modificar/eliminar el usuario
                            echo '<td> <input type="hidden" name="id_usuario" value="'.$unUsuario["id_usuario"].'">'; //en value traemos la info que ya existe de en la base de datos, en tal caso de que modifique,
                                                                                                                       // el valor modificado sera el que se envie a la base de datos
                            echo '     <input type="text" name="nombre_usuario" value="'.$unUsuario["nombre_usuario"].'"></td>';
                            echo '<td> <input type="number" name="documento" value="'.$unUsuario["documento"].'"></td>';
                            echo '<td> <input type="text" name="correo" value="'.$unUsuario["correo"].'"></td>';
                            echo '<td> <input type="number" name="rol" value="'.$unUsuario["rol"].'"></td>';
                            echo '<td> <input type="number" name="estado" value="'.$unUsuario["estado"].'"></td>';
                            echo '<td> <select name="genero" style="width: 100%" required>
                                    <option value="'.$unUsuario["genero"].'" disabled selected>'.$unUsuario["genero"].'</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                    <option value="prefiero_no_decirlo">Prefiero no decirlo</option>
                                    </select></td>';
                            echo '<td> <input type="date" style="width: 90%" name="fecha_nacimiento" value="'.$unUsuario["fecha_nacimiento"].'"></td>';
                            echo '<td><button type="sumbit" name="fEnviar" value="actualizar">Modificar</button>
                                        <button type="sumbit" name="fEnviar" value="eliminar">Eliminar</button></td>';                   
                            echo '</form></tr>';
                        }

                    ?>
                    <tr>
                    <form id="fIngresarFruta" action="../controller/registro.php" method="post">
                        <td>
                            <input  type="text" name="nombre_usuario">
                        </td>
                        <td>
                            <input type="number" name="documento">
                        </td>
                        <td>
                            <input type="text" name="correo">
                        </td>
                        <td>
                            <input type="number" name="rol">
                        </td>
                        <td>
                            <input type="number" name="estado">
                        </td>
                        <td>
                            <select name="genero" style="width: 100%" required>
                                <option value="" disabled selected>Género</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                                <option value="prefiero_no_decirlo">Prefiero no decirlo</option>
                            </select>
                        </td>
                        <td>
                            <input type="date" style="width: 90%" name="fecha_nacimiento">
                        </td>
                        <td>
                            <button type="sumbit" name="fEnviar" value="insertar">
                                Enviar
                            </button>
                            <button type="reset" name="fEnviar" value="Limpiar">
                                Reset
                            </button>
                        </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
        mysqli_free_result($listaUsuarios);
        $objetoConexion->desconectar();
    ?>  
</body>
</html>

