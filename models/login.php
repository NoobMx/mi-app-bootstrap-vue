<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$usuario = $data['user'] ?? '';
$contrasena = $data['password'] ?? '';

// Validar con DB aquí
if ($usuario === 'admin' && $contrasena === '1234') {
    echo json_encode([
        'success' => true,
        'usuario' => [
            'nombre' => 'Admin',
            'rol' => 'administrador'
        ]
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Usuario o contraseña incorrectos'
    ]);
}
