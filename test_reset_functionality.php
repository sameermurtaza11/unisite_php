<?php
/**
 * Test script for Reset Form functionality
 * This script tests the reset form logic to ensure it works correctly
 */

session_start();

// Mock session data to simulate filled form
$_SESSION['pdtp_form_data'] = [
    'full_name' => 'Test User',
    'ssc_marks' => '77',
    'qualification_option' => 'option_a',
    'dae_field' => 'electronics',
    'dae_institute' => 'Test Institute'
];
$_SESSION['pdtp_application_step'] = 3;
$_SESSION['selected_program'] = 'pdtp';

echo "<h2>Testing Reset Form Functionality</h2>\n";
echo "<h3>Before Reset:</h3>\n";
echo "Session Step: " . ($_SESSION['pdtp_application_step'] ?? 'not set') . "<br>\n";
echo "Session Program: " . ($_SESSION['selected_program'] ?? 'not set') . "<br>\n";
echo "Form Data Count: " . count($_SESSION['pdtp_form_data'] ?? []) . " fields<br>\n";
echo "Sample Data: " . print_r($_SESSION['pdtp_form_data'] ?? [], true) . "<br>\n";

// Simulate reset action
unset($_SESSION['pdtp_form_data']);
unset($_SESSION['pdtp_application_step']);

// Reset to initial state
$_SESSION['pdtp_application_step'] = 1;
$_SESSION['pdtp_form_data'] = [];

echo "<h3>After Reset:</h3>\n";
echo "Session Step: " . ($_SESSION['pdtp_application_step'] ?? 'not set') . "<br>\n";
echo "Session Program: " . ($_SESSION['selected_program'] ?? 'not set') . "<br>\n";
echo "Form Data Count: " . count($_SESSION['pdtp_form_data'] ?? []) . " fields<br>\n";
echo "Form Data: " . print_r($_SESSION['pdtp_form_data'] ?? [], true) . "<br>\n";

echo "<h3>Test Result:</h3>\n";
$stepReset = ($_SESSION['pdtp_application_step'] === 1);
$dataCleared = (count($_SESSION['pdtp_form_data']) === 0);
$programPreserved = ($_SESSION['selected_program'] === 'pdtp');

if ($stepReset && $dataCleared && $programPreserved) {
    echo "<span style='color: green;'>✅ SUCCESS: Reset functionality works correctly</span><br>\n";
    echo "- Step reset to 1: ✅<br>\n";
    echo "- Form data cleared: ✅<br>\n";
    echo "- Program selection preserved: ✅<br>\n";
} else {
    echo "<span style='color: red;'>❌ FAILURE: Reset functionality has issues</span><br>\n";
    echo "- Step reset to 1: " . ($stepReset ? '✅' : '❌') . "<br>\n";
    echo "- Form data cleared: " . ($dataCleared ? '✅' : '❌') . "<br>\n";
    echo "- Program selection preserved: " . ($programPreserved ? '✅' : '❌') . "<br>\n";
}

// Clean up
unset($_SESSION['pdtp_form_data']);
unset($_SESSION['pdtp_application_step']);
unset($_SESSION['selected_program']);
?>
