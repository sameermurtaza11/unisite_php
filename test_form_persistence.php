<?php
/**
 * Test script to validate PDTP form data persistence
 * This script simulates the form submission flow to test SSC marks preservation
 */

session_start();

// Test scenario: User enters SSC marks and switches qualification options
echo "<h2>Testing PDTP Form Data Persistence</h2>\n";

// Initialize session data
$_SESSION['selected_program'] = 'pdtp';
$_SESSION['pdtp_application_step'] = 2;
$_SESSION['pdtp_form_data'] = [];

echo "<h3>Test 1: User enters 77% SSC marks in Option A</h3>\n";

// Simulate form submission with Option A and SSC marks
$_POST = [
    'csrf_token' => 'test_token',
    'qualification_option' => 'option_a',
    'ssc_marks' => '77',
    'dae_field' => 'Electronics',
    'dae_institute' => 'Test Institute'
];

// Simulate the form processing logic
foreach ($_POST as $key => $value) {
    if ($key !== 'csrf_token' && $key !== 'action') {
        $_SESSION['pdtp_form_data'][$key] = $value;
    }
}

echo "After Option A submission:<br>\n";
echo "Session SSC Marks: " . ($_SESSION['pdtp_form_data']['ssc_marks'] ?? 'not set') . "<br>\n";
echo "Session Qualification Option: " . ($_SESSION['pdtp_form_data']['qualification_option'] ?? 'not set') . "<br>\n";
echo "Session Data: " . print_r($_SESSION['pdtp_form_data'], true) . "<br>\n";

echo "<h3>Test 2: User switches to Option B</h3>\n";

// Simulate form submission when switching to Option B
$_POST = [
    'csrf_token' => 'test_token',
    'qualification_option' => 'option_b',
    // Simulate preserved values from our hidden fields
    'preserved_ssc_marks' => $_SESSION['pdtp_form_data']['ssc_marks'] ?? '',
    'preserved_dae_field' => $_SESSION['pdtp_form_data']['dae_field'] ?? '',
    'preserved_dae_institute' => $_SESSION['pdtp_form_data']['dae_institute'] ?? ''
];

// Simulate the new processing logic with preserved values
foreach ($_POST as $key => $value) {
    if ($key !== 'csrf_token' && $key !== 'action') {
        $_SESSION['pdtp_form_data'][$key] = $value;
    }
}

// Process preserved values
if (isset($_POST['preserved_ssc_marks']) && $_POST['preserved_ssc_marks'] !== '') {
    if (!isset($_POST['ssc_marks']) || $_POST['ssc_marks'] === '') {
        $_SESSION['pdtp_form_data']['ssc_marks'] = $_POST['preserved_ssc_marks'];
    }
}

if (isset($_POST['preserved_dae_field'])) $_SESSION['pdtp_form_data']['dae_field'] = $_POST['preserved_dae_field'];
if (isset($_POST['preserved_dae_institute'])) $_SESSION['pdtp_form_data']['dae_institute'] = $_POST['preserved_dae_institute'];

echo "After switching to Option B:<br>\n";
echo "Session SSC Marks: " . ($_SESSION['pdtp_form_data']['ssc_marks'] ?? 'not set') . "<br>\n";
echo "Session Qualification Option: " . ($_SESSION['pdtp_form_data']['qualification_option'] ?? 'not set') . "<br>\n";
echo "Preserved SSC from POST: " . ($_POST['preserved_ssc_marks'] ?? 'not in POST') . "<br>\n";
echo "Session Data: " . print_r($_SESSION['pdtp_form_data'], true) . "<br>\n";

echo "<h3>Test Result</h3>\n";
if (($_SESSION['pdtp_form_data']['ssc_marks'] ?? '') === '77') {
    echo "<span style='color: green;'>✅ SUCCESS: SSC marks preserved correctly (77%)</span><br>\n";
} else {
    echo "<span style='color: red;'>❌ FAILURE: SSC marks not preserved. Current value: " . ($_SESSION['pdtp_form_data']['ssc_marks'] ?? 'not set') . "</span><br>\n";
}

// Clean up
unset($_SESSION['pdtp_form_data']);
unset($_SESSION['selected_program']);
unset($_SESSION['pdtp_application_step']);
?>
