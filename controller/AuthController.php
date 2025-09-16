<?php
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../models/usuario.php';
require_once __DIR__ . '/../vendor/autoload.php';

/*if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}*/

class AuthController {
    private $pdo;
    private $user;
    
    public function __construct() {
        $db = new DataBase();
        $this->pdo = $db->connect();
        $this->user = new Usuario($this->pdo);
    }

    public function login() {
        $data = json_decode(file_get_contents("php://input"), true);

        $this->user->nickname = $data['user'] ?? '';
        $user = $this->user->read();

        if ($user && password_verify($data['password'], $user['psw'])) {
            return [
                "success" => true,
                "message" => "Login successful",
                "user" => [
                    "id" => $user['id_usuario'],
                    "nickname" => $user['nickname'],
                    "email" => $user['e_mail'],
                    "name" => $user['name_complete']
                ]
            ];
        } else {
            return [
                "success" => false,
                "message" => "Invalid credentials"
            ];
        }
    }
}