<?php
// /dao/UserDAO.php

class UsuarioDAO {
    private $conn;
    private $table = 'usuarios';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerUsuarios() {
        $query = "SELECT id, username FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

 
    public function getUserById($id) {
        $query = "SELECT id, username FROM " . $this->table . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

 
    public function createUser($username, $password) {
        $query = "INSERT INTO " . $this->table . " SET username=:username, password=:password";
        $stmt = $this->conn->prepare($query);

        $username = htmlspecialchars(strip_tags($username));
        $password = htmlspecialchars(strip_tags($password));

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }


    public function updateUser($id, $username, $password) {
        $query = "UPDATE " . $this->table . " SET username = :username, password = :password WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $username = htmlspecialchars(strip_tags($username));
        $password = htmlspecialchars(strip_tags($password));
        $id = htmlspecialchars(strip_tags($id));

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':id', $id);


        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function deleteUser($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $id = htmlspecialchars(strip_tags($id));

        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
