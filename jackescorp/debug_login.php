<?php
require_once 'app/config/config.php';
require_once 'app/models/database.php';

// Debug del login
$email = 'admin@stylejackets.com';
$password = 'admin123';

try {
    $database = new Database();
    $conn = $database->getConnection();
    
    echo "<h3>Debug del Login</h3>";
    
    // Verificar conexión a BD
    echo "1. Conexión a BD: " . ($conn ? "✓ Exitosa" : "✗ Fallida") . "<br><br>";
    
    // Buscar usuario
    $query = "SELECT id_usuario, email, password_hash, id_rol FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $email);
    $stmt->execute();
    
    echo "2. Usuario encontrado: ";
    if($stmt->rowCount() > 0) {
        echo "✓ Sí<br>";
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        echo "   - ID: " . $user['id_usuario'] . "<br>";
        echo "   - Email: " . $user['email'] . "<br>";
        echo "   - Rol: " . $user['id_rol'] . "<br>";
        echo "   - Hash almacenado: " . substr($user['password_hash'], 0, 20) . "...<br><br>";
        
        // Verificar contraseña
        echo "3. Verificación de contraseña: ";
        if(password_verify($password, $user['password_hash'])) {
            echo "✓ Contraseña correcta<br>";
        } else {
            echo "✗ Contraseña incorrecta<br>";
            echo "   - Contraseña ingresada: '$password'<br>";
            echo "   - Hash actual: " . $user['password_hash'] . "<br>";
            echo "   - Hash nuevo generado: " . password_hash($password, PASSWORD_DEFAULT) . "<br>";
        }
    } else {
        echo "✗ No encontrado<br>";
        echo "   Usuarios existentes:<br>";
        
        $query2 = "SELECT email FROM usuarios";
        $stmt2 = $conn->prepare($query2);
        $stmt2->execute();
        $users = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($users as $u) {
            echo "   - " . $u['email'] . "<br>";
        }
    }
    
} catch(Exception $e) {
    echo "Error: " . $e->getMessage();
}

echo "<br><h4>Soluciones:</h4>";
echo "1. Ejecuta generar_password.php para obtener el hash correcto<br>";
echo "2. Actualiza la BD con el nuevo hash<br>";
echo "3. Verifica que la tabla 'usuarios' tenga la estructura correcta<br>";
?>