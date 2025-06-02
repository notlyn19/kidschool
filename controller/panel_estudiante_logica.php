<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION["usuario_id"]) || $_SESSION["id_tipo_usuario"] != 2) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION["usuario_id"];
$mensaje = "";

// Procesar actualización de datos si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contraseña = trim($_POST["contraseña"]);
    $hash = password_hash($contraseña, PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios SET contraseña = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $hash, $usuario_id);

    if ($stmt->execute()) {
        $mensaje = "Contraseña actualizada correctamente.";
    } else {
        $mensaje = "Error al actualizar: " . $stmt->error;
    }
    $stmt->close();
}

// Consultar datos actuales para mostrar en el formulario
$sql = "SELECT nombre_usuario, correo FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();
$stmt->close();
$conn->close();
?>