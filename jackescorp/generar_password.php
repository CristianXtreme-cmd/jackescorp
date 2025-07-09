<?php
// Archivo temporal para generar el hash correcto
// Ejecuta este archivo una vez para obtener el hash

$password = 'admin123';
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Contraseña: " . $password . "<br>";
echo "Hash generado: " . $hash . "<br><br>";

echo "SQL para insertar/actualizar usuario:<br>";
echo "UPDATE usuarios SET password_hash = '$hash' WHERE email = 'admin@stylejackets.com';<br><br>";

echo "O si no existe el usuario:<br>";
echo "INSERT INTO usuarios (email, password_hash, id_rol, activo) VALUES ('admin@stylejackets.com', '$hash', 1, 1);";
?>