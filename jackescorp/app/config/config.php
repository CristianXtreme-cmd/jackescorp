<?php
// Configuración de la base de datos
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3307');
define('DB_NAME', 'jackescorp');
define('DB_USER', 'root'); // Cambiar por tu usuario
define('DB_PASS', '');     // Cambiar por tu contraseña

// Configuración de la aplicación
define('BASE_URL', 'http://localhost/jackescorp'); // Cambiar por tu URL base
define('LOGIN_URL', BASE_URL . '/app/views/auth/login.php');
define('DASHBOARD_URL', 'http://localhost/jackescorp/dashboard.php');

// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>