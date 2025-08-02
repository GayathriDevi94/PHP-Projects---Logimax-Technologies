<?php
class User {
    //setting the variables
    private $conn;
    private $table = 'user_details';
    public $gender;
    public $mobileno;
    public $id;
    public $username;
    public $email;
    public $password;
    public $created_at;
    //function for db connection
    public function __construct($db) {
        $this->conn = $db;
    }
    //function for login 
    public function login() {
        //query for fetching the details based on user details
        $query = 'SELECT * FROM ' . $this->table . ' WHERE user_name = ? LIMIT 1';
        //queryig the database and executing the query
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->username);
        $stmt->execute();
        //fetching the datas
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //verifying the user details 
        if($row && password_verify($this->password, $row['user_pass'])) {
            //setting the retrieved data from the db to some variable and returning it
            $this->id = $row['user_id'];
            $this->email = $row['email'];
            $this->gender = $row['Gender'];
            $this->mobileno = $row['user_phone_no'];
            return true;
        }
        //if validation fails returns false 
        return false;
    }
    //chechking whether the user already exsist
    public function userExists() {
        //querying the database and executing the result
        $query = 'SELECT * FROM ' . $this->table . ' WHERE user_name = ? OR email = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->username);
        $stmt->bindParam(2, $this->email);
        $stmt->execute();
        //returning the row count if it is greater than or equal to 1
        return $stmt->rowCount() > 0;
    }
}
?>