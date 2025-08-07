<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/database.php';

// Check if user is logged in
$auth = new UserAuth();
if (!$auth->isLoggedIn()) {
    echo '<script>window.location.href = "index.php?content_file=partials/login.php";</script>';
    echo '<div class="text-center mt-8"><p>Please login to access this page. Redirecting...</p></div>';
    return;
}

// Get current user data
$currentUser = $auth->getCurrentUser();
// Check if a program was selected
if (!isset($_SESSION['selected_program'])) {
    echo '<script>window.location.href = "index.php?content_file=partials/program_selection.php";</script>';
    echo '<div class="text-center mt-8"><p>Please select a program first. Redirecting...</p></div>';
    return;
}

// Get program data to check deadline
include __DIR__ . '/../data/programs_data.php';
$selected_program_key = $_SESSION['selected_program'];
$program_info = null;
foreach ($programs as $program) {
    if ($program['key'] === $selected_program_key) {
        $program_info = $program;
        break;
    }
}

// PDTP Validation Functions
function validatePDTPEligibility($form_data, $deadline_date) {
    $errors = [];
    $warnings = [];
    
    // Age validation (must not exceed 25 years on or before deadline)
    if (isset($form_data['date_of_birth']) && !empty($form_data['date_of_birth'])) {
        $birthDate = new DateTime($form_data['date_of_birth']);
        $deadlineDate = new DateTime($deadline_date);
        $age = $birthDate->diff($deadlineDate);
        $ageInYears = $age->y;
        
        if ($ageInYears > 25) {
            $errors[] = "Age limit exceeded. You must not be older than 25 years as of the deadline ({$deadline_date}). Your age will be {$ageInYears} years.";
        }
    }
    
    // Qualification validation
    $qualification_option = $form_data['qualification_option'] ?? '';
    
    if ($qualification_option === 'option_a') {
        // Option A: DAE validation
        $dae_field = $form_data['dae_field'] ?? '';
        $ssc_marks = floatval($form_data['ssc_marks'] ?? 0);
        $dae_marks = floatval($form_data['dae_marks'] ?? 0);
        $appearing_dae = isset($form_data['appearing_dae']) && $form_data['appearing_dae'] === 'yes';
        
        // Check DAE field
        $valid_dae_fields = [
            'chemical', 'electrical', 'electronics', 'mechanical', 'civil', 
            'computer', 'hvac', 'metallurgy', 'instrumentation_control'
        ];
        if (!in_array($dae_field, $valid_dae_fields)) {
            $errors[] = "Please select a valid DAE field from the approved list.";
        }
        
        // Check SSC marks (minimum 60%)
        if ($ssc_marks < 60.0) {
            $errors[] = "SSC marks must be at least 60% (First Division). Your marks: {$ssc_marks}%";
        }
        
        // Check DAE marks (minimum 60%) - only if not appearing
        if (!$appearing_dae && $dae_marks < 60.0) {
            $errors[] = "DAE marks must be at least 60% (First Division). Your marks: {$dae_marks}%";
        }
        
        // Warning for appearing candidates
        if ($appearing_dae) {
            $warnings[] = "You must complete your DAE degree before the program deadline, or you will not be allowed to join.";
        }
        
    } elseif ($qualification_option === 'option_b') {
        // Option B: B.Sc/ADS validation
        $degree_type = $form_data['degree_type'] ?? '';
        $subjects = isset($form_data['subjects']) && is_array($form_data['subjects']) ? $form_data['subjects'] : [];
        $ssc_marks = floatval($form_data['ssc_marks'] ?? 0);
        $hsc_marks = floatval($form_data['hsc_marks'] ?? 0);
        $degree_marks = floatval($form_data['degree_marks'] ?? 0);
        $degree_cgpa = floatval($form_data['degree_cgpa'] ?? 0);
        $appearing_degree = isset($form_data['appearing_degree']) && $form_data['appearing_degree'] === 'yes';
        
        // Check degree type
        if (!in_array($degree_type, ['bsc', 'ads'])) {
            $errors[] = "Please select a valid degree type (B.Sc. or ADS).";
        }
        
        // Check subjects (Maths is compulsory, plus Physics or Chemistry)
        if (!in_array('maths', $subjects)) {
            $errors[] = "Mathematics is compulsory for this qualification option.";
        }
        if (!in_array('physics', $subjects) && !in_array('chemistry', $subjects)) {
            $errors[] = "You must have either Physics or Chemistry along with Mathematics.";
        }
        
        // Check SSC marks (minimum 60%)
        if ($ssc_marks < 60.0) {
            $errors[] = "SSC marks must be at least 60%. Your marks: {$ssc_marks}%";
        }
        
        // Check HSC marks (minimum 60%)
        if ($hsc_marks < 60.0) {
            $errors[] = "HSC (Pre-Engineering) marks must be at least 60%. Your marks: {$hsc_marks}%";
        }
        
        // Check degree marks/CGPA (minimum 60% or 2.5 CGPA) - only if not appearing
        if (!$appearing_degree) {
            if ($degree_marks > 0 && $degree_marks < 60.0) {
                $errors[] = "Degree marks must be at least 60%. Your marks: {$degree_marks}%";
            }
            if ($degree_cgpa > 0 && $degree_cgpa < 2.5) {
                $errors[] = "Degree CGPA must be at least 2.5. Your CGPA: {$degree_cgpa}";
            }
            if ($degree_marks <= 0 && $degree_cgpa <= 0) {
                $errors[] = "Please provide either percentage marks or CGPA for your degree.";
            }
        }
        
        // Warning for appearing candidates
        if ($appearing_degree) {
            $warnings[] = "You must complete your degree before the program deadline, or you will not be allowed to join.";
        }
        
    } else {
        $errors[] = "Please select a qualification option (DAE or B.Sc./ADS).";
    }
    
    return ['errors' => $errors, 'warnings' => $warnings];
}

