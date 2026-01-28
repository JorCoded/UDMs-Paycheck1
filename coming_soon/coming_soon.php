<?php
require_once __DIR__ . "/../config.php";
$lang = $_COOKIE['language'] ?? 'en';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon - Course Page</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>coming_soon/coming_soon.css">
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/navbar_styles.css">
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/auth.css">
    <script src="<?= ROOT_URL ?>assets/language_toggle.js" defer></script>
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/dash_nav.css">
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/dash_nav_teacher.css">

    <script>
        // JavaScript to go back to the previous page after 5 seconds
        setTimeout(() => {
            window.history.back(); // Go back to the previous page
        }, 5000); // 5 seconds
    </script>
</head>
<body>

<div class="coming-soon-container">
    <div class="coming-soon-content">
        <h1>🚧 Page Coming Soon 🚧</h1>
        <p>This course page is currently under development.<br>Check back later for more information.</p>
        <a href="javascript:window.history.back()" class="back-btn">← Back</a>
    </div>
</div>

</body>
</html>