<?php
$content_file = isset($_GET['content_file']) ? $_GET['content_file'] : 'pages/home.php';

// Set page title based on content_file
switch ($content_file) {
    case 'pages/about.php':
        $title = 'About - KINPOE';
        break;
    case 'pages/apply.php':
        $title = 'Apply - KINPOE';
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