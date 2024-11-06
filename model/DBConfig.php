<?php
class DbConfig {
    private $host = 'localhost'; 
    private $port = '5432';      
    private $dbName = 'fitcheck_db'; 
    private $username = 'postgres';
    private $password = 'rootpg'; 
    protected $connection;

    public function __construct() {
        $this->connection = $this->connect();
    }

    private function connect() {
        $connectionString = "pgsql:host={$this->host};port={$this->port};dbname={$this->dbName};user={$this->username};password={$this->password}";

        try {
            $conn = new PDO($connectionString);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}


?>
