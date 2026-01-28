<?php
require_once __DIR__ . "/../config.php";

$activePage = 'about';
$lang = $_COOKIE['language'] ?? 'en';

$assetPath = ASSET_URL . "images/";

/* Load academic and non-academic staff arrays */
$academic_staff = require __DIR__ . "/Acad_staff_data.php";
$non_academic_staff = require __DIR__ . "/NonAcad_staff_data.php";
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us – Université des Mascareignes</title>

    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>Navbar/navbar_styles.css">
    <link rel="stylesheet" href="<?= ROOT_URL ?>Navbar/footer.css">

    <!-- ABOUT STYLES -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>About/about_styles.css">
    <link rel="stylesheet" href="<?= ROOT_URL ?>About/about_section.css">

    <!-- ONLY THE NEW POPUP SCRIPT -->
    <script defer src="<?= ROOT_URL ?>About/about_script.js"></script>
</head>

<body>

<?php
if ($lang === 'fr') {
    include NAVBAR_PATH . "navbar_fr.php";
} else {
    include NAVBAR_PATH . "navbar.php";
}
?>

<!-- ========================= ABOUT UDM ========================= -->
<section class="about">
    <div class="container">
        <h2>About Université des Mascareignes</h2>

        <p>
            Université des Mascareignes (UdM) is a public university offering modern programs 
            in Information and Communication Technology, Management, Sustainability, and Engineering.
            UdM prepares students to thrive in a global digital and technological landscape through 
            innovation-driven learning, industry collaboration, and hands-on experience.
            <br><br>
            With strong academic pathways and state-of-the-art facilities, UdM equips learners with 
            the skills needed to contribute meaningfully to society and excel in professional careers 
            locally and internationally.
        </p>

        <!-- Mission | Values | Vision -->
        <div class="grid-container">

            <div class="grid-item" id="mission-item" style="background-color: var(--primary);">
                <h3>Mission</h3>
            </div>

            <div class="grid-item" id="values-item" style="background-color: var(--blue-light);">
                <h3>Values</h3>
            </div>

            <div class="grid-item" id="vision-item" style="background-color: #1AAE9F;">
                <h3>Vision</h3>
            </div>

        </div>
    </div>
</section>

<!-- ========================= HISTORY ========================= -->
<section>
    <h2>History of UdM</h2>
    <p>
        Established in 2012, Université des Mascareignes emerged from a collaboration between 
        Mauritius and Université de Limoges (France). UdM was created to strengthen higher education 
        in Mauritius by providing internationally recognized programs and creating pathways for 
        innovation, research, and technological development.
        <br><br>
        The university evolved from two former institutions—IST (Institut Supérieur de Technologie) 
        and SIT (Swami Dayanand Institute of Technology)—which now form its foundational campuses. 
        Today, UdM continues to grow with new programs, research initiatives, and global partnerships.
    </p>
</section>

<!-- ========================= PARTNERS ========================= -->
<section class="partners-section">
    <div class="container">

        <h2>Our Partner Universities</h2>
        <p>
            UdM maintains strong academic and research collaborations with reputable international institutions
            to enhance student mobility, dual-degree opportunities, and joint research.
        </p>

        <div class="partner-card">
            <img src="<?= $assetPath ?>unilim.png" alt="Université de Limoges" class="partner-logo">

            <h3>Université de Limoges (France)</h3>

            <p class="partner-desc">
                Université de Limoges is UdM’s primary academic partner. Through this collaboration:
            </p>

            <ul>
                <li>Students can obtain <strong>dual degrees</strong> recognized internationally.</li>
                <li>Joint programs promote academic mobility and cultural exchange.</li>
                <li>Collaborative research strengthens innovation in ICT, sustainability, and more.</li>
            </ul>
        </div>

    </div>
</section>

<!-- ========================= STAFF SECTION ========================= -->
<section class="staff-section">

    <h2>Our Staff</h2>
    <p>
        Meet the dedicated academic and non-academic staff who support the university’s mission 
        and contribute to student success.
    </p>

    <div class="tab-buttons">
        <button class="tab-button active" data-tab="academic">Academic Staff</button>
        <button class="tab-button" data-tab="nonacademic">Non-Academic Staff</button>
    </div>

    <!-- ========================= ACADEMIC STAFF ========================= -->
    <div id="academic" class="tab-content active">

        <?php foreach ($academic_staff as $faculty => $departments): ?>
            <h3><?= htmlspecialchars($faculty) ?></h3>

            <?php foreach ($departments as $department => $members): ?>
                <button class="collapsible"><?= htmlspecialchars($department) ?></button>

                <div class="staff-panel">
                    <div class="staff-grid">

                        <?php foreach ($members as $staff): ?>
                            <?php if (isset($staff['name'])): ?>
                                <div class="staff-card">
                                    <img src="<?= htmlspecialchars($staff['image']) ?>" alt="Profile">
                                    <h4><?= htmlspecialchars($staff['name']) ?></h4>
                                    <p><?= htmlspecialchars($staff['title']) ?></p>

                                    <?php if (!empty($staff['email'])): ?>
                                        <a href="mailto:<?= htmlspecialchars($staff['email']) ?>">
                                            <?= htmlspecialchars($staff['email']) ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>

    </div>

    <!-- ========================= NON-ACADEMIC STAFF ========================= -->
    <div id="nonacademic" class="tab-content">

        <?php foreach ($non_academic_staff as $department => $members): ?>
            <button class="collapsible"><?= htmlspecialchars($department) ?></button>

            <div class="staff-panel">
                <div class="staff-grid">

                    <?php foreach ($members as $staff): ?>
                        <div class="staff-card">
                            <img src="<?= htmlspecialchars($staff['image']) ?>" alt="Profile">
                            <h4><?= htmlspecialchars($staff['name']) ?></h4>
                            <p><?= htmlspecialchars($staff['title']) ?></p>

                            <?php if (!empty($staff['email'])): ?>
                                <a href="mailto:<?= htmlspecialchars($staff['email']) ?>">
                                    <?= htmlspecialchars($staff['email']) ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        <?php endforeach; ?>

    </div>

</section>


<?php
if ($lang === 'fr') {
    include FOOTER_PATH . "footer_fr.php";
} else {
    include FOOTER_PATH . "footer.php";
}
?>

</body>
</html>
