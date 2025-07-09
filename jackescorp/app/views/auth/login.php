<?php
require_once '../../config/config.php';
require_once '../../controllers/AuthController.php';

$authController = new AuthController();
$error = $authController->login();
?>
<?php
// Al inicio de login.php
$success_message = '';
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $success_message = "Registro exitoso. Ya puedes iniciar sesión.";
}
?>

<!-- En el HTML, antes del formulario -->
<?php if ($success_message): ?>
    <div class="alert alert-success"><?php echo $success_message; ?></div>
<?php endif; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - StyleJackets</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header img {
            width: 100px;
            margin-bottom: 15px;
        }

        .btn-google {
            background-color: #dd4b39;
            color: white;
        }

        .btn-facebook {
            background-color: #3b5998;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-container">
            <div class="login-header">
                <h2>Style<span class="text-primary">Jackets</span></h2>
                <p class="text-muted">Ingresa a tu cuenta</p>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <div class="text-end mt-2">
                        <a href="forgot_password.php" class="text-decoration-none small">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>

                <div class="text-center mb-3">
                    <span class="text-muted">O ingresa con</span>
                </div>

                <div class="d-grid gap-2 mb-4">
                    <button type="button" class="btn btn-google">
                        <i class="fab fa-google me-2"></i> Google
                    </button>
                    <button type="button" class="btn btn-facebook">
                        <i class="fab fa-facebook-f me-2"></i> Facebook
                    </button>
                </div>
            </form>

            <div class="mt-3 text-center">
                <p>¿No tienes una cuenta? <a href="register.php" class="text-decoration-none">Regístrate aquí</a></p>
                <a href="<?php echo BASE_URL; ?>" class="text-decoration-none">
                    <i class="fas fa-arrow-left me-2"></i>Volver al inicio
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Puedes añadir funcionalidad JS aquí si es necesario
        document.addEventListener('DOMContentLoaded', function() {
            // Ejemplo: Validación adicional del formulario
            document.querySelector('form').addEventListener('submit', function(e) {
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;

                if (!email || !password) {
                    e.preventDefault();
                    alert('Por favor completa todos los campos');
                }
            });

            // Ejemplo: Manejo de botones de redes sociales
            document.querySelector('.btn-google').addEventListener('click', function() {
                alert('Inicio de sesión con Google (implementar lógica real)');
            });

            document.querySelector('.btn-facebook').addEventListener('click', function() {
                alert('Inicio de sesión con Facebook (implementar lógica real)');
            });
        });
    </script>
</body>

</html>