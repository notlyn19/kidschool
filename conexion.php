<?php
require_once '../config/config.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");

// Crear la base de datos
$sql = "CREATE DATABASE IF NOT EXISTS kidschool";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada correctamente";
} else {
    echo "Error al crear la base de datos: " . $conn->error;
}

$sql = "USE kidschool";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos seleccionada correctamente";
} else {
    echo "Error al seleccionar la base de datos: " . $conn->error;
}

// Tabla de usuarios
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(100) NOT NULL,
    documento VARCHAR(50) NOT NULL UNIQUE,
    correo VARCHAR(100) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    genero ENUM('masculino', 'femenino', 'prefiero_no_decirlo') NOT NULL,
    id_tipo_usuario INT NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla de usuarios creada correctamente";
} else {
    echo "Error al crear la tabla de usuarios: " . $conn->error;
}

// Tabla de tipos de usuario
$sql = "CREATE TABLE IF NOT EXISTS tipos_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla de tipos de usuario creada correctamente";
} else {
    echo "Error al crear la tabla de tipos de usuario: " . $conn->error;
}

// Insertar tipos de usuario básicos
$sql = "INSERT INTO tipos_usuario (id, tipo) VALUES 
(1, 'docente'),
(2, 'estudiante')";

if ($conn->query($sql) === TRUE) {
    echo "Tipos de usuario básicos insertados correctamente";
} else {
    echo "Error al insertar tipos de usuario: " . $conn->error;
}

$conn->close();
?>