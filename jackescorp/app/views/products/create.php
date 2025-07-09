<?php
require_once(__DIR__ . '../../../config/config.php');
require_once(__DIR__ . '/../../controllers/ProductController.php');

// Verificar login y permisos de admin
if(!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

if(!isset($_SESSION['user_rol']) || $_SESSION['user_rol'] != 1) {
    header('Location: products.php');
    exit();
}

$productController = new ProductController();
$error = $productController->store();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto - StyleJackets</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .navbar-brand span {
            color: #667eea;
        }
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
        }
        .image-preview {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="../../../dashboard.php">Style<span>Jackets</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../../../dashboard.php">
                            <i class="fas fa-home me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">
                            <i class="fas fa-box me-2"></i>Productos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../controllers/logout.php">
                            <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5">Crear Nuevo Producto</h1>
                    <p class="lead">Agrega una nueva chaqueta al inventario</p>
                </div>
                <div class="col-md-4 text-end">
                    <a href="products.php" class="btn btn-light">
                        <i class="fas fa-arrow-left me-2"></i>Volver a Productos
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-plus me-2"></i>Información del Producto
                        </h5>
                    </div>
                    <div class="card-body">
                        <?php if($error): ?>
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-circle me-2"></i><?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="" id="productForm">
                            <div class="row">
                                <!-- Información básica -->
                                <div class="col-md-6">
                                    <h6 class="text-primary mb-3">
                                        <i class="fas fa-info-circle me-2"></i>Información Básica
                                    </h6>
                                    
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre del Producto *</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required 
                                               placeholder="Ej: Chaqueta de Cuero Premium">
                                    </div>

                                    <div class="mb-3">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion" rows="4" 
                                                  placeholder="Descripción detallada del producto..."></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="precio" class="form-label">Precio *</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">$</span>
                                                    <input type="number" class="form-control" id="precio" name="precio" 
                                                           step="0.01" min="0" required placeholder="0.00">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="stock" class="form-label">Stock *</label>
                                                <input type="number" class="form-control" id="stock" name="stock" 
                                                       min="0" required placeholder="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Detalles del producto -->
                                <div class="col-md-6">
                                    <h6 class="text-primary mb-3">
                                        <i class="fas fa-tags me-2"></i>Detalles del Producto
                                    </h6>

                                    <div class="mb-3">
                                        <label for="talla" class="form-label">Talla</label>
                                        <select class="form-select" id="talla" name="talla">
                                            <option value="">Seleccionar talla</option>
                                            <option value="XS">XS</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="color" class="form-label">Color</label>
                                        <input type="text" class="form-control" id="color" name="color" 
                                               placeholder="Ej: Negro, Azul marino, Café">
                                    </div>

                                    <div class="mb-3">
                                        <label for="material" class="form-label">Material</label>
                                        <input type="text" class="form-control" id="material" name="material" 
                                               placeholder="Ej: Cuero genuino, Algodón, Poliéster">
                                    </div>

                                    <div class="mb-3">
                                        <label for="imagen_url" class="form-label">URL de Imagen</label>
                                        <input type="url" class="form-control" id="imagen_url" name="imagen_url" 
                                               placeholder="https://ejemplo.com/imagen.jpg"
                                               onchange="previewImage()">
                                        <div id="imagePreview" class="mt-2"></div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="activo" name="activo" checked>
                                            <label class="form-check-label" for="activo">
                                                Producto activo
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Botones -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <a href="products.php" class="btn btn-secondary">
                                            <i class="fas fa-times me-2"></i>Cancelar
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>Crear Producto
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Preview de imagen
        function previewImage() {
            const url = document.getElementById('imagen_url').value;
            const preview = document.getElementById('imagePreview');
            
            if (url) {
                preview.innerHTML = `<img src="${url}" class="image-preview" alt="Preview" onerror="this.style.display='none'">`;
            } else {
                preview.innerHTML = '';
            }
        }

        // Validación del formulario
        document.getElementById('productForm').addEventListener('submit', function(e) {
            const nombre = document.getElementById('nombre').value.trim();
            const precio = document.getElementById('precio').value;
            const stock = document.getElementById('stock').value;

            if (!nombre) {
                e.preventDefault();
                alert('El nombre del producto es obligatorio');
                return;
            }

            if (!precio || precio <= 0) {
                e.preventDefault();
                alert('El precio debe ser mayor a 0');
                return;
            }

            if (!stock || stock < 0) {
                e.preventDefault();
                alert('El stock debe ser mayor o igual a 0');
                return;
            }
        });

        // Auto-capitalizar primera letra del nombre
        document.getElementById('nombre').addEventListener('blur', function() {
            this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);
        });
    </script>
</body>
</html>