// Save PDTP form data to database
function savePDTPFormData($user, $form_data, $current_step, $program_key) {
    try {
        // Initialize database connection with better error handling
        $database = new Database();
        $pdo = $database->connect();
        
        if (!$pdo) {
            error_log("Database PDO connection is null");
            return ['success' => false, 'error' => 'Database connection failed - PDO is null'];
        }
        
        // Prepare form data for database storage
        $user_id = $user['id'];
        
        // Extract and sanitize form data matching the actual table structure
        $date_of_birth = $form_data['date_of_birth'] ?? null;
        $address = htmlspecialchars($form_data['address'] ?? '', ENT_QUOTES);
        $gender = htmlspecialchars($form_data['gender'] ?? '', ENT_QUOTES);
        
        // Education data
        $qualification_option = htmlspecialchars($form_data['qualification_option'] ?? '', ENT_QUOTES);
        $ssc_marks = floatval($form_data['ssc_marks'] ?? 0);
        $hsc_marks = floatval($form_data['hsc_marks'] ?? 0);
        $degree_type = htmlspecialchars($form_data['degree_type'] ?? '', ENT_QUOTES);
        $degree_marks = floatval($form_data['degree_marks'] ?? 0);
        $degree_cgpa = floatval($form_data['degree_cgpa'] ?? 0);
        $appearing_degree = isset($form_data['appearing_degree']) ? 1 : 0;
        
        // DAE specific fields
        $dae_field = htmlspecialchars($form_data['dae_field'] ?? '', ENT_QUOTES);
        $dae_institute = htmlspecialchars($form_data['dae_institute'] ?? '', ENT_QUOTES);
        $dae_marks = floatval($form_data['dae_marks'] ?? 0);
        $appearing_dae = isset($form_data['appearing_dae']) ? 1 : 0;
        
        // B.Sc specific fields
        $bsc_institute = htmlspecialchars($form_data['bsc_institute'] ?? '', ENT_QUOTES);
        
        // Subjects as JSON
        $subjects = json_encode($form_data['subjects'] ?? []);
        
        // Professional experience
        $job_title = htmlspecialchars($form_data['job_title'] ?? '', ENT_QUOTES);
        $organization = htmlspecialchars($form_data['organization'] ?? '', ENT_QUOTES);
        $experience_years = htmlspecialchars($form_data['experience_years'] ?? '', ENT_QUOTES);
        $industry = htmlspecialchars($form_data['industry'] ?? '', ENT_QUOTES);
        $motivation = htmlspecialchars($form_data['motivation'] ?? '', ENT_QUOTES);
        
        // Generate application ID if not exists
        $application_id = 'PDTP' . str_pad($user_id, 4, '0', STR_PAD_LEFT) . date('Y');
        
        // Check if application already exists
        $checkStmt = $pdo->prepare("SELECT application_id FROM pdtp_applications WHERE user_id = ? AND program_key = ?");
        $checkStmt->execute([$user_id, $program_key]);
        $existingApp = $checkStmt->fetch();
        
        if ($existingApp) {
            // Use existing application_id for updates
            $application_id = $existingApp['application_id'];
        }
        
        // Insert or update application record using correct table structure
        $sql = "INSERT INTO pdtp_applications (
            user_id, application_id, program_key, current_step, status,
            date_of_birth, gender, address,
            qualification_option, dae_field, dae_institute, dae_marks, appearing_dae,
            degree_type, bsc_institute, subjects, hsc_marks, degree_marks, degree_cgpa, appearing_degree, ssc_marks,
            job_title, organization, experience_years, industry, motivation,
            created_at, updated_at
        ) VALUES (
            ?, ?, ?, ?, 'draft',
            ?, ?, ?,
            ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?,
            NOW(), NOW()
        ) ON DUPLICATE KEY UPDATE
            current_step = ?,
            date_of_birth = ?,
            gender = ?,
            address = ?,
            qualification_option = ?,
            dae_field = ?,
            dae_institute = ?,
            dae_marks = ?,
            appearing_dae = ?,
            degree_type = ?,
            bsc_institute = ?,
            subjects = ?,
            hsc_marks = ?,
            degree_marks = ?,
            degree_cgpa = ?,
            appearing_degree = ?,
            ssc_marks = ?,
            job_title = ?,
            organization = ?,
            experience_years = ?,
            industry = ?,
            motivation = ?,
            updated_at = NOW()";
        
        $stmt = $pdo->prepare($sql);
        
        if (!$stmt) {
            return ['success' => false, 'error' => 'Failed to prepare statement'];
        }
        
        $result = $stmt->execute([
            // INSERT values
            $user_id, $application_id, $program_key, $current_step,
            $date_of_birth, $gender, $address,
            $qualification_option, $dae_field, $dae_institute, $dae_marks, $appearing_dae,
            $degree_type, $bsc_institute, $subjects, $hsc_marks, $degree_marks, $degree_cgpa, $appearing_degree, $ssc_marks,
            $job_title, $organization, $experience_years, $industry, $motivation,
            // UPDATE values (duplicate parameters for ON DUPLICATE KEY UPDATE)
            $current_step,
            $date_of_birth, $gender, $address,
            $qualification_option, $dae_field, $dae_institute, $dae_marks, $appearing_dae,
            $degree_type, $bsc_institute, $subjects, $hsc_marks, $degree_marks, $degree_cgpa, $appearing_degree, $ssc_marks,
            $job_title, $organization, $experience_years, $industry, $motivation
        ]);
        
        if ($result) {
            return ['success' => true, 'message' => 'Form data saved successfully'];
        } else {
            $error_info = $stmt->errorInfo();
            return ['success' => false, 'error' => 'Failed to save data: ' . $error_info[2]];
        }
        
    } catch (Exception $e) {
        // Log the detailed error for debugging
        error_log("savePDTPFormData error: " . $e->getMessage());
        error_log("Stack trace: " . $e->getTraceAsString());
        return ['success' => false, 'error' => 'Exception occurred: ' . $e->getMessage()];
    }
}

// Initialize or get current step from session
if (!isset($_SESSION['pdtp_application_step'])) {
    $_SESSION['pdtp_application_step'] = 1;
}

// Initialize form data from session
if (!isset($_SESSION['pdtp_form_data'])) {
    $_SESSION['pdtp_form_data'] = [];
}

$current_step = $_SESSION['pdtp_application_step'];
$form_data = $_SESSION['pdtp_form_data'];
$validation_errors = [];
$validation_warnings = [];

