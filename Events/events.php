<?php
require_once __DIR__ . "/../config.php";
$activePage = 'events';
$lang = $_COOKIE['language'] ?? 'en';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - Université des Mascareignes</title>
    <!-- EVENTS STYLES -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>Events/events.css">
    <!-- NAVBAR & FOOTER -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>Navbar/navbar_styles.css">
    <link rel="stylesheet" href="<?= ROOT_URL ?>Navbar/footer.css">
    <!-- SCRIPTS -->
    <script defer src="<?= ROOT_URL ?>Navbar/navbar_script.js"></script>
    <script defer src="<?= ROOT_URL ?>Events/events.js"></script>
</head>
<body>
<!-- NAVBAR -->
<?php
if ($lang === 'fr') {
    include NAVBAR_PATH . "navbar_fr.php";
} else {
    include NAVBAR_PATH . "navbar.php";
}
?>
<!-- HERO WITH CHRISTMAS BANNER + COUNTDOWN -->
<section class="event-hero">
    <div class="event-hero-bg" style="background-image: url('<?= ASSET_URL ?>images/upcoming.jpeg');"></div>
    <div class="event-hero-overlay"></div>
    <!-- CHRISTMAS COUNTDOWN -->
    <div class="countdown-centered">
        <div class="countdown-card">
            <h3 class="countdown-title">Upcoming Event</h3>
            <div id="countdown" class="countdown-display">
                <div class="time-unit"><span id="days">00</span><span class="label">Days</span></div>
                <div class="time-unit"><span id="hours">00</span><span class="label">Hours</span></div>
                <div class="time-unit"><span id="minutes">00</span><span class="label">Minutes</span></div>
                <div class="time-unit"><span id="seconds">00</span><span class="label">Seconds</span></div>
            </div>
        </div>
    </div>
</section>
<!-- WAVE DIVIDER UNDER COUNTDOWN (ARC ADDED BACK) -->
<div class="event-hero-divider">
    <svg viewBox="0 0 1440 360" preserveAspectRatio="none">
        <path fill="#ffffff"
              d="M0,120 C240,80 480,60 720,65 C960,70 1200,100 1440,135 L1440,300 C1200,250 960,220 720,225 C480,230 240,260 0,300 Z">
        </path>
    </svg>
</div>
<!-- UPCOMING EVENTS GRID -->
<div class="events-section-bg">
    <section class="events-grid-section">
        <div class="events-grid">
            <!-- CHRISTMAS MUSIC TALENT SHOW – FEATURED -->
            <div class="event-card featured">
                <div class="event-date">
                    <div class="day">15</div><div class="month">DEC</div>
                </div>
                <div class="event-info">
                    <h3>AI & Robotics Symposium 2025</h3>
                    <p class="event-location">Bel-Air Research Lab</p>
                    <p class="event-time">9:00 AM – 5:00 PM</p>
                    <a href="<?= COMING_SOON_URL ?>coming_soon.php" class="register-btn">Register Now</a>
                </div>
            </div>
            <div class="event-card">
                <div class="event-date"><div class="day">18</div><div class="month">DEC</div></div>
                <div class="event-info"><h3>Tech Industry Career Fair</h3><p class="event-location">Swami Dayanand Campus</p><p class="event-time">10:00 AM – 4:00 PM</p><a href="<?= COMING_SOON_URL ?>coming_soon.php" class="register-btn">Register Now</a></div>
            </div>
            <div class="event-card">
                <div class="event-date"><div class="day">20</div><div class="month">DEC</div></div>
                <div class="event-info"><h3>National Student Hackathon 2025</h3><p class="event-location">Rose-Hill Campus</p><p class="event-time">8:00 AM – 8:00 PM</p><a href="<?= COMING_SOON_URL ?>coming_soon.php" class="register-btn">Register Now</a></div>
            </div>
            <div class="event-card">
                <div class="event-date"><div class="day">24</div><div class="month">DEC</div></div>
                <div class="event-info">
                    <h3>Christmas Music Talent Show 2025</h3>
                    <p class="event-location">Bel-Air Research Lab</p>
                    <p class="event-time">6:00 PM – 10:00 PM</p>
                    <a href="<?= COMING_SOON_URL ?>" class="register-btn">Register Now</a>
                </div>
            </div>
            <div class="event-card">
                <div class="event-date"><div class="day">10</div><div class="month">JAN</div></div>
                <div class="event-info"><h3>Advanced Cybersecurity Workshop</h3><p class="event-location">Swami Dayanand Campus</p><p class="event-time">9:00 AM – 1:00 PM</p><a href="<?= COMING_SOON_URL ?>coming_soon.php" class="register-btn">Register Now</a></div>
            </div>
            <div class="event-card">
                <div class="event-date"><div class="day">14</div><div class="month">JAN</div></div>
                <div class="event-info"><h3>Data Science & AI Bootcamp</h3><p class="event-location">Bel-Air Research Lab</p><p class="event-time">9:00 AM – 4:00 PM</p><a href="<?= COMING_SOON_URL ?>coming_soon.php" class="register-btn">Register Now</a></div>
            </div>
            <div class="event-card">
                <div class="event-date"><div class="day">22</div><div class="month">JAN</div></div>
                <div class="event-info"><h3>Guest Lecture: Quantum Computing</h3><p class="event-location">Main Auditorium</p><p class="event-time">2:00 PM – 4:00 PM</p><a href="<?= COMING_SOON_URL ?>coming_soon.php" class="register-btn">Register Now</a></div>
            </div>
        </div>
    </section>
</div>
<!-- NEWS & PAST EVENTS – STATIC GRID WITH POPUPS -->
<section class="news-section">
    <div class="container">
        <h2 class="section-title">News & Past Events</h2>

        <div class="news-grid">
            <div class="news-card"
                 style="background-image: url('<?= ASSET_URL ?>images/AI4GOOD.jpg');"
                 data-title="AI4GOOD Initiative Launched"
                 data-popup="<?= ROOT_URL ?>Events/news/ai4good.html">
                <div class="news-title-overlay">AI4GOOD Initiative Launched</div>
            </div>

            <div class="news-card"
                 style="background-image: url('<?= ASSET_URL ?>images/Badminton.jpg');"
                 data-title="Inter-Campus Badminton Championship"
                 data-popup="<?= ROOT_URL ?>Events/news/badminton.html">
                <div class="news-title-overlay">Inter-Campus Badminton Championship</div>
            </div>

            <div class="news-card"
                 style="background-image: url('<?= ASSET_URL ?>images/RESP.jpg');"
                 data-title="Students Present Climate Solutions Showcase"
                 data-popup="<?= ROOT_URL ?>Events/news/resp.html">
                <div class="news-title-overlay">Students Present Climate Solutions</div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<?php
if ($lang === 'fr') {
    include FOOTER_PATH . "footer_fr.php";
} else {
    include FOOTER_PATH . "footer.php";
}
?>
</body>
</html>