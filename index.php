<?php
// index.php - Secure main entry point

// Start session at the very beginning
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Whitelist of allowed content files (relative to project root)
$allowed_files = [
    'pages/home.php',
    'pages/about.php',
    'pages/application-status.php',
    'pages/contact.php',
    'pages/gallery.php',
    'pages/programs.php',
    'pages/qec.php',
    'pages/research.php',
    'pages/resources.php',
    'pages/admin_panel.php',
    'partials/program_selection.php',
    'partials/register.php',
    'partials/login.php',
    'partials/form_pdtp.php'
];

$content_file = isset($_GET['content_file']) ? $_GET['content_file'] : 'pages/home.php';
if (!in_array($content_file, $allowed_files, true)) {
    // Invalid file requested, fallback to home
    $content_file = 'pages/home.php';
}

// Set X-Frame-Options header to prevent clickjacking
header('X-Frame-Options: DENY');

// Set page title based on content_file
switch ($content_file) {
    case 'partials/register.php':
        $title = 'Register - KINPOE';
        break;
    case 'partials/login.php':
        $title = 'Login - KINPOE';
        break;
    case 'pages/about.php':
        $title = 'About - KINPOE';
        break;
    case 'pages/application-status.php':
        $title = 'Application Status - KINPOE';
        break;
    case 'partials/login.php':
        $title = 'Apply Now - KINPOE';
        break;
    case 'pages/contact.php':
        $title = 'Contact - KINPOE';
        break;
    case 'pages/gallery.php':
        $title = 'Gallery - KINPOE';
        break;
    case 'pages/programs.php':
        $title = 'Programs - KINPOE';
        break;
    case 'pages/qec.php':
        $title = 'QEC - KINPOE';
        break;
    case 'pages/research.php':
        $title = 'Research - KINPOE';
        break;
    case 'pages/resources.php':
        $title = 'Resources - KINPOE';
        break;
    case 'pages/admin_panel.php':
        $title = 'Admin Panel - KINPOE';
        break;
    case 'partials/program_selection.php':
        $title = 'Program Selection - KINPOE';
        break;
    case 'partials/form_pdtp.php':
        $title = 'PDTP Application Form - KINPOE';
        break;
    case 'pages/home.php':
    default:
        $title = 'Home - KINPOE';
        break;
}

include 'layouts/main.php';