// Handle form submission
if ($_POST && isset($_POST['csrf_token']) && Security::verifyCSRFToken($_POST['csrf_token'])) {
    // Debug: Log what's being submitted
    error_log("Form submission - POST data: " . print_r($_POST, true));
    
    // Save current step data with better handling
    foreach ($_POST as $key => $value) {
        if ($key !== 'csrf_token' && $key !== 'action') {
            // Handle subjects array properly
            if ($key === 'subjects') {
                $_SESSION['pdtp_form_data'][$key] = isset($_POST['subjects']) && is_array($_POST['subjects']) ? $_POST['subjects'] : [];
            } else {
                // Ensure we're storing the actual value, not overwriting
                $_SESSION['pdtp_form_data'][$key] = $value;
            }
        }
    }
    
    // Process preserved values from hidden fields
    if (isset($_POST['preserved_ssc_marks']) && $_POST['preserved_ssc_marks'] !== '') {
        // If SSC marks isn't in current POST (different qualification option), restore from preserved
        if (!isset($_POST['ssc_marks']) || $_POST['ssc_marks'] === '') {
            $_SESSION['pdtp_form_data']['ssc_marks'] = $_POST['preserved_ssc_marks'];
        }
    }
    
    // Restore preserved Option A data when switching from Option B
    if (isset($_POST['preserved_dae_field'])) $_SESSION['pdtp_form_data']['dae_field'] = $_POST['preserved_dae_field'];
    if (isset($_POST['preserved_dae_institute'])) $_SESSION['pdtp_form_data']['dae_institute'] = $_POST['preserved_dae_institute'];
    if (isset($_POST['preserved_dae_marks'])) $_SESSION['pdtp_form_data']['dae_marks'] = $_POST['preserved_dae_marks'];
    if (isset($_POST['preserved_appearing_dae'])) $_SESSION['pdtp_form_data']['appearing_dae'] = $_POST['preserved_appearing_dae'];
    
    // Restore preserved Option B data when switching from Option A
    if (isset($_POST['preserved_degree_type'])) $_SESSION['pdtp_form_data']['degree_type'] = $_POST['preserved_degree_type'];
    if (isset($_POST['preserved_bsc_institute'])) $_SESSION['pdtp_form_data']['bsc_institute'] = $_POST['preserved_bsc_institute'];
    if (isset($_POST['preserved_hsc_marks'])) $_SESSION['pdtp_form_data']['hsc_marks'] = $_POST['preserved_hsc_marks'];
    if (isset($_POST['preserved_degree_marks'])) $_SESSION['pdtp_form_data']['degree_marks'] = $_POST['preserved_degree_marks'];
    if (isset($_POST['preserved_degree_cgpa'])) $_SESSION['pdtp_form_data']['degree_cgpa'] = $_POST['preserved_degree_cgpa'];
    if (isset($_POST['preserved_appearing_degree'])) $_SESSION['pdtp_form_data']['appearing_degree'] = $_POST['preserved_appearing_degree'];
    if (isset($_POST['preserved_subjects']) && is_array($_POST['preserved_subjects'])) {
        $_SESSION['pdtp_form_data']['subjects'] = $_POST['preserved_subjects'];
    }
    
    // Debug: Log what's in session after saving
    error_log("Session after save: " . print_r($_SESSION['pdtp_form_data'], true));
    
    // Update form_data with new POST data
    $form_data = $_SESSION['pdtp_form_data'];
    
    // PDTP-specific validation only when moving forward or submitting (NOT when going backward)
    if ($selected_program_key === 'pdtp' && isset($_POST['action']) && 
        ($_POST['action'] === 'next' || $_POST['action'] === 'submit') && 
        ($current_step >= 2)) {
        $validation_result = validatePDTPEligibility($form_data, $program_info['deadline']);
        $validation_errors = $validation_result['errors'];
        $validation_warnings = $validation_result['warnings'];
    }
    
    // Handle navigation
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'next':
                // Only proceed if no validation errors when moving forward
                if (empty($validation_errors) && $current_step < 4) {
                    // Save data to database before moving to next step
                    $saveResult = savePDTPFormData($currentUser, $form_data, $current_step + 1, $selected_program_key);
                    if ($saveResult['success']) {
                        $_SESSION['pdtp_application_step'] = $current_step + 1;
                        $current_step = $_SESSION['pdtp_application_step'];
                        $success_message = "Progress saved and moved to next step!";
                    } else {
                        $error_message = "Error saving progress: " . $saveResult['error'];
                    }
                }
                break;
            case 'previous':
                // Always allow going backward without validation
                if ($current_step > 1) {
                    $_SESSION['pdtp_application_step'] = $current_step - 1;
                    $current_step = $_SESSION['pdtp_application_step'];
                    // Clear any validation errors when going backward
                    $validation_errors = [];
                    $validation_warnings = [];
                }
                break;
            case 'save':
                // Save progress without advancing (no validation required)
                $saveResult = savePDTPFormData($currentUser, $form_data, $current_step, $selected_program_key);
                if ($saveResult['success']) {
                    $success_message = "Progress saved successfully!";
                } else {
                    $error_message = "Error saving progress: " . $saveResult['error'];
                }
                break;
            case 'reset':
                // Reset form - clear database and session data
                try {
                    require_once __DIR__ . '/../includes/database.php';
                    $database = new Database();
                    $pdo = $database->connect();
                    
                    // Check if table exists first
                    $tableCheck = $pdo->query("SHOW TABLES LIKE 'pdtp_applications'");
                    if ($tableCheck->rowCount() > 0) {
                        // Delete any existing application data for this user and program
                        $deleteStmt = $pdo->prepare("DELETE FROM pdtp_applications WHERE user_id = ? AND program_key = ?");
                        $deleteStmt->execute([$currentUser['id'], $selected_program_key]);
                        
                        $deletedRows = $deleteStmt->rowCount();
                        error_log("Deleted $deletedRows rows from pdtp_applications for user ID: " . $currentUser['id']);
                    } else {
                        error_log("Table pdtp_applications does not exist - only clearing session data");
                    }
                    
                    // Clear session data
                    unset($_SESSION['pdtp_form_data']);
                    unset($_SESSION['pdtp_application_step']);
                    
                    // Reset to initial state
                    $_SESSION['pdtp_application_step'] = 1;
                    $_SESSION['pdtp_form_data'] = [];
                    
                    $success_message = "Form has been reset successfully! All data has been cleared and you can start fresh.";
                    $current_step = 1;
                    $form_data = [];
                    
                    error_log("Form reset successful for user ID: " . $currentUser['id'] . " - Step reset to 1");
                    
                } catch (Exception $e) {
                    error_log("Form reset error: " . $e->getMessage());
                    $error_message = "There was an error resetting the form. Please try again or contact support.";
                }
                break;
            case 'submit':
                // Final submission logic
                if (empty($validation_errors)) {
                    // Save final application to database with submitted status
                    $saveResult = savePDTPFormData($currentUser, $form_data, $current_step, $selected_program_key);
                    if ($saveResult['success']) {
                        // Update status to submitted
                        try {
                            $database = new Database();
                            $pdo = $database->connect();
                            $stmt = $pdo->prepare("UPDATE pdtp_applications SET status = 'submitted', submitted_at = NOW() WHERE user_id = ?");
                            $stmt->execute([$currentUser['id']]);
                            
                            $success_message = "Application submitted successfully! You will be contacted soon.";
                            // Clear session data after successful submission
                            unset($_SESSION['pdtp_form_data']);
                            unset($_SESSION['pdtp_application_step']);
                        } catch (Exception $e) {
                            $error_message = "Error updating submission status: " . $e->getMessage();
                        }
                    } else {
                        $error_message = "Error saving application: " . $saveResult['error'];
                    }
                } else {
                    $error_message = "Please fix the validation errors before submitting.";
                }
                break;
        }
    }
    
    // Set error message only for next/submit actions with validation errors
    if (!empty($validation_errors) && isset($_POST['action']) && 
        ($_POST['action'] === 'next' || $_POST['action'] === 'submit')) {
        $error_message = "Please fix the validation errors below.";
    }
}

