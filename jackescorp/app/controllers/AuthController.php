<?php
require_once(__DIR__ . '/../models/database.php');
require_once(__DIR__ . '/../models/user.php');
require_once(__DIR__ . '/../config/config.php');

class AuthController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    // Método existente para login
    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            if($this->user->login($email, $password)) {
                header('Location: ' . DASHBOARD_URL);
                exit();
            } else {
                return "Email o contraseña incorrectos";
            }
        }
        return null;
    }

    // Nuevo método para registro
public function register() {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';
        
        // Validaciones básicas
        if(empty($email) || empty($password) || empty($confirm_password)) {
            return "Todos los campos son requeridos";
        }
        
        if($password !== $confirm_password) {
            return "Las contraseñas no coinciden";
        }
        
        if(strlen($password) < 6) {
            return "La contraseña debe tener al menos 6 caracteres";
        }
        
        // Intentar registro
        $result = $this->user->register($email, $password);
        
        if($result === true) {
            // Redirigir al login con mensaje de éxito
            header('Location: login.php?success=1');
            exit();
        } else {
            return $result;
        }
    }
    return null;
}

    // Método existente para logout
    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL);
        exit();
    }
}
?>