<?php
class Product {
    private $conn;
    private $table_name = "productos";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todos los productos
    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_producto DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener productos activos
    public function getActive() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE activo = 1 ORDER BY id_producto DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener producto por ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_producto = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear nuevo producto
    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " 
                  (nombre, descripcion, precio, stock, talla, color, material, imagen_url, activo) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(1, $data['nombre']);
        $stmt->bindParam(2, $data['descripcion']);
        $stmt->bindParam(3, $data['precio']);
        $stmt->bindParam(4, $data['stock']);
        $stmt->bindParam(5, $data['talla']);
        $stmt->bindParam(6, $data['color']);
        $stmt->bindParam(7, $data['material']);
        $stmt->bindParam(8, $data['imagen_url']);
        $stmt->bindParam(9, $data['activo']);

        return $stmt->execute();
    }

    // Actualizar producto
    public function update($id, $data) {
        $query = "UPDATE " . $this->table_name . " 
                  SET nombre = ?, descripcion = ?, precio = ?, stock = ?, 
                      talla = ?, color = ?, material = ?, imagen_url = ?, activo = ?
                  WHERE id_producto = ?";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(1, $data['nombre']);
        $stmt->bindParam(2, $data['descripcion']);
        $stmt->bindParam(3, $data['precio']);
        $stmt->bindParam(4, $data['stock']);
        $stmt->bindParam(5, $data['talla']);
        $stmt->bindParam(6, $data['color']);
        $stmt->bindParam(7, $data['material']);
        $stmt->bindParam(8, $data['imagen_url']);
        $stmt->bindParam(9, $data['activo']);
        $stmt->bindParam(10, $id);

        return $stmt->execute();
    }

    // Eliminar producto (soft delete)
    public function delete($id) {
        $query = "UPDATE " . $this->table_name . " SET activo = 0 WHERE id_producto = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

    // Eliminar producto permanentemente
    public function hardDelete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_producto = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

    // Buscar productos
    public function search($term) {
        $query = "SELECT * FROM " . $this->table_name . " 
                  WHERE (nombre LIKE ? OR descripcion LIKE ? OR color LIKE ? OR material LIKE ?) 
                  AND activo = 1 
                  ORDER BY id_producto DESC";
        
        $searchTerm = "%{$term}%";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $searchTerm);
        $stmt->bindParam(2, $searchTerm);
        $stmt->bindParam(3, $searchTerm);
        $stmt->bindParam(4, $searchTerm);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Contar productos totales
    public function getCount() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table_name . " WHERE activo = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    // Obtener productos con stock bajo
    public function getLowStock($limit = 10) {
        $query = "SELECT * FROM " . $this->table_name . " 
                  WHERE stock <= ? AND activo = 1 
                  ORDER BY stock ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $limit);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>