$form_data = $_SESSION['pdtp_form_data'];
?>

<style>
.step-indicator {
    display: flex;
    justify-content: center;
    margin-bottom: 2rem;
}

.step {
    display: flex;
    align-items: center;
    margin: 0 1rem;
}

.step-number {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin-right: 0.5rem;
}

.step.active .step-number {
    background-color: #1e40af;
    color: white;
}

.step.completed .step-number {
    background-color: #10b981;
    color: white;
}

.step.inactive .step-number {
    background-color: #e5e7eb;
    color: #6b7280;
}

.progress-bar {
    height: 4px;
    background-color: #e5e7eb;
    border-radius: 2px;
    margin-bottom: 2rem;
}

.progress-fill {
    height: 100%;
    background-color: #1e40af;
    border-radius: 2px;
    transition: width 0.3s ease;
}
</style>

<!-- PDTP Application Form -->
<div class="container mx-auto px-4 py-8">
    
    <!-- Page Header -->
    <div class="max-w-4xl mx-auto mb-8">
        <div class="bg-gradient-to-r from-kinpoe-blue to-kinpoe-dark-blue rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <i class="fas fa-graduation-cap text-3xl text-kinpoe-gold"></i>
                    <div>
                        <h1 class="text-2xl font-bold">PDTP Application Form</h1>
                        <p class="text-blue-200">Professional Development Training Program</p>
                    </div>
                </div>
                <a href="index.php?content_file=partials/program_selection.php" 
                   class="bg-kinpoe-light-blue hover:bg-kinpoe-dark-blue text-white px-4 py-2 rounded-lg transition-all duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Programs
                </a>
            </div>
        </div>
    </div>

    <!-- Debug Section (Remove this in production) -->
    <?php if (true): // Set to false to hide debug info ?>
        <div class="max-w-4xl mx-auto mb-6">
            <div class="bg-gray-100 border border-gray-300 rounded-lg p-4">
                <h4 class="font-semibold text-gray-800 mb-2">Debug Info:</h4>
                <div class="text-xs text-gray-600">
                    <p><strong>Current Step:</strong> <?= $current_step ?></p>
                    <p><strong>Selected Program:</strong> <?= htmlspecialchars($selected_program_key) ?></p>
                    <p><strong>Form Action:</strong> <?= htmlspecialchars($_POST['action'] ?? 'none') ?></p>
                    <p><strong>SSC Marks in Session:</strong> <?= htmlspecialchars($form_data['ssc_marks'] ?? 'not set') ?></p>
                    <p><strong>DAE Marks in Session:</strong> <?= htmlspecialchars($form_data['dae_marks'] ?? 'not set') ?></p>
                    <p><strong>DAE Field in Session:</strong> <?= htmlspecialchars($form_data['dae_field'] ?? 'not set') ?></p>
                    <p><strong>DAE Institute in Session:</strong> <?= htmlspecialchars($form_data['dae_institute'] ?? 'not set') ?></p>
                    <p><strong>Subjects in Session:</strong> <?= htmlspecialchars(json_encode($form_data['subjects'] ?? [])) ?></p>
                    <p><strong>Qualification Option:</strong> <?= htmlspecialchars($form_data['qualification_option'] ?? 'not set') ?></p>
                    <p><strong>POST SSC Marks:</strong> <?= htmlspecialchars($_POST['ssc_marks'] ?? 'not in POST') ?></p>
                    <p><strong>Preserved SSC Marks:</strong> <?= htmlspecialchars($_POST['preserved_ssc_marks'] ?? 'not in POST') ?></p>
                    <p><strong>All Session Data:</strong></p>
                    <pre class="bg-white p-2 rounded text-xs overflow-auto max-h-32"><?= htmlspecialchars(print_r($form_data, true)) ?></pre>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($success_message)): ?>
        <div class="max-w-4xl mx-auto mb-6">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                <i class="fas fa-check-circle mr-2"></i><?= htmlspecialchars($success_message) ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($error_message)): ?>
        <div class="max-w-4xl mx-auto mb-6">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                <i class="fas fa-exclamation-circle mr-2"></i><?= htmlspecialchars($error_message) ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($validation_errors)): ?>
        <div class="max-w-4xl mx-auto mb-6">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                <h4 class="font-semibold mb-2"><i class="fas fa-times-circle mr-2"></i>Validation Errors:</h4>
                <ul class="list-disc list-inside space-y-1">
                    <?php foreach ($validation_errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($validation_warnings)): ?>
        <div class="max-w-4xl mx-auto mb-6">
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded-lg">
                <h4 class="font-semibold mb-2"><i class="fas fa-exclamation-triangle mr-2"></i>Important Notice:</h4>
                <ul class="list-disc list-inside space-y-1">
                    <?php foreach ($validation_warnings as $warning): ?>
                        <li><?= htmlspecialchars($warning) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>

    <!-- Progress Bar -->
    <div class="max-w-4xl mx-auto mb-8">
        <div class="progress-bar">
            <div class="progress-fill" style="width: <?= ($current_step / 4) * 100 ?>%"></div>
        </div>
        
        <!-- Step Indicator -->
        <div class="step-indicator">
            <div class="step <?= $current_step >= 1 ? ($current_step > 1 ? 'completed' : 'active') : 'inactive' ?>">
                <div class="step-number">1</div>
                <span class="text-sm font-medium">Personal Info</span>
            </div>
            <div class="step <?= $current_step >= 2 ? ($current_step > 2 ? 'completed' : 'active') : 'inactive' ?>">
                <div class="step-number">2</div>
                <span class="text-sm font-medium">Academic Background</span>
            </div>
            <div class="step <?= $current_step >= 3 ? ($current_step > 3 ? 'completed' : 'active') : 'inactive' ?>">
                <div class="step-number">3</div>
                <span class="text-sm font-medium">Professional Experience</span>
            </div>
            <div class="step <?= $current_step >= 4 ? 'active' : 'inactive' ?>">
                <div class="step-number">4</div>
                <span class="text-sm font-medium">Review & Submit</span>
            </div>
        </div>
    </div>

    <!-- Form Content -->
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-8">
            
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(Security::generateCSRFToken()) ?>">
                
                <!-- Hidden fields to preserve data across qualification option changes -->
                <?php if ($current_step >= 2 && $selected_program_key === 'pdtp'): ?>
                    <!-- Always preserve SSC marks regardless of current qualification option -->
                    <?php if (isset($form_data['ssc_marks']) && $form_data['ssc_marks'] !== ''): ?>
                        <input type="hidden" name="preserved_ssc_marks" value="<?= htmlspecialchars($form_data['ssc_marks']) ?>">
                    <?php endif; ?>
                    
                    <!-- Preserve Option A data when Option B is currently selected -->
                    <?php if (($form_data['qualification_option'] ?? '') === 'option_b'): ?>
                        <?php if (isset($form_data['dae_field']) && $form_data['dae_field'] !== ''): ?>
                            <input type="hidden" name="preserved_dae_field" value="<?= htmlspecialchars($form_data['dae_field']) ?>">
                        <?php endif; ?>
                        <?php if (isset($form_data['dae_institute']) && $form_data['dae_institute'] !== ''): ?>
                            <input type="hidden" name="preserved_dae_institute" value="<?= htmlspecialchars($form_data['dae_institute']) ?>">
                        <?php endif; ?>
                        <?php if (isset($form_data['dae_marks']) && $form_data['dae_marks'] !== ''): ?>
                            <input type="hidden" name="preserved_dae_marks" value="<?= htmlspecialchars($form_data['dae_marks']) ?>">
                        <?php endif; ?>
                        <?php if (isset($form_data['appearing_dae']) && $form_data['appearing_dae'] === 'yes'): ?>
                            <input type="hidden" name="preserved_appearing_dae" value="yes">
                        <?php endif; ?>
                    <?php endif; ?>
                    
                    <!-- Preserve Option B data when Option A is currently selected -->
                    <?php if (($form_data['qualification_option'] ?? '') === 'option_a'): ?>
                        <?php if (isset($form_data['degree_type']) && $form_data['degree_type'] !== ''): ?>
                            <input type="hidden" name="preserved_degree_type" value="<?= htmlspecialchars($form_data['degree_type']) ?>">
                        <?php endif; ?>
                        <?php if (isset($form_data['bsc_institute']) && $form_data['bsc_institute'] !== ''): ?>
                            <input type="hidden" name="preserved_bsc_institute" value="<?= htmlspecialchars($form_data['bsc_institute']) ?>">
                        <?php endif; ?>
                        <?php if (isset($form_data['hsc_marks']) && $form_data['hsc_marks'] !== ''): ?>
                            <input type="hidden" name="preserved_hsc_marks" value="<?= htmlspecialchars($form_data['hsc_marks']) ?>">
                        <?php endif; ?>
                        <?php if (isset($form_data['degree_marks']) && $form_data['degree_marks'] !== ''): ?>
                            <input type="hidden" name="preserved_degree_marks" value="<?= htmlspecialchars($form_data['degree_marks']) ?>">
                        <?php endif; ?>
                        <?php if (isset($form_data['degree_cgpa']) && $form_data['degree_cgpa'] !== ''): ?>
                            <input type="hidden" name="preserved_degree_cgpa" value="<?= htmlspecialchars($form_data['degree_cgpa']) ?>">
                        <?php endif; ?>
                        <?php if (isset($form_data['appearing_degree']) && $form_data['appearing_degree'] === 'yes'): ?>
                            <input type="hidden" name="preserved_appearing_degree" value="yes">
                        <?php endif; ?>
                        <?php if (isset($form_data['subjects']) && is_array($form_data['subjects'])): ?>
                            <?php foreach ($form_data['subjects'] as $subject): ?>
                                <input type="hidden" name="preserved_subjects[]" value="<?= htmlspecialchars($subject) ?>">
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
                
                <?php if ($current_step == 1): ?>
                    <!-- Step 1: Personal Information -->
                    <h2 class="text-2xl font-bold text-kinpoe-blue mb-6">Step 1: Personal Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Full Name (as per CNIC)</label>
                            <input type="text" name="full_name" value="<?= htmlspecialchars($currentUser['full_name']) ?>" readonly
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-50">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">CNIC</label>
                            <input type="text" name="cnic" value="<?= htmlspecialchars($currentUser['cnic']) ?>" readonly
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-50">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" value="<?= htmlspecialchars($currentUser['email']) ?>" readonly
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-50">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Mobile</label>
                            <input type="text" name="mobile" value="<?= htmlspecialchars($currentUser['mobile']) ?>" readonly
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-50">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
                            <input type="date" name="date_of_birth" value="<?= htmlspecialchars($form_data['date_of_birth'] ?? '') ?>" required
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                            <select name="gender" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue">
                                <option value="">Select Gender</option>
                                <option value="male" <?= ($form_data['gender'] ?? '') == 'male' ? 'selected' : '' ?>>Male</option>
                                <option value="female" <?= ($form_data['gender'] ?? '') == 'female' ? 'selected' : '' ?>>Female</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                        <textarea name="address" rows="3" required
                                  class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue"
                                  placeholder="Enter your complete address"><?= htmlspecialchars($form_data['address'] ?? '') ?></textarea>
                    </div>

                <?php elseif ($current_step == 2): ?>
                    <!-- Step 2: Academic Background & PDTP Eligibility -->
                    <h2 class="text-2xl font-bold text-kinpoe-blue mb-6">Step 2: Academic Background & PDTP Eligibility</h2>
                    
                    <?php if ($selected_program_key === 'pdtp'): ?>
                        <!-- PDTP-specific qualification options -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                            <h3 class="font-semibold text-blue-800 mb-2">PDTP Qualification Requirements</h3>
                            <p class="text-blue-700 text-sm">You must meet ONE of the following qualification options:</p>
                        </div>

                        <div class="space-y-6">
                            <!-- Qualification Option Selection -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-3">Select Your Qualification Option</label>
                                <div class="space-y-3">
                                    <label class="flex items-start space-x-3 p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                                        <input type="radio" name="qualification_option" value="option_a" 
                                               <?= ($form_data['qualification_option'] ?? '') == 'option_a' ? 'checked' : '' ?>
                                               class="mt-1" onchange="toggleQualificationFields()">
                                        <div>
                                            <div class="font-medium text-gray-900">Option A: DAE (Diploma of Associate Engineer)</div>
                                            <div class="text-sm text-gray-600">3-year DAE from recognized institute with 60%+ marks in SSC and DAE</div>
                                        </div>
                                    </label>
                                    
                                    <label class="flex items-start space-x-3 p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                                        <input type="radio" name="qualification_option" value="option_b" 
                                               <?= ($form_data['qualification_option'] ?? '') == 'option_b' ? 'checked' : '' ?>
                                               class="mt-1" onchange="toggleQualificationFields()">
                                        <div>
                                            <div class="font-medium text-gray-900">Option B: B.Sc. / ADS</div>
                                            <div class="text-sm text-gray-600">2-year B.Sc. or ADS with Maths + (Physics/Chemistry) with 60%+ marks</div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Option A: DAE Fields -->
                            <div id="option_a_fields" style="display: none;">
                                <h4 class="text-lg font-semibold text-gray-800 mb-4">DAE Qualification Details</h4>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">DAE Field *</label>
                                        <select name="dae_field" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue">
                                            <option value="">Select DAE Field</option>
                                            <option value="chemical" <?= ($form_data['dae_field'] ?? '') == 'chemical' ? 'selected' : '' ?>>Chemical Engineering</option>
                                            <option value="electrical" <?= ($form_data['dae_field'] ?? '') == 'electrical' ? 'selected' : '' ?>>Electrical Engineering</option>
                                            <option value="electronics" <?= ($form_data['dae_field'] ?? '') == 'electronics' ? 'selected' : '' ?>>Electronics Engineering</option>
                                            <option value="mechanical" <?= ($form_data['dae_field'] ?? '') == 'mechanical' ? 'selected' : '' ?>>Mechanical Engineering</option>
                                            <option value="civil" <?= ($form_data['dae_field'] ?? '') == 'civil' ? 'selected' : '' ?>>Civil Engineering</option>
                                            <option value="computer" <?= ($form_data['dae_field'] ?? '') == 'computer' ? 'selected' : '' ?>>Computer Engineering</option>
                                            <option value="hvac" <?= ($form_data['dae_field'] ?? '') == 'hvac' ? 'selected' : '' ?>>HVAC</option>
                                            <option value="metallurgy" <?= ($form_data['dae_field'] ?? '') == 'metallurgy' ? 'selected' : '' ?>>Metallurgy</option>
                                            <option value="instrumentation_control" <?= ($form_data['dae_field'] ?? '') == 'instrumentation_control' ? 'selected' : '' ?>>Instrumentation and Control</option>
                                        </select>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">DAE Institute Name *</label>
                                        <input type="text" name="dae_institute" value="<?= htmlspecialchars($form_data['dae_institute'] ?? '') ?>"
                                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue"
                                               placeholder="Name of institute where you completed DAE">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">SSC Marks (%) *</label>
                                        <input type="number" name="ssc_marks" value="<?= htmlspecialchars($form_data['ssc_marks'] ?? '') ?>" 
                                               min="0" max="100" step="0.01"
                                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue"
                                               placeholder="Minimum 60% required">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">DAE Marks (%) *</label>
                                        <input type="number" name="dae_marks" value="<?= htmlspecialchars($form_data['dae_marks'] ?? '') ?>" 
                                               min="0" max="100" step="0.01"
                                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue"
                                               placeholder="Minimum 60% required">
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" name="appearing_dae" value="yes" 
                                               <?= isset($form_data['appearing_dae']) && $form_data['appearing_dae'] === 'yes' ? 'checked' : '' ?>
                                               class="rounded border-gray-300 text-kinpoe-blue focus:ring-kinpoe-blue">
                                        <span class="text-sm text-gray-700">I am appearing in final DAE exams</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Option B: B.Sc./ADS Fields -->
                            <div id="option_b_fields" style="display: none;">
                                <h4 class="text-lg font-semibold text-gray-800 mb-4">B.Sc./ADS Qualification Details</h4>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Degree Type *</label>
                                        <select name="degree_type" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue">
                                            <option value="">Select Degree Type</option>
                                            <option value="bsc" <?= ($form_data['degree_type'] ?? '') == 'bsc' ? 'selected' : '' ?>>Bachelor of Science (B.Sc.)</option>
                                            <option value="ads" <?= ($form_data['degree_type'] ?? '') == 'ads' ? 'selected' : '' ?>>Associate Degree in Science (ADS)</option>
                                        </select>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">University/Institute *</label>
                                        <input type="text" name="bsc_institute" value="<?= htmlspecialchars($form_data['bsc_institute'] ?? '') ?>"
                                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue"
                                               placeholder="HEC recognized university">
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Subjects Combination *</label>
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                        <?php $subjects = isset($form_data['subjects']) && is_array($form_data['subjects']) ? $form_data['subjects'] : []; ?>
                                        <label class="flex items-center space-x-2">
                                            <input type="checkbox" name="subjects[]" value="maths" 
                                                   <?= in_array('maths', $subjects) ? 'checked' : '' ?>
                                                   class="rounded border-gray-300 text-kinpoe-blue focus:ring-kinpoe-blue">
                                            <span class="text-sm">Mathematics (Compulsory)</span>
                                        </label>
                                        <label class="flex items-center space-x-2">
                                            <input type="checkbox" name="subjects[]" value="physics" 
                                                   <?= in_array('physics', $subjects) ? 'checked' : '' ?>
                                                   class="rounded border-gray-300 text-kinpoe-blue focus:ring-kinpoe-blue">
                                            <span class="text-sm">Physics</span>
                                        </label>
                                        <label class="flex items-center space-x-2">
                                            <input type="checkbox" name="subjects[]" value="chemistry" 
                                                   <?= in_array('chemistry', $subjects) ? 'checked' : '' ?>
                                                   class="rounded border-gray-300 text-kinpoe-blue focus:ring-kinpoe-blue">
                                            <span class="text-sm">Chemistry</span>
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">Select Maths + (Physics OR Chemistry)</p>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">SSC Marks (%) *</label>
                                        <input type="number" name="ssc_marks" value="<?= htmlspecialchars($form_data['ssc_marks'] ?? '') ?>" 
                                               min="0" max="100" step="0.01"
                                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue"
                                               placeholder="Minimum 60%">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">HSC Marks (%) *</label>
                                        <input type="number" name="hsc_marks" value="<?= htmlspecialchars($form_data['hsc_marks'] ?? '') ?>" 
                                               min="0" max="100" step="0.01"
                                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue"
                                               placeholder="Minimum 60%">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Degree Marks (%) *</label>
                                        <input type="number" name="degree_marks" value="<?= htmlspecialchars($form_data['degree_marks'] ?? '') ?>" 
                                               min="0" max="100" step="0.01"
                                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue"
                                               placeholder="Minimum 60%">
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">OR Degree CGPA</label>
                                        <input type="number" name="degree_cgpa" value="<?= htmlspecialchars($form_data['degree_cgpa'] ?? '') ?>" 
                                               min="0" max="4" step="0.01"
                                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue"
                                               placeholder="Minimum 2.5 CGPA">
                                        <p class="text-xs text-gray-500 mt-1">Provide either percentage OR CGPA</p>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" name="appearing_degree" value="yes" 
                                               <?= isset($form_data['appearing_degree']) && $form_data['appearing_degree'] === 'yes' ? 'checked' : '' ?>
                                               class="rounded border-gray-300 text-kinpoe-blue focus:ring-kinpoe-blue">
                                        <span class="text-sm text-gray-700">I am appearing in final degree exams</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Non-PDTP academic background (simplified) -->
                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Highest Degree</label>
                                    <select name="highest_degree" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue">
                                        <option value="">Select Degree</option>
                                        <option value="bachelor" <?= ($form_data['highest_degree'] ?? '') == 'bachelor' ? 'selected' : '' ?>>Bachelor's</option>
                                        <option value="master" <?= ($form_data['highest_degree'] ?? '') == 'master' ? 'selected' : '' ?>>Master's</option>
                                        <option value="phd" <?= ($form_data['highest_degree'] ?? '') == 'phd' ? 'selected' : '' ?>>PhD</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Field of Study</label>
                                    <input type="text" name="field_of_study" value="<?= htmlspecialchars($form_data['field_of_study'] ?? '') ?>" required
                                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue"
                                           placeholder="e.g., Computer Science, Engineering">
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                <?php elseif ($current_step == 3): ?>
                    <!-- Step 3: Professional Experience -->
                    <h2 class="text-2xl font-bold text-kinpoe-blue mb-6">Step 3: Professional Experience</h2>
                    
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Current Job Title</label>
                                <input type="text" name="job_title" value="<?= htmlspecialchars($form_data['job_title'] ?? '') ?>"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue"
                                       placeholder="e.g., Software Engineer, Manager">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Organization</label>
                                <input type="text" name="organization" value="<?= htmlspecialchars($form_data['organization'] ?? '') ?>"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue"
                                       placeholder="Current employer">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Years of Experience</label>
                                <select name="experience_years" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue">
                                    <option value="">Select Experience</option>
                                    <option value="0-1" <?= ($form_data['experience_years'] ?? '') == '0-1' ? 'selected' : '' ?>>0-1 years</option>
                                    <option value="2-5" <?= ($form_data['experience_years'] ?? '') == '2-5' ? 'selected' : '' ?>>2-5 years</option>
                                    <option value="6-10" <?= ($form_data['experience_years'] ?? '') == '6-10' ? 'selected' : '' ?>>6-10 years</option>
                                    <option value="10+" <?= ($form_data['experience_years'] ?? '') == '10+' ? 'selected' : '' ?>>10+ years</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Industry</label>
                                <input type="text" name="industry" value="<?= htmlspecialchars($form_data['industry'] ?? '') ?>"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue"
                                       placeholder="e.g., IT, Healthcare, Finance">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Why do you want to join PDTP?</label>
                            <textarea name="motivation" rows="4" required
                                      class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue"
                                      placeholder="Explain your motivation and career goals..."><?= htmlspecialchars($form_data['motivation'] ?? '') ?></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">CV/Resume (PDF)</label>
                            <input type="file" name="cv" accept=".pdf" 
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue">
                            <p class="text-xs text-gray-500 mt-1">Upload PDF file (max 5MB)</p>
                        </div>
                    </div>

                <?php elseif ($current_step == 4): ?>
                    <!-- Step 4: Review & Submit -->
                    <h2 class="text-2xl font-bold text-kinpoe-blue mb-6">Step 4: Review & Submit</h2>
                    
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Application Summary</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                            <div>
                                <h4 class="font-semibold text-gray-700 mb-2">Personal Information</h4>
                                <p><strong>Name:</strong> <?= htmlspecialchars($currentUser['full_name']) ?></p>
                                <p><strong>CNIC:</strong> <?= htmlspecialchars($currentUser['cnic']) ?></p>
                                <p><strong>Email:</strong> <?= htmlspecialchars($currentUser['email']) ?></p>
                                <p><strong>Mobile:</strong> <?= htmlspecialchars($currentUser['mobile']) ?></p>
                                <p><strong>Date of Birth:</strong> <?= htmlspecialchars($form_data['date_of_birth'] ?? 'Not provided') ?></p>
                                <p><strong>Gender:</strong> <?= htmlspecialchars(ucfirst($form_data['gender'] ?? 'Not provided')) ?></p>
                            </div>
                            
                            <div>
                                <h4 class="font-semibold text-gray-700 mb-2">Academic Background</h4>
                                <p><strong>Highest Degree:</strong> <?= htmlspecialchars(ucfirst($form_data['highest_degree'] ?? 'Not provided')) ?></p>
                                <p><strong>Field:</strong> <?= htmlspecialchars($form_data['field_of_study'] ?? 'Not provided') ?></p>
                                <p><strong>Institution:</strong> <?= htmlspecialchars($form_data['institution'] ?? 'Not provided') ?></p>
                                <p><strong>Graduation:</strong> <?= htmlspecialchars($form_data['graduation_year'] ?? 'Not provided') ?></p>
                                <p><strong>CGPA:</strong> <?= htmlspecialchars($form_data['cgpa'] ?? 'Not provided') ?></p>
                            </div>
                            
                            <div class="md:col-span-2">
                                <h4 class="font-semibold text-gray-700 mb-2">Professional Experience</h4>
                                <p><strong>Job Title:</strong> <?= htmlspecialchars($form_data['job_title'] ?? 'Not provided') ?></p>
                                <p><strong>Organization:</strong> <?= htmlspecialchars($form_data['organization'] ?? 'Not provided') ?></p>
                                <p><strong>Experience:</strong> <?= htmlspecialchars($form_data['experience_years'] ?? 'Not provided') ?></p>
                                <p><strong>Industry:</strong> <?= htmlspecialchars($form_data['industry'] ?? 'Not provided') ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                        <div class="flex items-center">
                            <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                            <p class="text-blue-800 text-sm">
                                Please review all information carefully before submitting. Once submitted, you cannot modify your application.
                            </p>
                        </div>
                    </div>

                <?php endif; ?>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-8">
                    <div class="flex space-x-3">
                        <?php if ($current_step > 1): ?>
                            <button type="submit" name="action" value="previous" 
                                    class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg transition-all duration-300">
                                <i class="fas fa-arrow-left mr-2"></i>Previous
                            </button>
                        <?php endif; ?>
                        
                        <!-- Reset Form Button -->
                        <button type="submit" name="action" value="reset" 
                                onclick="return confirm('Are you sure you want to reset the form? This will permanently delete all your entered data and cannot be undone.')"
                                class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-lg transition-all duration-300">
                            <i class="fas fa-trash-alt mr-2"></i>Reset Form
                        </button>
                    </div>
                    
                    <div class="space-x-3">
                        <button type="submit" name="action" value="save" 
                                class="bg-kinpoe-gold hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded-lg transition-all duration-300">
                            <i class="fas fa-save mr-2"></i>Save Progress
                        </button>
                        
                        <?php if ($current_step < 4): ?>
                            <button type="submit" name="action" value="next" 
                                    class="bg-kinpoe-blue hover:bg-kinpoe-dark-blue text-white font-bold py-2 px-6 rounded-lg transition-all duration-300">
                                Next<i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        <?php else: ?>
                            <button type="submit" name="action" value="submit" 
                                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg transition-all duration-300">
                                <i class="fas fa-paper-plane mr-2"></i>Submit Application
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// JavaScript for real-time form validation and field toggling
function toggleQualificationFields() {
    const optionA = document.querySelector('input[name="qualification_option"][value="option_a"]');
    const optionB = document.querySelector('input[name="qualification_option"][value="option_b"]');
    const optionAFields = document.getElementById('option_a_fields');
    const optionBFields = document.getElementById('option_b_fields');
    
    if (optionA && optionA.checked) {
        optionAFields.style.display = 'block';
        optionBFields.style.display = 'none';
    } else if (optionB && optionB.checked) {
        optionAFields.style.display = 'none';
        optionBFields.style.display = 'block';
    } else {
        optionAFields.style.display = 'none';
        optionBFields.style.display = 'none';
    }
}

