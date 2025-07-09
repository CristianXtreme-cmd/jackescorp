<?php
class User {
    private $conn;
    private $table_name = "usuarios";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function login($email, $password) {
        $query = "SELECT id_usuario, email, password_hash, id_rol FROM " . $this->table_name . " WHERE email = ? AND activo = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if(password_verify($password, $row['password_hash'])) {
                // Guardar datos del usuario en la sesión
                $_SESSION['user_id'] = $row['id_usuario'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_rol'] = $row['id_rol'];
                $_SESSION['logged_in'] = true;
                
                return true;
            }
        }
        return false;
    }

    public function register($email, $password) {
        // Verificar si el email ya existe
        $query = "SELECT id_usuario FROM " . $this->table_name . " WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return "El email ya está registrado";
        }

        // Insertar nuevo usuario (por defecto rol cliente = 2)
        $query = "INSERT INTO " . $this->table_name . " (email, password_hash, id_rol, activo) VALUES (?, ?, 2, 1)";
        $stmt = $this->conn->prepare($query);
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $hashed_password);

        if($stmt->execute()) {
            return true;
        }
        
        return "Error al registrar el usuario";
    }

    public function getUserById($id) {
        $query = "SELECT u.*, r.nombre as rol_nombre FROM " . $this->table_name . " u 
                  LEFT JOIN roles r ON u.id_rol = r.id_rol 
                  WHERE u.id_usuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>