<?php
// User authentication class
require_once 'database.php';

class UserAuth {
    private $db;
    private $conn;
    
    public function __construct() {
        $this->db = new Database();
        $this->conn = $this->db->connect();
    }
    
    // Register new user
    public function register($data) {
        try {
            // Validate input data
            $errors = $this->validateRegistrationData($data);
            if (!empty($errors)) {
                return ['success' => false, 'errors' => $errors];
            }
            
            // Check for duplicates
            $duplicateCheck = $this->checkDuplicates($data['cnic'], $data['email'], $data['mobile']);
            if (!empty($duplicateCheck)) {
                return ['success' => false, 'errors' => $duplicateCheck];
            }
            
            // Hash password
            $hashedPassword = Security::hashPassword($data['password']);
            
            // Prepare SQL statement
            $sql = "INSERT INTO users (full_name, cnic, email, mobile, password) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            
            $result = $stmt->execute([
                Security::sanitizeInput($data['full_name']),
                Security::sanitizeInput($data['cnic']),
                Security::sanitizeInput($data['email']),
                Security::sanitizeInput($data['mobile']),
                $hashedPassword
            ]);
            
            if ($result) {
                return ['success' => true, 'message' => 'Registration successful! You can now login.'];
            } else {
                return ['success' => false, 'errors' => ['Registration failed. Please try again.']];
            }
            
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ['success' => false, 'errors' => ['An error occurred during registration.']];
        }
    }
    
    // Login user
    public function login($cnic_email, $password) {
        try {
            // Check if input is CNIC or email
            $isEmail = filter_var($cnic_email, FILTER_VALIDATE_EMAIL);
            
            if ($isEmail) {
                $sql = "SELECT * FROM users WHERE email = ?";
            } else {
                $sql = "SELECT * FROM users WHERE cnic = ?";
            }
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([Security::sanitizeInput($cnic_email)]);
            $user = $stmt->fetch();
            
            if ($user && Security::verifyPassword($password, $user['password'])) {
                // Store user data in session (session already started)
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['full_name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['logged_in'] = true;
                
                return ['success' => true, 'message' => 'Login successful!', 'user' => $user];
            } else {
                return ['success' => false, 'errors' => ['Invalid credentials. Please check your CNIC/Email and password.']];
            }
            
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ['success' => false, 'errors' => ['An error occurred during login.']];
        }
    }
    
    // Logout user
    public function logout() {
        // Session already started, just destroy it
        session_destroy();
        return true;
    }
    
    // Check if user is logged in
    public function isLoggedIn() {
        // Session already started
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }
    
    // Get current user data
    public function getCurrentUser() {
        if (!$this->isLoggedIn()) {
            return null;
        }
        
        try {
            $sql = "SELECT id, full_name, cnic, email, mobile, created_at FROM users WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$_SESSION['user_id']]);
            return $stmt->fetch();
        } catch (Exception $e) {
            return null;
        }
    }
    
    // Validate registration data
    private function validateRegistrationData($data) {
        $errors = [];
        
        // Validate full name
        if (empty($data['full_name']) || strlen($data['full_name']) < 2) {
            $errors[] = 'Full name must be at least 2 characters long.';
        }
        
        // Validate CNIC
        if (empty($data['cnic']) || !Security::validateCNIC($data['cnic'])) {
            $errors[] = 'CNIC must be exactly 13 digits.';
        }
        
        // Validate email
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Please enter a valid email address.';
        }
        
        // Validate mobile
        if (empty($data['mobile']) || !Security::validateMobile($data['mobile'])) {
            $errors[] = 'Mobile number must be in format 03XXXXXXXXX.';
        }
        
        // Validate password
        if (empty($data['password']) || !Security::validatePassword($data['password'])) {
            $errors[] = 'Password must be at least 8 characters with uppercase, lowercase, and number.';
        }
        
        // Validate password confirmation
        if ($data['password'] !== $data['confirm_password']) {
            $errors[] = 'Passwords do not match.';
        }
        
        return $errors;
    }
    
    // Check for duplicate records
    private function checkDuplicates($cnic, $email, $mobile) {
        $errors = [];
        
        try {
            // Check CNIC
            $sql = "SELECT id FROM users WHERE cnic = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$cnic]);
            if ($stmt->fetch()) {
                $errors[] = 'A user with this CNIC already exists.';
            }
            
            // Check email
            $sql = "SELECT id FROM users WHERE email = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $errors[] = 'A user with this email already exists.';
            }
            
            // Check mobile
            $sql = "SELECT id FROM users WHERE mobile = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$mobile]);
            if ($stmt->fetch()) {
                $errors[] = 'A user with this mobile number already exists.';
            }
            
        } catch (Exception $e) {
            $errors[] = 'Error checking duplicate records.';
        }
        
        return $errors;
    }
}
?>
