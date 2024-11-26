<?php
// Database.php
class database {
    private $host = "db"; 
    private $db_name = "tareas"; 
    private $username = "root"; 
    private $password = "test"; 
    public $conn;
     
    function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
