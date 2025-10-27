<?php
/**
 * Sewadar Management API
 * 
 * RESTful API for managing sewadar records using SQLite database.
 * Supports GET (retrieve all) and POST (create new) operations.
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configure CORS headers to allow cross-origin requests from React frontend
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

// Handle preflight CORS requests from browsers
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Verify SQLite PDO extension is available
if (!extension_loaded('pdo_sqlite')) {
    http_response_code(500);
    echo json_encode(array("message" => "SQLite PDO extension is not enabled. Please enable it in php.ini"));
    exit();
}

// Initialize SQLite database connection
$dbFile = __DIR__ . '/sewadars.db';

try {
    $db = new PDO('sqlite:' . $dbFile);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create sewadars table if it doesn't exist
    $db->exec("
        CREATE TABLE IF NOT EXISTS sewadars (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )
    ");
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(array("message" => "Database connection failed: " . $e->getMessage()));
    exit();
}

// Route request to appropriate handler based on HTTP method
$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        getSewadars($db);
        break;
    case 'POST':
        addSewadar($db);
        break;
    default:
        http_response_code(405);
        echo json_encode(array("message" => "Method not allowed"));
        break;
}

/**
 * Retrieve all sewadar records from database
 * 
 * @param PDO $db Database connection instance
 * @return void Outputs JSON array of sewadar records
 */
function getSewadars($db) {
    try {
        $query = "SELECT id, name, created_at FROM sewadars ORDER BY created_at DESC";
        $stmt = $db->prepare($query);
        $stmt->execute();

        $sewadars = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($sewadars, $row);
        }

        http_response_code(200);
        echo json_encode($sewadars);
    } catch(PDOException $e) {
        http_response_code(500);
        echo json_encode(array("message" => "Failed to fetch sewadars: " . $e->getMessage()));
    }
}

/**
 * Add a new sewadar record to database
 * 
 * Expects JSON payload with 'name' field in request body.
 * 
 * @param PDO $db Database connection instance
 * @return void Outputs JSON response with success/error message
 */
function addSewadar($db) {
    // Parse JSON request body
    $data = json_decode(file_get_contents("php://input"));

    // Validate required name field
    if (!empty($data->name)) {
        try {
            $query = "INSERT INTO sewadars (name) VALUES (:name)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(":name", $data->name);

            if ($stmt->execute()) {
                http_response_code(201);
                echo json_encode(array(
                    "message" => "Sewadar added successfully", 
                    "id" => $db->lastInsertId()
                ));
            } else {
                http_response_code(503);
                echo json_encode(array("message" => "Unable to add sewadar"));
            }
        } catch(PDOException $e) {
            http_response_code(500);
            echo json_encode(array("message" => "Failed to add sewadar: " . $e->getMessage()));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Unable to add sewadar. Name is required."));
    }
}
?>
