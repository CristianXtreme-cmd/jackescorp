<?php
require_once(__DIR__ . '../../../config/config.php');
require_once(__DIR__ . '/../../controllers/ProductController.php');

// Verificar login
if(!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

$productController = new ProductController();
$products = $productController->index();

// Mensajes de éxito/error
$success_message = '';
$error_message = '';

if(isset($_GET['success'])) {
    switch($_GET['success']) {
        case 'created':
            $success_message = 'Producto creado exitosamente';
            break;
        case 'updated':
            $success_message = 'Producto actualizado exitosamente';
            break;
        case 'deleted':
            $success_message = 'Producto eliminado exitosamente';
            break;
    }
}

// Verificar si es admin para mostrar botones de acción
$isAdmin = isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos - StyleJackets</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
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
        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }
        .badge-stock-low {
            background-color: #dc3545;
        }
        .badge-stock-medium {
            background-color: #ffc107;
        }
        .badge-stock-high {
            background-color: #28a745;
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
                        <a class="nav-link active" href="#">
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
                <div class="col-md-6">
                    <h1 class="display-5">Gestión de Productos</h1>
                    <p class="lead">Administra el inventario de chaquetas</p>
                </div>
                <div class="col-md-6 text-end">
                    <?php if($isAdmin): ?>
                        <a href="create.php" class="btn btn-light btn-lg">
                            <i class="fas fa-plus me-2"></i>Nuevo Producto
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Mensajes -->
        <?php if($success_message): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i><?php echo $success_message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if($error_message): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i><?php echo $error_message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Tabla de productos -->
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-list me-2"></i>Lista de Productos
                        </h5>
                    </div>
                    <div class="col-auto">
                        <small class="text-muted">Total: <?php echo count($products); ?> productos</small>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="productsTable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Talla</th>
                                <th>Color</th>
                                <th>Estado</th>
                                <?php if($isAdmin): ?>
                                    <th>Acciones</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($products as $product): ?>
                                <tr>
                                    <td><?php echo $product['id_producto']; ?></td>
                                    <td>
                                        <?php if($product['imagen_url']): ?>
                                            <img src="<?php echo htmlspecialchars($product['imagen_url']); ?>" 
                                                 alt="<?php echo htmlspecialchars($product['nombre']); ?>" 
                                                 class="product-image">
                                        <?php else: ?>
                                            <div class="product-image bg-light d-flex align-items-center justify-content-center">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <strong><?php echo htmlspecialchars($product['nombre']); ?></strong>
                                        <?php if($product['descripcion']): ?>
                                            <br><small class="text-muted"><?php echo htmlspecialchars(substr($product['descripcion'], 0, 50)); ?>...</small>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <strong class="text-success">$<?php echo number_format($product['precio'], 2); ?></strong>
                                    </td>
                                    <td>
                                        <?php
                                        $stockClass = 'badge-stock-high';
                                        if($product['stock'] <= 5) $stockClass = 'badge-stock-low';
                                        elseif($product['stock'] <= 15) $stockClass = 'badge-stock-medium';
                                        ?>
                                        <span class="badge <?php echo $stockClass; ?>">
                                            <?php echo $product['stock']; ?> unidades
                                        </span>
                                    </td>
                                    <td><?php echo htmlspecialchars($product['talla'] ?: 'N/A'); ?></td>
                                    <td><?php echo htmlspecialchars($product['color'] ?: 'N/A'); ?></td>
                                    <td>
                                        <?php if($product['activo']): ?>
                                            <span class="badge bg-success">Activo</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Inactivo</span>
                                        <?php endif; ?>
                                    </td>
                                    <?php if($isAdmin): ?>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="edit.php?id=<?php echo $product['id_producto']; ?>" 
                                                   class="btn btn-outline-primary" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-outline-danger" 
                                                        onclick="confirmDelete(<?php echo $product['id_producto']; ?>)" 
                                                        title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación para eliminar -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este producto? Esta acción no se puede deshacer.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // Inicializar DataTable
        $(document).ready(function() {
            $('#productsTable').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
                },
                responsive: true,
                pageLength: 10,
                order: [[0, 'desc']]
            });
        });

        // Función para confirmar eliminación
        function confirmDelete(productId) {
            const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            document.getElementById('confirmDeleteBtn').href = 'delete.php?id=' + productId;
            modal.show();
        }
    </script>
</body>
</html>