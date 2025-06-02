<?php
session_start();
include_once 'conexion.php';
$objeto_conexion = new Conexion();
$conn = $objeto_conexion->conectar();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["correo"]) || empty($_POST["contraseña"])) {
        $_SESSION['mensaje_error'] = "⚠️ Por favor complete todos los campos.";
        header("Location: index.php");
        exit();
    }

    $correo = trim($_POST["correo"]);
    $contraseña = trim($_POST["contraseña"]);

    // Preparar consulta para evitar inyección SQL
    $sql = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        // Error en preparación de consulta
        $_SESSION['mensaje_error'] = "⚠️ Error del servidor. Intente más tarde.";
        header("Location: index.php");
        exit();
    }

    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        // Verificar contraseña con password_verify()
        if (password_verify($contraseña, $usuario["contraseña"])) {
            // Login exitoso: guardar datos de usuario en sesión
            $_SESSION["usuario_id"] = $usuario["id"];
            $_SESSION["nombre_usuario"] = $usuario["nombre_usuario"];
            $_SESSION["correo"] = $usuario["correo"];
            $_SESSION["id_tipo_usuario"] = $usuario["id_tipo_usuario"];

            // Redirigir según tipo de usuario
            if ($usuario["id_tipo_usuario"] == 1) {
                $stmt->close();
                $conn->close();
                header("Location: panel_admin.php");  // Docente
                exit();
            } else if ($usuario["id_tipo_usuario"] == 2) {
                $stmt->close();
                $conn->close();
                header("Location: panel_estudiante.php");  // Estudiante
                exit();
            } else {
                $stmt->close();
                $conn->close();
                $_SESSION['mensaje_error'] = "⚠️ Tipo de usuario no válido.";
                header("Location: index.php");
                exit();
            }
        } else {
            $stmt->close();
            $conn->close();
            // Contraseña incorrecta
            $_SESSION['mensaje_error'] = "⚠️ Contraseña incorrecta. Inténtelo de nuevo.";
            header("Location: index.php");
            exit();
        }
    } else {
        $stmt->close();
        $conn->close();
        // Usuario no encontrado
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
