<?php
$assetPath = ASSET_URL . "images/";
?>

<!-- FOOTER ARC -->
<div class="footer-top-arc">
    <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path d="M0,224L120,208C240,192,480,160,720,165.3C960,171,1200,213,1320,234.7L1440,256L1440,0L0,0Z"></path>
    </svg>
</div>

<footer class="udm-footer">

    <!-- SOCIALS (Centered) -->
	<div class="footer-socials">
		<img class="social-icon" src="<?= $assetPath ?>facebook.png" alt="Facebook">
		<img class="social-icon youtube" src="<?= $assetPath ?>youtube.png" alt="YouTube">
		<img class="social-icon" src="<?= $assetPath ?>instagram.png" alt="Instagram">
		<img class="social-icon linkedin" src="<?= $assetPath ?>linkedin.png" alt="LinkedIn">
	</div>

    <!-- HORIZONTAL ROW: PARTNERS • LEGAL • CONTACTS -->
    <div class="footer-main-row">

        <!-- PARTNERS -->
        <div class="footer-col footer-partners">
            <h3>Partner</h3>
            <img src="<?= $assetPath ?>unilim.png" alt="Université de Limoges" class="partner-logo">
        </div>

        <!-- LEGAL -->
        <div class="footer-col">
            <h3>Legal</h3>
            <a href="<?= ROOT_URL ?>policies/legal.php">Legal Center</a>
            <a href="<?= ROOT_URL ?>policies/privacy_policy.php">Privacy Policy</a>
            <a href="<?= ROOT_URL ?>policies/cookies_policy.php">Cookies Policy</a>
            <a href="<?= ROOT_URL ?>policies/terms_and_service.php">Terms of Service</a>
            <a href="<?= ROOT_URL ?>policies/terms_and_conditions.php">Terms and Conditions</a>
            <a href="<?= ROOT_URL ?>policies/payment_policy.php">Payment Policy</a>
            <a href="<?= ROOT_URL ?>policies/refund_policy.php">Refund Policy</a>
            <a href="<?= ROOT_URL ?>policies/data_protection.php">Data Protection</a>
            <a href="<?= ROOT_URL ?>policies/acceptable_use.php">Acceptable Use</a>
            <a href="<?= ROOT_URL ?>policies/legal_notice.php">Legal Notice</a>
        </div>

        <!-- CONTACTS -->
        <div class="footer-col">
            <h3>Contacts</h3>

            <p><strong>Rose Hill Campus:</strong><br>
            Avenue de la Concorde, Roches Brunes<br>
            Tel: +230 460-9500</p>

            <p><strong>Swami Dayanand Campus:</strong><br>
            Beau Plan Round About, Pamplemousses<br>
            Tel: +230 260-4500</p>

            <p><strong>Bel Air Campus:</strong><br>
            Bel Air Campus (Ex-Mauritius Research Council)<br>
            Corner Trou d’Eau Douce Road, Royal Road<br>
            Tel: +230 460-5181</p>
        </div>
    </div>
	
    <!-- COPYRIGHT -->
    <div class="footer-bottom">
        © 2025 Université des Mascareignes. All rights reserved.
    </div>

</footer>
