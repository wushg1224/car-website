<?php
// open debug mode
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// fetch cars from database and return as JSON
header('Content-Type: application/json');

// if method is get, fetch cars from database
// if method is post, change quantity to the database
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    getCars();
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    changeQuantity();
}

function getCars()
{
    // filters can be passed as query parameters
    // e.g. api.php?brand=toyota
    $id = $_GET['id'] ?? null;
    $brand = $_GET['brand'] ?? null;
    $type = $_GET['type'] ?? null;
    $search = $_GET['search'] ?? null;

    // build the query
    $sql = 'SELECT * FROM car WHERE 1';
    if ($id) {
        $sql .= ' AND id = :id';
    } else {
        if ($brand) {
            $sql .= ' AND brand = :brand';
        }
        if ($type) {
            $sql .= ' AND type = :type';
        }
        if ($search) {
            $sql .= ' AND (brand LIKE :search OR model LIKE :search OR type LIKE :search OR description LIKE :search)';
        }
    }

    $pdo = new PDO('mysql:host=localhost;dbname=car_rent', 'root', '');

    // prepare the query
    $stmt = $pdo->prepare($sql);
    if ($id) {
        $stmt->bindParam(':id', $id);
    } else {
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
    }

    // execute the query
    $stmt->execute();
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // return the result as JSON
    echo json_encode(["cars" => $cars]);
}

function changeQuantity()
{
    // get the request body
    $data = json_decode(file_get_contents('php://input'), true);

    // build the query
    $sql = 'UPDATE car SET quantity = quantity - :quantity WHERE id = :id';

    // prepare the query
    $pdo = new PDO('mysql:host=localhost;dbname=car_rent', 'root', '');
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $data['id']);
    $stmt->bindParam(':quantity', $data['quantity']);

    // execute the query
    $stmt->execute();

    // return the result as JSON
    echo json_encode(["message" => "confirmation success"]);
}
