<?php
require_once __DIR__ . "/../config.php";

$activePage = 'courses';
$lang = $_COOKIE['language'] ?? 'en';

// Faculty filter from URL
$facultyFilter = $_GET['faculty'] ?? 'all';
?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses - Université des Mascareignes</title>

    <!-- COURSE STYLES -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>Courses/courses_styles.css">

    <!-- NAVBAR -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>Navbar/navbar_styles.css">

    <!-- FOOTER -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>Navbar/footer.css">

    <!-- NAVBAR SCRIPT -->
    <script defer src="<?= ROOT_URL ?>Navbar/navbar_script.js"></script>

    <!-- COURSE JS -->
    <script defer src="<?= ROOT_URL ?>Courses/courses_script.js"></script>
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

<!-- HERO -->
<section class="course-hero">
    <div class="course-hero-bg"
         style="background-image:url('<?= ASSET_URL ?>images/pick.jpg');"></div>

    <div class="course-hero-overlay"></div>

    <div class="course-hero-content">
        <h1>Explore Our ICT Programs</h1>
        <p>
            Discover our innovative bachelor's master's and diploma programmes
            shaped through international collaboration and industry exposure.
        </p>
    </div>
</section>

<!-- WAVE DIVIDER -->
<div class="course-hero-divider">
    <svg viewBox="0 0 1440 360" preserveAspectRatio="none">
        <path fill="#ffffff"
              d="M0,120 C240,80 480,60 720,65
                 C960,70 1200,100 1440,135
                 L1440,300
                 C1200,250 960,220 720,225
                 C480,230 240,260 0,300 Z">
        </path>
    </svg>
</div>

<!-- COURSE SECTION -->
<div class="course-section-bg">

    <!-- FILTERS -->
    <section class="course-filters-section">
        <div class="filters-container">

            <select id="campusFilter" class="filter-select">
                <option value="all">All Campuses</option>
                <option value="Rose-Hill">Rose-Hill</option>
                <option value="Swami Dayanand">Swami Dayanand</option>
                <option value="Bel-Air Research Lab">Bel-Air Research Lab</option>
            </select>

            <select id="degreeFilter" class="filter-select">
                <option value="all">All Types</option>
                <option value="BSc">BSc</option>
                <option value="Diploma">Diploma</option>
                <option value="Top-up">Top-up</option>
                <option value="Masters">Masters</option>
            </select>

            <button id="reset-button" class="reset-btn">Reset</button>

        </div>
    </section>

    <!-- COURSE GRID -->
    <section class="course-grid-section">
        <div class="course-grid">

<?php
/* ============================================================
   COURSE DATA
============================================================ */
$courses = [
    'fsde' => [
        [
            "title"  => "BSc (Hons) Applied Computer Science",
            "campus" => "Rose-Hill",
            "degree" => "BSc",
            "link"   => "applied_cs.php"
        ],
        [
            "title"  => "BSc (Hons) Software Engineering",
            "campus" => "Swami Dayanand",
            "degree" => "BSc",
            "link"   => "../coming_soon/coming_soon.php"
        ],
        [
            "title"  => "Master Artificial Intelligence and Robotics",
            "campus" => "Rose-Hill, Bel-Air Research Lab",
            "degree" => "Masters",
            "link"   => "../coming_soon/coming_soon.php"
        ]
    ],

    'fbm' => [
        [
            "title"  => "Diploma in Software Engineering",
            "campus" => "Swami Dayanand",
            "degree" => "Diploma",
            "link"   => "../coming_soon/coming_soon.php"
        ],
        [
            "title"  => "BSc (Hons) Information Technology",
            "campus" => "Swami Dayanand",
            "degree" => "BSc",
            "link"   => "../coming_soon/coming_soon.php"
        ]
    ],

    'fict' => [
        [
            "title"  => "Diploma in Cybersecurity",
            "campus" => "Rose-Hill",
            "degree" => "Diploma",
            "link"   => "../coming_soon/coming_soon.php"
        ],
        [
            "title"  => "Master in Data Science",
            "campus" => "Swami Dayanand",
            "degree" => "Masters",
            "link"   => "../coming_soon/coming_soon.php"
        ]
    ]
];

/* ============================================================
   FILTER BY FACULTY
============================================================ */
if ($facultyFilter !== 'all' && isset($courses[$facultyFilter])) {
    $displayCourses = $courses[$facultyFilter];
} else {
    $displayCourses = array_merge(...array_values($courses));
}

/* ============================================================
   RENDER COURSES
============================================================ */
foreach ($displayCourses as $course) {

    $title  = $course['title'];
    $campus = $course['campus'];
    $degree = $course['degree'];
    $link   = $course['link'];

    $absoluteLink = ROOT_URL . "Courses/" . $link;

    echo "
    <div class='course-card'
         data-campus=\"$campus\"
         data-degree=\"$degree\">

        <div class='course-card-inner'>
            <h3>$title</h3>
            <p class='campus-label'>$campus Campus</p>

            <div class='course-card-actions'>
                <a href=\"$absoluteLink\" class='view-btn'>View More</a>
            </div>
        </div>
    </div>";
}
?>

        </div>
    </section>

</div>

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
