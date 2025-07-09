<?php
require_once(__DIR__ . '/../models/database.php');
require_once(__DIR__ . '/../models/product.php');

class ProductController {
    private $db;
    private $product;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $database = new Database();
        $this->db = $database->getConnection();
        $this->product = new Product($this->db);
    }

    // Verificar si el usuario es administrador
    private function isAdmin() {
        return isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 1;
    }

    // Listar todos los productos
    public function index() {
        return $this->product->getAll();
    }

    // Mostrar formulario de creación
    public function create() {
        if (!$this->isAdmin()) {
            return "No tienes permisos para realizar esta acción";
        }
        return null;
    }

    // Guardar nuevo producto
    public function store() {
        if (!$this->isAdmin()) {
            return "No tienes permisos para realizar esta acción";
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre' => $_POST['nombre'] ?? '',
                'descripcion' => $_POST['descripcion'] ?? '',
                'precio' => $_POST['precio'] ?? 0,
                'stock' => $_POST['stock'] ?? 0,
                'talla' => $_POST['talla'] ?? '',
                'color' => $_POST['color'] ?? '',
                'material' => $_POST['material'] ?? '',
                'imagen_url' => $_POST['imagen_url'] ?? '',
                'activo' => isset($_POST['activo']) ? 1 : 0
            ];

            // Validaciones básicas
            if (empty($data['nombre']) || empty($data['precio'])) {
                return "Nombre y precio son campos obligatorios";
            }

            if (!is_numeric($data['precio']) || $data['precio'] <= 0) {
                return "El precio debe ser un número mayor a 0";
            }

            if (!is_numeric($data['stock']) || $data['stock'] < 0) {
                return "El stock debe ser un número mayor o igual a 0";
            }

            if ($this->product->create($data)) {
                header('Location: products.php?success=created');
                exit();
            } else {
                return "Error al crear el producto";
            }
        }
        return null;
    }

    // Mostrar formulario de edición
    public function edit($id) {
        if (!$this->isAdmin()) {
            return "No tienes permisos para realizar esta acción";
        }
        return $this->product->getById($id);
    }

    // Actualizar producto
    public function update($id) {
        if (!$this->isAdmin()) {
            return "No tienes permisos para realizar esta acción";
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre' => $_POST['nombre'] ?? '',
                'descripcion' => $_POST['descripcion'] ?? '',
                'precio' => $_POST['precio'] ?? 0,
                'stock' => $_POST['stock'] ?? 0,
                'talla' => $_POST['talla'] ?? '',
                'color' => $_POST['color'] ?? '',
                'material' => $_POST['material'] ?? '',
                'imagen_url' => $_POST['imagen_url'] ?? '',
                'activo' => isset($_POST['activo']) ? 1 : 0
            ];

            // Validaciones básicas
            if (empty($data['nombre']) || empty($data['precio'])) {
                return "Nombre y precio son campos obligatorios";
            }

            if (!is_numeric($data['precio']) || $data['precio'] <= 0) {
                return "El precio debe ser un número mayor a 0";
            }

            if (!is_numeric($data['stock']) || $data['stock'] < 0) {
                return "El stock debe ser un número mayor o igual a 0";
            }

            if ($this->product->update($id, $data)) {
                header('Location: products.php?success=updated');
                exit();
            } else {
                return "Error al actualizar el producto";
            }
        }
        return null;
    }

    // Eliminar producto
    public function delete($id) {
        if (!$this->isAdmin()) {
            return "No tienes permisos para realizar esta acción";
        }

        if ($this->product->delete($id)) {
            header('Location: products.php?success=deleted');
            exit();
        } else {
            return "Error al eliminar el producto";
        }
    }

    // Buscar productos
    public function search($term) {
        return $this->product->search($term);
    }

    // Obtener estadísticas
    public function getStats() {
        return [
            'total_products' => $this->product->getCount(),
            'low_stock' => $this->product->getLowStock(5)
        ];
    }
}
?>