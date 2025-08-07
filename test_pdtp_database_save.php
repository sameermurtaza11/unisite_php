<?php
// Test PDTP Database Save Functionality
require_once __DIR__ . '/includes/database.php';

echo "<h2>PDTP Database Save Test</h2>";

try {
    // Test database connection
    $database = new Database();
    $pdo = $database->connect();
    
    if ($pdo) {
        echo "<p style='color: green;'>✓ Database connection successful</p>";
        
        // Check if pdtp_applications table exists
        $tableCheck = $pdo->query("SHOW TABLES LIKE 'pdtp_applications'");
        if ($tableCheck->rowCount() > 0) {
            echo "<p style='color: green;'>✓ pdtp_applications table exists</p>";
            
            // Check table structure
            $structureCheck = $pdo->query("DESCRIBE pdtp_applications");
            $columns = $structureCheck->fetchAll(PDO::FETCH_COLUMN);
            echo "<p style='color: blue;'>Table columns: " . implode(', ', $columns) . "</p>";
            
            // Test sample data insertion (simulated user data)
            $testData = [
                'user_id' => 999, // Test user ID
                'program_id' => 1,
                'current_step' => 1,
                'name' => 'Test User',
                'father_name' => 'Test Father',
                'cnic' => '12345-1234567-1',
                'phone' => '0300-1234567',
                'email' => 'test@example.com',
                'date_of_birth' => '1995-01-01',
                'address' => 'Test Address',
                'gender' => 'male',
                'qualification_option' => 'dae',
                'ssc_marks' => 75.5,
                'hsc_marks' => 80.0,
                'degree_type' => '',
                'degree_marks' => 0,
                'degree_cgpa' => 0,
                'appearing_degree' => 0,
                'subjects' => json_encode(['maths', 'physics']),
                'documents_data' => json_encode([]),
                'emergency_contact' => 'Test Emergency',
                'emergency_phone' => '0300-7654321',
                'additional_info' => 'Test info'
            ];
            
            // Test INSERT
            $sql = "INSERT INTO pdtp_applications (
                user_id, program_id, current_step, status,
                name, father_name, cnic, phone, email, date_of_birth, address, gender,
                qualification_option, ssc_marks, hsc_marks, degree_type, degree_marks, degree_cgpa, appearing_degree, subjects,
                documents_data, emergency_contact, emergency_phone, additional_info,
                created_at, updated_at
            ) VALUES (
                ?, ?, ?, 'draft',
                ?, ?, ?, ?, ?, ?, ?, ?,
                ?, ?, ?, ?, ?, ?, ?, ?,
                ?, ?, ?, ?,
                NOW(), NOW()
            ) ON DUPLICATE KEY UPDATE
                current_step = VALUES(current_step),
                updated_at = NOW()";
            
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([
                $testData['user_id'], $testData['program_id'], $testData['current_step'],
                $testData['name'], $testData['father_name'], $testData['cnic'], 
                $testData['phone'], $testData['email'], $testData['date_of_birth'], 
                $testData['address'], $testData['gender'], $testData['qualification_option'], 
                $testData['ssc_marks'], $testData['hsc_marks'], $testData['degree_type'], 
                $testData['degree_marks'], $testData['degree_cgpa'], $testData['appearing_degree'], 
                $testData['subjects'], $testData['documents_data'], $testData['emergency_contact'], 
                $testData['emergency_phone'], $testData['additional_info']
            ]);
            
            if ($result) {
                echo "<p style='color: green;'>✓ Test data insertion successful</p>";
                
                // Clean up test data
                $cleanupStmt = $pdo->prepare("DELETE FROM pdtp_applications WHERE user_id = ?");
                $cleanupStmt->execute([$testData['user_id']]);
                echo "<p style='color: blue;'>✓ Test data cleaned up</p>";
            } else {
                echo "<p style='color: red;'>✗ Test data insertion failed</p>";
                $error = $stmt->errorInfo();
                echo "<p style='color: red;'>Error: " . $error[2] . "</p>";
            }
            
        } else {
            echo "<p style='color: red;'>✗ pdtp_applications table does not exist</p>";
            echo "<p>Please run the SQL setup script: _setup/create_pdtp_applications_table.sql</p>";
        }
        
    } else {
        echo "<p style='color: red;'>✗ Database connection failed</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Test failed: " . $e->getMessage() . "</p>";
}

echo "<h3>Next Steps:</h3>";
echo "<ul>";
echo "<li>1. Ensure the pdtp_applications table is created using _setup/create_pdtp_applications_table.sql</li>";
echo "<li>2. Test the form by logging in and navigating through PDTP application steps</li>";
echo "<li>3. Use 'Save Progress' and 'Next' buttons to verify database persistence</li>";
echo "<li>4. Check the database to confirm data is being saved correctly</li>";
echo "</ul>";
?>
