<?php
class Usuario {
    private $conn;
    private $table = 'usuarios';

    public $id;
    public $nickname;
    public $psw;
    public $email;
    public $name;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (nickname, psw, email, name) VALUES (:nickname, :psw, :email, :name)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nickname', $this->nickname);
        $stmt->bindParam(':psw', password_hash($this->psw, PASSWORD_DEFAULT));
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':name', $this->name);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table . " WHERE nickname = :user";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user', $this->nickname, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $nickname, $psw, $email, $name) {
        $query = "UPDATE " . $this->table . " SET nickname = :nickname, psw = :psw, email = :email, name = :name WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nickname', $nickname);
        $stmt->bindParam(':psw', password_hash($psw, PASSWORD_DEFAULT));
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}