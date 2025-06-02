<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION["usuario_id"]) || $_SESSION["id_tipo_usuario"] != 2) {
    header("Location: panel_estudiante.html");
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

<?php
require_once 'panel_estudiante_logica.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel Estudiante</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <img src="img/LOGO2.png" alt="Logo KidSchool" width="100"/>
        KidSchool
    </header>

    <div class="main-section">
        <div class="form-box">
            <h1>Bienvenido, <?php echo htmlspecialchars($usuario["nombre_usuario"]); ?></h1>
            <p>Correo: <?php echo htmlspecialchars($usuario["correo"]); ?></p>
            
            <?php if($mensaje != ""): ?>
                <p class="mensaje"><strong><?php echo $mensaje; ?></strong></p>
            <?php endif; ?>

            <form method="POST" action="">
                <label for="contraseña">Nueva contraseña:</label>
                <input type="password" id="contraseña" name="contraseña" required>
                <button type="submit">Actualizar contraseña</button>
            </form>

            <a href="logout.php" class="back-link">Cerrar sesión</a>
        </div>
    </div>
</body>
</html>
