<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . "/../config.php"; 
$lang = $_COOKIE['language'] ?? 'en';
$activePage = $activePage ?? ''; // Must be set on each page: $activePage = 'home'; etc.

// Determine profile picture path
$defaultProfilePic = ASSET_URL . 'images/profile.png'; // Your default image in images/
$customProfilePic = !empty($_SESSION['profile_pic']) 
    ? ROOT_URL . 'uploads/profile_pics/' . htmlspecialchars($_SESSION['profile_pic']) 
    : $defaultProfilePic;

$profilePicSrc = $defaultProfilePic;
if (isset($_SESSION['user_id']) && !empty($_SESSION['profile_pic'])) {
    $fullPath = ROOT_PATH . '/uploads/profile_pics/' . $_SESSION['profile_pic'];
    if (file_exists($fullPath)) {
        $profilePicSrc = $customProfilePic;
    }
}
?>

<nav class="top-nav">
    <!-- LEFT: LOGO -->
    <div class="nav-left">
        <a href="<?= ROOT_URL ?>Index/index.php" class="nav-logo">
            <img src="<?= ASSET_URL ?>images/udm_badge.png" alt="UDM logo" class="nav-logo-img">
            <div class="nav-logo-text">
                <span class="nav-university">University of Mascareignes</span>
                <span class="nav-tagline">Knowledge is Power</span>
            </div>
        </a>
    </div>

    <!-- CENTER: NAVIGATION LINKS -->
    <div class="nav-center">
        <a href="<?= ROOT_URL ?>index.php" class="nav-link <?= $activePage === 'home' ? 'active' : '' ?>">Home</a>
        <a href="<?= ROOT_URL ?>Courses/courses.php" class="nav-link <?= $activePage === 'courses' ? 'active' : '' ?>">Courses</a>
        <a href="<?= ROOT_URL ?>Application/apply.php" class="nav-link <?= $activePage === 'application' ? 'active' : '' ?>">Application</a>
        <a href="<?= ROOT_URL ?>Events/events.php" class="nav-link <?= $activePage === 'events' ? 'active' : '' ?>">Events</a>
        <a href="<?= ROOT_URL ?>About/about.php" class="nav-link <?= $activePage === 'about' ? 'active' : '' ?>">About</a>
    </div>

    <!-- RIGHT: AUTH + LANGUAGE -->
    <div class="nav-right">
        <?php if (!isset($_SESSION['user_id'])): ?>
            <!-- NOT LOGGED IN -->
            <button id="loginSignupBtn" class="btn-primary">Login / Signup</button>
        <?php else: ?>
            <!-- LOGGED IN - Profile Dropdown -->
            <div class="user-menu" id="userMenuContainer">
                <img src="<?= $profilePicSrc ?>" 
                     alt="Profile Picture" 
                     class="user-icon" 
                     id="userMenuBtn"
                     onerror="this.src='<?= $defaultProfilePic ?>'"> <!-- Fallback if image fails -->

                <div id="userDropdown" class="dropdown-menu">
                    <a href="<?= ROOT_URL ?>Dashboard/dashboard.php" class="dropdown-item">
                        Dashboard
                    </a>
                    <a href="<?= ROOT_URL ?>Settings/settings.php" class="dropdown-item">
                        Settings
                    </a>
                    <hr class="dropdown-divider">
                    <a href="<?= ROOT_URL ?>Auth/logout.php" class="dropdown-item text-danger">
                        Logout
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <!-- Language Switch -->
        <button type="button" class="lang-switch" id="langSwitch" data-lang="<?= $lang === 'fr' ? 'FR' : 'EN' ?>">
            <span class="lang-thumb"></span>
            <span class="lang-label lang-en">EN</span>
            <span class="lang-label lang-fr">FR</span>
        </button>
    </div>
</nav>

<!-- Styles & Script -->
<link rel="stylesheet" href="<?= ROOT_URL ?>Navbar/navbar_styles.css">
<script defer src="<?= ROOT_URL ?>Navbar/navbar_script.php"></script> <!-- PHP Script for JS -->

<!-- LOGIN / SIGNUP MODAL -->
<div id="loginSignupModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>

        <!-- Tabs -->
        <div class="tabs">
            <button class="tab-btn active" data-form="signup">Sign Up</button>
            <button class="tab-btn" data-form="login">Login</button>
        </div>

        <!-- ========== SIGN UP FORM ========== -->
        <form id="signupForm" class="form-container active" method="POST" action="register.php">
            <div class="input-group">
                <input type="text" name="first_name" placeholder="First Name" required>
                <span class="input-icon">👤</span>
            </div>
            <div class="input-group">
                <input type="text" name="last_name" placeholder="Last Name" required>
                <span class="input-icon">👤</span>
            </div>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
                <span class="input-icon">✉</span>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
                <span class="input-icon">🔒</span>
            </div>
            <div class="input-group">
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <span class="input-icon">🔒</span>
            </div>

            <label class="checkbox-container">
                <input type="checkbox" name="terms" required>
                <span class="checkmark"></span>
                I agree to the <a href="#" class="link">Terms and Conditions</a>
            </label>

            <button type="submit" class="btn-submit">Sign Up</button>
        </form>

        <!-- ========== LOGIN FORM ========== -->
        <form id="loginForm" class="form-container" method="POST" action="login.php">
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
                <span class="input-icon">✉</span>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
                <span class="input-icon">🔒</span>
            </div>

            <label class="checkbox-container">
                <input type="checkbox" name="rememberMe">
                <span class="checkmark"></span>
                Remember me
            </label>

            <button type="submit" class="btn-submit">Login</button>

            <!-- Forgot Password link -->
            <div class="forgot-password-link">
                <a href="forgot-password.php">Forgot Password?</a>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    /* ========================================
       1. LOGIN / SIGNUP MODAL
       ======================================== */
    const modal = document.getElementById("loginSignupModal");
    const openBtn = document.getElementById("loginSignupBtn");
    const closeBtn = document.querySelector(".close-btn");
    const tabButtons = document.querySelectorAll(".tab-btn");
    const forms = document.querySelectorAll(".form-container");

    if (openBtn) {
        openBtn.addEventListener("click", () => {
            modal.style.display = "flex";
            document.body.style.overflow = "hidden";
        });
    }

    const closeModal = () => {
        modal.style.display = "none";
        document.body.style.overflow = "auto";
    };

    if (closeBtn) closeBtn.addEventListener("click", closeModal);
    modal.addEventListener("click", (e) => { if (e.target === modal) closeModal(); });
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && modal.style.display === "flex") closeModal();
    });

    tabButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            const target = btn.dataset.form;
            tabButtons.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
            forms.forEach(f => f.classList.toggle("active", f.id === target + "Form"));
        });
    });

});
</script>