// Age validation in real-time
function validateAge() {
    const dobInput = document.querySelector('input[name="date_of_birth"]');
    if (dobInput && dobInput.value) {
        const birthDate = new Date(dobInput.value);
        const deadlineDate = new Date('<?= $program_info['deadline'] ?? date('Y-m-d') ?>');
        const age = Math.floor((deadlineDate - birthDate) / (365.25 * 24 * 60 * 60 * 1000));
        
        const ageWarning = document.getElementById('age-warning');
        if (age > 25) {
            if (!ageWarning) {
                const warning = document.createElement('div');
                warning.id = 'age-warning';
                warning.className = 'text-red-600 text-sm mt-1';
                warning.innerHTML = '<i class="fas fa-exclamation-circle mr-1"></i>Age exceeds 25 years limit';
                dobInput.parentNode.appendChild(warning);
            }
            dobInput.className = dobInput.className.replace('focus:ring-kinpoe-blue', 'focus:ring-red-500 border-red-500');
        } else {
            if (ageWarning) {
                ageWarning.remove();
            }
            dobInput.className = dobInput.className.replace('focus:ring-red-500 border-red-500', 'focus:ring-kinpoe-blue');
        }
    }
}

// Marks validation
function validateMarks(input, minValue = 60) {
    const value = parseFloat(input.value);
    const warningId = input.name + '-warning';
    let warning = document.getElementById(warningId);
    
    if (value > 0 && value < minValue) {
        if (!warning) {
            warning = document.createElement('div');
            warning.id = warningId;
            warning.className = 'text-red-600 text-sm mt-1';
            warning.innerHTML = `<i class="fas fa-exclamation-circle mr-1"></i>Minimum ${minValue}% required`;
            input.parentNode.appendChild(warning);
        }
        input.className = input.className.replace('focus:ring-kinpoe-blue', 'focus:ring-red-500 border-red-500');
    } else {
        if (warning) {
            warning.remove();
        }
        input.className = input.className.replace('focus:ring-red-500 border-red-500', 'focus:ring-kinpoe-blue');
    }
}

