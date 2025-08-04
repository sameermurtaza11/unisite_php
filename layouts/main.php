<!-- main.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Karachi Institute of Power Engineering (KINPOE)' ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'kinpoe-blue': '#1e40af',
                        'kinpoe-light-blue': '#3b82f6',
                        'kinpoe-dark-blue': '#1e3a8a',
                        'kinpoe-gold': '#f59e0b',
                        'kinpoe-gray': '#6b7280'
                    }
                }
            }
        }
    </script>
    <!-- <style>
        *{
            outline: 1px solid green;
        }
    </style> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="static/media/kinpoe_logo.png">

    <?php if (!empty($extra_head)) echo $extra_head; ?>
</head>

<body class="bg-gray-50">

    <!--Announcement Header -->
    <?php include 'partials/header.php'; ?>

    <!-- Navbar -->
    <?php include 'partials/navbar.php'; ?>

    <!-- Main -->
    <main>
        <?php include $content_file; ?>
    </main>

    <!-- Footer -->
    <?php include 'partials/footer.php'; ?>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.min.js" defer></script>
    <?php if (!empty($scripts)) echo $scripts; ?>
</body>

</html>