<?php
// index.php - Secure main entry point

// Whitelist of allowed content files (relative to project root)
$allowed_files = [
    'pages/home.php',
    'pages/about.php',
    'pages/application-status.php',
    'pages/apply.php',
    'pages/contact.php',
    'pages/gallery.php',
    'pages/programs.php',
    'pages/qec.php',
    'pages/research.php',
    'pages/resources.php',
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
    case 'pages/about.php':
        $title = 'About - KINPOE';
        break;
    case 'pages/application-status.php':
        $title = 'Application Status - KINPOE';
        break;
    case 'pages/apply.php':
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
    case 'pages/home.php':
    default:
        $title = 'Home - KINPOE';
        break;
}

include 'layouts/main.php';
?>