// CGPA validation
function validateCGPA(input, minValue = 2.5) {
    const value = parseFloat(input.value);
    const warningId = input.name + '-warning';
    let warning = document.getElementById(warningId);
    
    if (value > 0 && value < minValue) {
        if (!warning) {
            warning = document.createElement('div');
            warning.id = warningId;
            warning.className = 'text-red-600 text-sm mt-1';
            warning.innerHTML = `<i class="fas fa-exclamation-circle mr-1"></i>Minimum ${minValue} CGPA required`;
            input.parentNode.appendChild(warning);
        }
        input.className = input.className.replace('focus:ring-kinpoe-blue', 'focus:ring-red-500 border-red-500');
    } else {
        if (warning) {
            warning.remove();
        }
        input.className = input.className.replace('focus:ring-red-500 border-red-500', 'focus:ring-kinpoe-blue');
    }
}

// Initialize form on page load
document.addEventListener('DOMContentLoaded', function() {
    // Show appropriate qualification fields on page load
    toggleQualificationFields();
    
    // Add event listeners
    const dobInput = document.querySelector('input[name="date_of_birth"]');
    if (dobInput) {
        dobInput.addEventListener('change', validateAge);
    }
    
    // Add marks validation listeners
    const marksInputs = document.querySelectorAll('input[name$="_marks"]');
    marksInputs.forEach(input => {
        input.addEventListener('input', () => validateMarks(input));
    });
    
    // Add CGPA validation listener
    const cgpaInput = document.querySelector('input[name="degree_cgpa"]');
    if (cgpaInput) {
        cgpaInput.addEventListener('input', () => validateCGPA(cgpaInput));
    }
    
    // Qualification option change listeners
    const qualificationOptions = document.querySelectorAll('input[name="qualification_option"]');
    qualificationOptions.forEach(option => {
        option.addEventListener('change', toggleQualificationFields);
    });
});
</script>
