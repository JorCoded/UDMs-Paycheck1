<?php
require_once __DIR__ . "/../config.php";

$lang = $_COOKIE['language'] ?? 'en';
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSc (Hons) Applied Computer Science</title>
	
    <!-- NAVBAR -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>Navbar/navbar_styles.css">

    <!-- FOOTER -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>Navbar/footer.css">

    <!-- NAVBAR SCRIPT -->
    <script defer src="<?= ROOT_URL ?>Navbar/navbar_script.js"></script>
	
    <!-- COURSE STYLES -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>Courses/applied_cs.css">

    <!-- COURSE SCRIPT -->
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


<!-- =============================
     COURSE POPUP HEADER
============================= -->
<header class="course-popup-header">
    <div class="course-popup-header-content">
        <h1>Faculty of Information Communication Technology</h1>
        <h2>BSc (Hons) Applied Computer Science</h2>
        <p>Available at Rose Hill Campus</p>
    </div>
</header>

<!-- =============================
     BACK TO COURSES
============================= -->
<div class="course-back-wrapper">
    <a href="<?= ROOT_URL ?>Courses/courses.php" class="course-back-btn">
        ← Back to Courses
    </a>
</div>

<!-- =============================
     COURSE CONTENT
============================= -->
<main class="course-popup-container">

    <section class="course-section">
        <h3>Course Overview</h3>
        <p>
            The BSc (Hons) Applied Computer Science programme equips students with
            strong theoretical foundations and practical skills in computing,
            software development, databases, networking and emerging technologies.
            The programme spans multiple semesters and requires the completion
            of 240 credits.
        </p>
    </section>

	<section class="course-section">
		<h3>Career Prospects</h3>
		<ul>
			<li>Software Developer</li>
			<li>Systems Analyst</li>
			<li>Web Developer</li>
			<li>Database Administrator</li>
			<li>Network Engineer</li>
			<li>Cybersecurity Analyst</li>
			<li>IT Consultant</li>
		</ul>
	</section>


    <section class="course-section">
        <h3>Teaching Methods</h3>
        <p>
            Teaching is delivered through lectures, tutorials, lab sessions,
            project-based learning and group work. Instruction is mainly in English
            with selected modules taught in French.
        </p>
    </section>

    <section class="course-section">
        <h3>Entry Requirements</h3>
        <ul>
            <li>3 A-levels + 1 subsidiary level at HSC</li>
            <li>OR 2 A-levels + 2 subsidiary levels at HSC</li>
            <li>OR 3 A-levels at London GCE</li>
            <li>OR equivalent qualification</li>
        </ul>
        <p>Preference given to candidates with Mathematics at A-level.</p>
    </section>

    <section class="course-section">
        <h3>Course Structure</h3>
        <p>
            The programme consists of core and elective modules across semesters.
            Full module details are available in the course handbook.
        </p>
    </section>

    <section class="course-section apply-section">
        <a href="<?= ROOT_URL ?>Application/apply.php" class="apply-btn">
            APPLY
        </a>
    </section>

</main>
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
