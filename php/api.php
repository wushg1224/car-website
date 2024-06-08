<?php
// open debug mode
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// fetch cars from database and return as JSON
header('Content-Type: application/json');
$pdo = new PDO('mysql:host=localhost;dbname=car_rent', 'root', '');

// filters can be passed as query parameters
// e.g. api.php?brand=toyota
$brand = $_GET['brand'] ?? null;
$type = $_GET['type'] ?? null;
$search = $_GET['search'] ?? null;

// build the query
$sql = 'SELECT * FROM car WHERE 1';
if ($brand) {
    $sql .= ' AND brand = :brand';
}
if ($type) {
    $sql .= ' AND type = :type';
}
if ($search) {
    $sql .= ' AND (brand LIKE :search OR model LIKE :search OR type LIKE :search OR description LIKE :search)';
}

// prepare the query
$stmt = $pdo->prepare($sql);
if ($brand) {
    $stmt->bindParam(':brand', $brand);
}
if ($type) {
    $stmt->bindParam(':type', $type);
}
if ($search) {
    $search = "%" . $search . "%";  // 添加通配符
    $stmt->bindParam(':search', $search);
}

// execute the query
$stmt->execute();
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

// return the result as JSON
echo json_encode(["cars" => $cars]);
