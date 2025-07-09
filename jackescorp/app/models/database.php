<?php
class Database {
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $db_port = DB_PORT;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $conn;

    public function getConnection() {
    $this->conn = null;

    try {
        $dsn = "mysql:host=" . $this->host . ";port=" . $this->db_port . ";dbname=" . $this->db_name;
        
        $this->conn = new PDO(
            $dsn, 
            $this->username, 
            $this->password
        );
        $this->conn->exec("set names utf8");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $exception) {
        echo "Error de conexión: " . $exception->getMessage();
    }

    return $this->conn;
}
}
?>