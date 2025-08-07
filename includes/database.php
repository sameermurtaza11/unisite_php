<?php
// Database connection with security features
class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $pdo;

    public function __construct() {
        try {
            // Check if config file exists
            $config_path = __DIR__ . '/../config.php';
            if (!file_exists($config_path)) {
                throw new Exception('Database configuration file not found at: ' . $config_path);
            }
            
            // Load configuration
            $config = include $config_path;
            
            // Validate config to prevent errors
            if (!is_array($config)) {
                throw new Exception('Failed to load database configuration - config.php must return an array');
            }
            
            // Validate required config keys
            $required_keys = ['db_host', 'db_name', 'db_user', 'db_pass'];
            $missing_keys = [];
            foreach ($required_keys as $key) {
                if (!array_key_exists($key, $config)) {
                    $missing_keys[] = $key;
                }
            }
            
            if (!empty($missing_keys)) {
                throw new Exception("Missing required config keys: " . implode(', ', $missing_keys));
            }
            
            $this->host = $config['db_host'];
            $this->db_name = $config['db_name'];
            $this->username = $config['db_user'];
            $this->password = $config['db_pass'];
            
        } catch (Exception $e) {
            // Log the actual error for debugging
            error_log("Database configuration error: " . $e->getMessage());
            throw new Exception('Failed to load database configuration: ' . $e->getMessage());
        }
    }

    public function connect() {
        $this->pdo = null;
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
        } catch(PDOException $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
        return $this->pdo;
    }
}

// Security utility functions
class Security {
    
    // Generate CSRF token
    public static function generateCSRFToken() {
        // Session should already be started by index.php
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
    
    // Verify CSRF token
    public static function verifyCSRFToken($token) {
        // Session should already be started by index.php
        return isset($_SESSION['csrf_token']) && !empty($token) && hash_equals($_SESSION['csrf_token'], $token);
    }
    
    // Sanitize input data
    public static function sanitizeInput($data) {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }
    
    // Validate CNIC format
    public static function validateCNIC($cnic) {
        return preg_match('/^[0-9]{13}$/', $cnic);
    }
    
    // Validate mobile format
    public static function validateMobile($mobile) {
        return preg_match('/^03[0-9]{9}$/', $mobile);
    }
    
    // Validate password strength
    public static function validatePassword($password) {
        // At least 8 characters, one uppercase, one lowercase, one number
        return strlen($password) >= 8 && 
               preg_match('/[A-Z]/', $password) && 
               preg_match('/[a-z]/', $password) && 
               preg_match('/[0-9]/', $password);
    }
    
    // Hash password
    public static function hashPassword($password) {
        return password_hash($password, PASSWORD_ARGON2ID);
    }
    
    // Verify password
    public static function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }
}
?>
