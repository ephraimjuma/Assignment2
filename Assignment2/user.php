<?php

include_once 'dataOperations.php';

include_once 'dbconnect.php';

class User implements DataOperations {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO users (username, email) VALUES (:username, :email)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':email', $data['email']);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function read() {
        $query = "SELECT id, username, email FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $users[] = $row;
        }

        return $users;
    }
}
?>
