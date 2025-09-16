<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: http://localhost:8080");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");

require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../models/usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

class UserController {
    private $pdo;
    private $user;

    private $psw;

    public function __construct() {
        $db = new DataBase();
        $this->pdo = $db->connect();
        $this->user = new Usuario($this->pdo);
    }
}