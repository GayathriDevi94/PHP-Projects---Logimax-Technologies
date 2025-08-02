<?php
class Database {
    //setting the variables
    private $host = 'localhost';
    private $db_name = 'login_db';
    private $username = 'root';
    private $password = '';
    private $conn;
    public function connect() {
        //setting the variable to null
        $this->conn = null;

        try {
            //establishing the database connection
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            //handling the exception
            echo 'Connection Error: ' . $e->getMessage();
        }
        //returning the connection details
        return $this->conn;
    }
}
?>