<?php
// Función para limpiar datos de entrada
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Función para validar correo
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Función para verificar si el usuario está autenticado
function isAuthenticated() {
    return isset($_SESSION['usuario_id']);
}

// Función para obtener el tipo de usuario
function getUserType() {
    return $_SESSION['id_tipo_usuario'] ?? null;
}