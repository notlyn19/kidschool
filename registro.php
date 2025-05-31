<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST["nombre_usuario"];
    $documento = $_POST["documento"];
    $correo = $_POST["correo"];
    $contraseña = password_hash($_POST["contraseña"], PASSWORD_DEFAULT);
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $genero = $_POST["genero"];
    $id_tipo_usuario = $_POST["id_tipo_usuario"];

    $sql = "INSERT INTO usuarios (nombre_usuario, documento, correo, contraseña, fecha_nacimiento, genero, id_tipo_usuario)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $nombre_usuario, $documento, $correo, $contraseña, $fecha_nacimiento, $genero, $id_tipo_usuario);

    if ($stmt->execute()) {
        header("Location: index.php?registro=exitoso");
        exit();
    } else {
        echo "Error al registrar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
