<?php
require_once '../../config/config.php';
require_once '../../controllers/AuthController.php';

$authController = new AuthController();
$error = $authController->register();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - StyleJackets</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .register-header img {
            width: 100px;
            margin-bottom: 15px;
        }
        .password-strength {
            height: 5px;
            margin-top: 5px;
            background: #eee;
            border-radius: 3px;
            overflow: hidden;
        }
        .password-strength-bar {
            height: 100%;
            width: 0;
            background: #dc3545;
            transition: width 0.3s, background 0.3s;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <div class="register-header">
                <h2>Style<span class="text-primary">Jackets</span></h2>
                <p class="text-muted">Crea tu cuenta</p>
            </div>
            
            <?php if($error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST" action="" id="registerForm">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required minlength="6">
                    <div class="password-strength mt-2">
                        <div class="password-strength-bar" id="passwordStrengthBar"></div>
                    </div>
                    <small class="text-muted">Mínimo 6 caracteres</small>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required minlength="6">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </div>
            </form>
            
            <div class="mt-3 text-center">
                <p>¿Ya tienes una cuenta? <a href="login.php" class="text-decoration-none">Inicia sesión</a></p>
                <a href="<?php echo BASE_URL; ?>" class="text-decoration-none">
                    <i class="fas fa-arrow-left me-2"></i>Volver al inicio
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Validación de contraseña en tiempo real
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthBar = document.getElementById('passwordStrengthBar');
            let strength = 0;
            
            if(password.length > 0) strength += 20;
            if(password.length >= 6) strength += 20;
            if(password.match(/[a-z]/)) strength += 20;
            if(password.match(/[A-Z]/)) strength += 20;
            if(password.match(/[0-9]/)) strength += 20;
            
            strengthBar.style.width = strength + '%';
            
            if(strength < 40) {
                strengthBar.style.backgroundColor = '#dc3545'; // Rojo
            } else if(strength < 80) {
                strengthBar.style.backgroundColor = '#ffc107'; // Amarillo
            } else {
                strengthBar.style.backgroundColor = '#28a745'; // Verde
            }
        });
        
        // Validación del formulario antes de enviar
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            
            if(password !== confirmPassword) {
                e.preventDefault();
                alert('Las contraseñas no coinciden');
                return false;
            }
            
            if(password.length < 6) {
                e.preventDefault();
                alert('La contraseña debe tener al menos 6 caracteres');
                return false;
            }
            
            return true;
        });
    </script>
</body>
</html>