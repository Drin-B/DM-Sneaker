<?php
class User {
    private $conn;
    private $table_name = 'user';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($name, $email, $password) {
        $query = "INSERT INTO {$this->table_name} (name, email, password) VALUES (:name, :email, :password)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login($email, $password) {
        $query = "SELECT User_ID, Name, Email, Password FROM {$this->table_name} WHERE Email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':Email', $email);
        $stmt->execute();

        // Check if a record exists
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['Password'])) {
                // Start the session and store user data
                session_start();
                $_SESSION['user_id'] = $row['User_ID'];
                $_SESSION['email'] = $row['Email'];
                return true;
            }
        }
        return false;
    }
}
?>