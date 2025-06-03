<?php
session_start();
include_once '../conexion.php';
$objeto_conexion = new Conexion();
$conn = $objeto_conexion->conectar();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["correo"]) || empty($_POST["contraseña"])) {
        $_SESSION['mensaje_error'] = "⚠️ Por favor complete todos los campos.";
        header("Location: index.php");
        exit();
    }

    $correoInput = trim($_POST["correo"]);
    $contraseñaInput = trim($_POST["contraseña"]);

    include_once '../model/usuarios.php';
    $usuarioObj = new Usuario($conn, null, null, null, null, null, null, null, null, null);
    $resultado = $usuarioObj->listarPorCorreo($correoInput);


    if (mysqli_num_rows($resultado) > 0) {
    $usuario = mysqli_fetch_assoc($resultado);

        // Verificar contraseña
        if (password_verify($contraseñaInput, $usuario["contraseña"])) {
            // Guardar datos de sesión
            $_SESSION["usuario_id"] = $usuario["id_usuario"];
            $_SESSION["nombre_usuario"] = $usuario["nombre_usuario"];
            $_SESSION["correo"] = $usuario["correo"];
            $_SESSION["rol"] = $usuario["rol"];

            // Redirigir según el rol
            if ($usuario["rol"] == 1) {
                // Rol 1: Administrador / Docente
                $conn->close();
                header("Location: panel_admin.php");
                exit();
            } elseif ($usuario["rol"] == 2) {
                // Rol 2: Estudiante
                $conn->close();
                header("Location: panel_estudiante.php");
                exit();
            } else {
                // Rol desconocido
                $conn->close();
                $_SESSION['mensaje_error'] = "⚠️ Tipo de usuario no válido.";
                header("Location: index.php");
                exit();
            }
        } else {
            // Contraseña incorrecta
            $conn->close();
            $_SESSION['mensaje_error'] = "⚠️ Contraseña incorrecta. Inténtelo de nuevo.";
            header("Location: index.php");
            exit();
        }
    } else {
        // Usuario no encontrado
        $conn->close();
        $_SESSION['mensaje_error'] = "⚠️ Usuario no encontrado.";
        header("Location: index.php");
        exit();
    }

} else {
    // Si acceden sin método POST, redirigir a index
    header("Location: index.php");
    exit();
}
?>
