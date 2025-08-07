<?php
require_once __DIR__ . '/auth.php';

$auth = new UserAuth();
$auth->logout();

echo '<script>window.location.href = "../index.php?content_file=partials/login.php&message=logged_out";</script>';
exit();
?>
