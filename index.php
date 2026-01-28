<?php
// Include the central configuration file using an absolute path
require_once __DIR__ . "/config.php";

// Define the active page for navbar highlighting
$activePage = 'home';

// Detect the current language from cookies or default to English
$lang = $_COOKIE['language'] ?? 'en';
?>

<!DOCTYPE html>
<!-- Define the document language dynamically -->
<html lang="<?= $lang ?>">
<head>
    <!-- Define character encoding -->
    <meta charset="UTF-8">

    <!-- Ensure proper responsive behavior on all devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page title displayed in the browser tab -->
    <title>University of Mascareignes</title>

    <!-- Load main global stylesheet -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>styles.css">

    <!-- Load navbar specific styles -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>Navbar/navbar_styles.css">

    <!-- Load navbar JavaScript logic -->
    <script defer src="<?= ROOT_URL ?>Navbar/navbar_script.js"></script>

    <!-- Load hero section JavaScript logic -->
    <script defer src="<?= ROOT_URL ?>script.js"></script>
</head>

<body>

    <!-- Include the navigation bar -->
    <?php include NAVBAR_PATH . "navbar.php"; ?>

    <!-- Hero section wrapper -->
    <div class="hero">

        <!-- Container holding all hero slides -->
        <div class="hero-slides">

            <!-- First hero slide and default active slide -->
            <div class="hero-slide active" data-index="0">

                <!-- Background image for first slide -->
                <div class="hero-bg-image"
                     style="background-image: url('<?= ASSET_URL ?>images/hero.jpg');"></div>
            </div>

            <!-- Second hero slide -->
            <div class="hero-slide" data-index="1">

                <!-- Background image for second slide -->
                <div class="hero-bg-image"
                     style="background-image: url('<?= ASSET_URL ?>images/lab.jpg');"></div>
            </div>

            <!-- Third hero slide -->
            <div class="hero-slide" data-index="2">

                <!-- Background image for third slide -->
                <div class="hero-bg-image"
                     style="background-image: url('<?= ASSET_URL ?>images/class.jpg');"></div>
            </div>

            <!-- Fourth hero slide -->
            <div class="hero-slide" data-index="3">

                <!-- Background image for fourth slide -->
                <div class="hero-bg-image"
                     style="background-image: url('<?= ASSET_URL ?>images/comp.jpg');"></div>
            </div>

        </div>

        <!-- Gradient overlay for better text readability -->
        <div class="hero-gradient"></div>

        <!-- Main hero content container -->
        <div class="hero-content">

            <!-- Left side text content -->
            <div class="hero-info">

                <!-- University label -->
                <p class="hero-tag">UNIVERSITY OF MASCAREIGNES</p>

                <!-- Dynamic hero title -->
                <h1 class="hero-title"></h1>

                <!-- Dynamic hero description -->
                <p class="hero-desc"></p>

                <!-- Call to action button -->
                <button class="hero-btn" id="hero-btn">View Courses</button>
            </div>

            <!-- Right side preview cards -->
            <div class="hero-right">

                <!-- Wrapper for preview cards -->
                <div class="previews-wrapper">

                    <!-- Sliding track for previews -->
                    <div class="previews-track">

                        <!-- First preview card and default active preview -->
                        <div class="preview-card active" data-index="0">

                            <!-- Background image for preview -->
                            <div class="preview-bg preview-bg-0"></div>

                            <!-- Preview text content -->
                            <div class="preview-text">
                                <span class="preview-label">Welcome to</span>
                                <span class="preview-title">University of Mascareignes</span>
                            </div>
                        </div>

                        <!-- Second preview card -->
                        <div class="preview-card" data-index="1">

                            <!-- Background image for preview -->
                            <div class="preview-bg preview-bg-1"></div>

                            <!-- Preview text content -->
                            <div class="preview-text">
                                <span class="preview-label">Faculty</span>
                                <span class="preview-title">Sustainable Development & Engineering</span>
                            </div>
                        </div>

                        <!-- Third preview card -->
                        <div class="preview-card" data-index="2">

                            <!-- Background image for preview -->
                            <div class="preview-bg preview-bg-2"></div>

                            <!-- Preview text content -->
                            <div class="preview-text">
                                <span class="preview-label">Faculty</span>
                                <span class="preview-title">Business & Management</span>
                            </div>
                        </div>

                        <!-- Fourth preview card -->
                        <div class="preview-card" data-index="3">

                            <!-- Background image for preview -->
                            <div class="preview-bg preview-bg-3"></div>

                            <!-- Preview text content -->
                            <div class="preview-text">
                                <span class="preview-label">Faculty</span>
                                <span class="preview-title">Information & Communication Technology</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- Hero navigation controls -->
        <div class="hero-controls">

            <!-- Previous slide button -->
            <button class="arrow arrow-left" id="arrow-left">&#10094;</button>

            <!-- Next slide button -->
            <button class="arrow arrow-right" id="arrow-right">&#10095;</button>

            <!-- Progress bar container -->
            <div class="progress-track">

                <!-- Animated progress bar fill -->
                <div class="progress-bar-fill"></div>
            </div>

            <!-- Slide number display -->
            <div class="slide-number">
                <span class="slide-number-current">1</span>
                <span class="slide-number-separator">/</span>
                <span class="slide-number-total">4</span>
            </div>
        </div>
    </div>

</body>
</html>
