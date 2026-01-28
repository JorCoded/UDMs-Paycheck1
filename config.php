<?php
/* ============================================================
   1. PROJECT ROOT
============================================================ */

/* Change ONLY if your project folder name changes */
$projectFolder = "/UDM_webreboot/";

/* URLs used in links, CSS, JS, and images */
define("ROOT_URL", $projectFolder);

/* Absolute server path used for PHP includes */
define("ROOT_PATH", __DIR__ . "/");

/* ============================================================
   2. ASSETS
============================================================ */

/* Base assets URL (images, icons, media) */
define("ASSET_URL", ROOT_URL . "Assets/");

/* Index page CSS directory */
define("CSS_URL", ROOT_URL . "Index/");

/* Index page JS directory */
define("JS_URL", ROOT_URL . "Index/");

/* ============================================================
   3. NAVBAR & FOOTER
============================================================ */

/* Server path to navbar files */
define("NAVBAR_PATH", ROOT_PATH . "Navbar/");

/* Server path to footer files */
define("FOOTER_PATH", ROOT_PATH . "Navbar/");

/* ============================================================
   4. PAGES
============================================================ */

/* About page server path */
define("ABOUT_PATH", ROOT_PATH . "About/");

/* About page public URL */
define("ABOUT_URL", ROOT_URL . "About/");

/* Application page server path */
define("APPLICATION_PATH", ROOT_PATH . "Application/");

/* Application page public URL */
define("APPLICATION_URL", ROOT_URL . "Application/");

/* Coming Soon page server path */
define("COMING_SOON_PATH", ROOT_PATH . "coming_soon/");

/* Coming Soon page public URL */
define("COMING_SOON_URL", ROOT_URL . "coming_soon/");

/* ============================================================
   5. AUTH / LOGIN
============================================================ */

/* Authentication folder server path */
define("LOGIN_REGISTER_PATH", ROOT_PATH . "login_register/");

/* Authentication folder public URL */
define("LOGIN_REGISTER_URL", ROOT_URL . "login_register/");

/* Login page URL */
define("LOGIN_URL", LOGIN_REGISTER_URL . "login.php");

/* Registration page URL */
define("REGISTER_URL", LOGIN_REGISTER_URL . "register.php");

/* Forgot password page URL */
define("FORGOT_PASSWORD_URL", LOGIN_REGISTER_URL . "forgot-password.php");

/* ============================================================
   6. UPLOADS & IMAGES
============================================================ */

/* Profile picture uploads server path */
define("UPLOADS_PATH", ROOT_PATH . "uploads/profile_pics/");

/* Profile picture uploads public URL */
define("UPLOADS_URL", ROOT_URL . "uploads/profile_pics/");

/* Default staff profile image */
define("STAFF_IMG", ASSET_URL . "images/staff_profile.jpg");

/* Default user profile picture */
define("DEFAULT_PROFILE_PIC", ASSET_URL . "images/profile.png");

/* ============================================================
   7. DATABASE (PDO)
============================================================ */

/* Database host name */
define("DB_HOST", "localhost");

/* Database name (must match phpMyAdmin exactly) */
define("DB_NAME", "udmwebreboot");

/* Database username */
define("DB_USER", "root");

/* Database password */
define("DB_PASS", "");

/* PDO database connection used across the project */
/*try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed.");
}
*/
