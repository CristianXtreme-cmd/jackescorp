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
$id = $_GET['id'] ?? 0;

if (!$id) {
    header('Location: products.php');
    exit();
}

// Intentar eliminar el producto
$error = $productController->delete($id);

if ($error) {
    // Si hay error, redirigir con mensaje de error
    header('Location: products.php?error=' . urlencode($error));
} else {
    // Si fue exitoso, la función delete ya redirige
    // En caso de que no redirija automáticamente:
    header('Location: products.php?success=deleted');
}
exit();
?>