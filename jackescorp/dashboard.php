<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - StyleJackets</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .welcome-card {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .navbar-brand span {
            color: #667eea;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    // Verificar si el usuario está logueado
    if(!isset($_SESSION['user_id'])) {
        header('Location: app/views/auth/login.php');
        exit();
    }
    ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Style<span>Jackets</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <i class="fas fa-home me-2"></i>Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-shopping-cart me-2"></i>Mis Pedidos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user me-2"></i>Perfil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="app/controllers/logout.php">
                            <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <div class="dashboard-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-4">¡Bienvenido!</h1>
                    <p class="lead">Gestiona tu cuenta y descubre nuevas chaquetas</p>
                </div>
                <div class="col-md-6 text-end">
                    <i class="fas fa-user-circle fa-5x"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row g-4">
            <!-- Tarjeta de Bienvenida -->
            <div class="col-md-8">
                <div class="card welcome-card">
                    <div class="card-body">
                        <h2 class="card-title">
                            <i class="fas fa-star me-2"></i>
                            Panel de Usuario
                        </h2>
                        <p class="card-text">
                            Explora nuestra colección de chaquetas premium y gestiona tu perfil desde aquí.
                        </p>
                        <a href="index.php" class="btn btn-light btn-lg">
                            <i class="fas fa-shopping-bag me-2"></i>
                            Ver Productos
                        </a>
                    </div>
                </div>
            </div>

            <!-- Estadísticas -->
            <div class="col-md-4">
                <div class="card stats-card">
                    <div class="card-body text-center">
                        <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                        <h3>0</h3>
                        <p>Pedidos Realizados</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Acciones Rápidas -->
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="mb-4">Acciones Rápidas</h3>
            </div>
            
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-tshirt fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Productos</h5>
                        <p class="card-text">Gestiona el inventario de chaquetas</p>
                        <a href="app/views/products/products.php" class="btn btn-outline-primary">Gestionar</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-heart fa-3x text-danger mb-3"></i>
                        <h5 class="card-title">Favoritos</h5>
                        <p class="card-text">Tus chaquetas favoritas</p>
                        <a href="#" class="btn btn-outline-danger">Ver Favoritos</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-truck fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Envíos</h5>
                        <p class="card-text">Rastrea tus pedidos</p>
                        <a href="#" class="btn btn-outline-success">Rastrear</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-cog fa-3x text-secondary mb-3"></i>
                        <h5 class="card-title">Configuración</h5>
                        <p class="card-text">Ajustes de tu cuenta</p>
                        <a href="#" class="btn btn-outline-secondary">Configurar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>StyleJackets</h5>
                    <p>Tu tienda de chaquetas premium</p>
                </div>
                <div class="col-md-6 text-end">
                    <div class="social-icons">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2023 StyleJackets. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>