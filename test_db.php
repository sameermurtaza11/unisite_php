<?php
require_once 'includes/database.php';

try {
    $db = new Database();
    $pdo = $db->connect();
    echo "Database connection successful!\n";
    echo "Connected to: " . $pdo->getAttribute(PDO::ATTR_SERVER_INFO) . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
