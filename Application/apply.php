<?php
require_once __DIR__ . "/../config.php";

$activePage = 'apply';
$lang = $_COOKIE['language'] ?? 'en';

/* ============================================================
   GENERATE UNIQUE APPLICATION NUMBER (PDO)
============================================================ */

// Format: UDM-2025-XXXXXX
function generateApplicationNo(PDO $pdo): string
{
    do {
        $random = random_int(100000, 999999);
        $appNo  = "UDM-2025-" . $random;

        $stmt = $pdo->prepare(
            "SELECT id FROM applications WHERE application_no = :app_no LIMIT 1"
        );
        $stmt->execute([
            ':app_no' => $appNo
        ]);

    } while ($stmt->fetch());

    return $appNo;
}

// Generate values
$applicationNo = generateApplicationNo($pdo);
$currentDate   = date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UDM Application Form — Intake 2025</title>

    <!-- APPLICATION CSS -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>Application/apply.css">

    <!-- NAVBAR -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>Navbar/navbar_styles.css">
    <script defer src="<?= ROOT_URL ?>Navbar/navbar_script.js"></script>
</head>
	<body>
	
		<main class="apply-page">

			<div class="container">

				<!-- HEADER -->
				<div class="header">
					<img src="<?= ASSET_URL ?>images/udm_badge.png" alt="UDM logo" class="nav-logo-img">
					<div class="title">
						<h1>Université des Mascareignes — Application For Admission</h1>
						<p>Intake 2025 • Rose Hill & Pamplemousses Campuses</p>
					</div>
				</div>

				<form class="form-card" method="post" action="#" novalidate>

					<!-- TOP INFO -->
					<div class="top-row">
						<div>
							<label>Application No.</label>
							<input
								type="text"
								name="app_no"
								value="<?= htmlspecialchars($applicationNo) ?>"
								readonly
							>
						</div>

						<div>
							<label>Date Received</label>
							<input
								type="date"
								name="date_received"
								value="<?= htmlspecialchars($currentDate) ?>"
								readonly
							>
						</div>
					</div>

					<!-- =====================================================
						 1. PERSONAL DETAILS
					====================================================== -->
					<section class="section">
						<div class="section-header"><h3>1. Personal Details</h3></div>
						<div class="section-body">
							<div class="grid">
								<div class="col-4"><label>Surname</label><input type="text" name="surname"></div>
								<div class="col-4"><label>Other Names</label><input type="text" name="othernames"></div>
								<div class="col-4"><label>Date of Birth</label><input type="date" name="dob"></div>

								<div class="col-4"><label>Maiden Name</label><input type="text" name="maiden"></div>
								<div class="col-4"><label>National ID / Passport</label><input type="text" name="nid"></div>
								<div class="col-4"><label>Place of Birth</label><input type="text" name="place_birth"></div>

								<div class="col-3"><label>Phone (Home)</label><input type="text" name="phone_home"></div>
								<div class="col-3"><label>Mobile</label><input type="text" name="phone_mobile"></div>
								<div class="col-3"><label>Office</label><input type="text" name="phone_office"></div>
								<div class="col-3"><label>Nationality</label><input type="text" name="nationality" value="Mauritian"></div>

								<div class="col-8"><label>Address Line 1</label><input type="text" name="addr1"></div>
								<div class="col-4"><label>Town / Village</label><input type="text" name="town"></div>

								<div class="col-8"><label>Address Line 2</label><input type="text" name="addr2"></div>
								<div class="col-4"><label>Email</label><input type="email" name="email"></div>

								<div class="col-6">
									<label>Gender</label>
									<div class="radio-row">
										<label><input type="radio" name="gender" value="male"> Male</label>
										<label><input type="radio" name="gender" value="female"> Female</label>
									</div>
								</div>

								<div class="col-6">
									<label>Marital Status</label>
									<div class="radio-row">
										<label><input type="radio" name="marital" value="single"> Single</label>
										<label><input type="radio" name="marital" value="married"> Married</label>
									</div>
								</div>
							</div>
						</div>
					</section>

					<!-- =====================================================
						 2. COURSES APPLIED
					====================================================== -->
					<section class="section">
						<div class="section-header"><h3>2. Details of Courses Applied</h3></div>
						<div class="section-body">
							<div class="grid">
								<div class="col-4">
									<label>Course Level</label>
									<select name="course_level">
										<option value="">Select</option>
										<option>Certificate</option>
										<option>Diploma</option>
										<option>Undergraduate</option>
										<option>Postgraduate</option>
									</select>
								</div>

								<div class="col-4">
									<label>Mode of Study</label>
									<select name="mode_study">
										<option value="">Select</option>
										<option>Full-time</option>
										<option>Part-time</option>
										<option>Distance</option>
									</select>
								</div>

								<div class="col-4">
									<label>Entry Level</label>
									<select name="entry_level">
										<option value="">Select</option>
										<option>HSC</option>
										<option>Certificate</option>
										<option>Diploma</option>
									</select>
								</div>

								<div class="col-12">
									<label>Courses (Preference Order)</label>
									<div class="inline">
										<input type="text" name="course1" placeholder="1st choice">
										<input type="text" name="course2" placeholder="2nd choice">
										<input type="text" name="course3" placeholder="3rd choice">
									</div>
								</div>
							</div>
						</div>
					</section>

					<!-- =====================================================
						 3. EDUCATIONAL DETAILS
					====================================================== -->
					<section class="section">
						<div class="section-header"><h3>3. Educational Details</h3></div>
						<div class="section-body">
							<p class="muted">Secondary schools / institutions attended</p>

							<table class="results-table">
								<thead>
									<tr><th>Institution</th><th>From</th><th>To</th></tr>
								</thead>
								<tbody>
									<tr><td><input type="text" name="inst1"></td><td><input type="text" name="inst1_from"></td><td><input type="text" name="inst1_to"></td></tr>
									<tr><td><input type="text" name="inst2"></td><td><input type="text" name="inst2_from"></td><td><input type="text" name="inst2_to"></td></tr>
									<tr><td><input type="text" name="inst3"></td><td><input type="text" name="inst3_from"></td><td><input type="text" name="inst3_to"></td></tr>
								</tbody>
							</table>
						</div>
					</section>

					<!-- =====================================================
						 4. OTHER QUALIFICATIONS
					====================================================== -->
					<section class="section">
						<div class="section-header"><h3>4. Other Academic & Professional Qualifications</h3></div>
						<div class="section-body">
							<table class="results-table">
								<thead>
									<tr><th>Course</th><th>Institution</th><th>Grade</th><th>From</th><th>To</th></tr>
								</thead>
								<tbody>
									<tr><td><input></td><td><input></td><td><input></td><td><input></td><td><input></td></tr>
									<tr><td><input></td><td><input></td><td><input></td><td><input></td><td><input></td></tr>
								</tbody>
							</table>
						</div>
					</section>

					<!-- =====================================================
						 5. EMPLOYMENT / TRAINING
					====================================================== -->
					<section class="section">
						<div class="section-header"><h3>5. Employment / Industrial Training</h3></div>
						<div class="section-body">
							<table class="results-table">
								<thead>
									<tr><th>From</th><th>To</th><th>Employer</th><th>Position</th></tr>
								</thead>
								<tbody>
									<tr><td><input></td><td><input></td><td><input></td><td><input></td></tr>
									<tr><td><input></td><td><input></td><td><input></td><td><input></td></tr>
								</tbody>
							</table>
						</div>
					</section>

					<!-- =====================================================
						 6. EMPLOYER DETAILS
					====================================================== -->
					<section class="section">
						<div class="section-header"><h3>6. Employer Details (If Applicable)</h3></div>
						<div class="section-body">
							<div class="grid">
								<div class="col-6"><label>Employer Name</label><input></div>
								<div class="col-6"><label>Address</label><input></div>
								<div class="col-3"><label>Phone</label><input></div>
								<div class="col-3"><label>Mobile</label><input></div>
								<div class="col-3"><label>Fax</label><input></div>
								<div class="col-3"><label>Email</label><input></div>
							</div>
						</div>
					</section>

					<!-- =====================================================
						 7. PREVIOUS DEGREE
					====================================================== -->
					<section class="section">
						<div class="section-header"><h3>7. Previous Qualification</h3></div>
						<div class="section-body">
							<div class="grid">
								<div class="col-12">
									<label>Do you hold a Certificate, Diploma or Degree?</label>
									<div class="radio-row">
										<label><input type="radio" name="has_award"> Yes</label>
										<label><input type="radio" name="has_award"> No</label>
									</div>
								</div>

								<div class="col-4"><label>Award Type</label><input></div>
								<div class="col-4"><label>Institution</label><input></div>
								<div class="col-4"><label>Year</label><input></div>
							</div>
						</div>
					</section>

					<!-- =====================================================
						 8. DECLARATION
					====================================================== -->
					<section class="section">
						<div class="section-header"><h3>8. Declaration</h3></div>
						<div class="section-body">
							<p class="muted">
								I declare that the information provided is true and I agree to abide by the rules and regulations of the University.
							</p>
							<div class="grid">
								<div class="col-8"><label>Applicant Full Name</label><input></div>
								<div class="col-4"><label>Date</label><input type="date"></div>
							</div>
						</div>
					</section>

					<!-- =====================================================
						 ACTIONS
					====================================================== -->
					<div class="actions">

						<!-- DOWNLOAD PDF -->
						<button	type="button" class="btn btn-download">Download PDF</button>	

						<!-- RESET FORM -->
						<button type="button" class="btn btn-reset">Reset Form</button>

						<!-- PRINT -->
						<button type="button" class="btn btn-print">Print</button>

						<!-- SUBMIT -->
						<button type="submit" class="btn btn-primary">Submit Application</button>
						
						<!-- EXIT -->
						 <div class="actions-right">
							<button type="button" class="btn btn-exit" id="exitBtn">Exit</button>
						 </div>					

					</div>
				</form>

			</div>
		</main>

	<script src="<?= ROOT_URL ?>Application/apply.js"></script>

		<!-- RESET CONFIRMATION MODAL -->
		<div class="modal-overlay" id="resetModal">
			<div class="modal-box">
				<h3>Reset Application</h3>
				<p>
					Are you sure you want to reset the entire application form?
					<br><br>
					<span class="muted">All entered data will be cleared.</span>
				</p>

				<div class="modal-actions">
					<button type="button" class="btn btn-ghost" id="cancelReset">Cancel</button>
					<button type="button" class="btn btn-danger" id="confirmReset">Yes, Reset</button>
				</div>
			</div>
		</div>
		
		<!-- EXIT CONFIRMATION MODAL -->
		<div class="modal-overlay" id="exitModal">
		  <div class="modal-box">
			<h3>Exit Application</h3>
			<p>
			  Are you sure you want to exit the application?<br>
			  <span class="muted">Any unsaved data will be lost.</span>
			</p>

			<div class="modal-actions">
			  <button class="btn btn-ghost" id="cancelExit">Cancel</button>
			  <button class="btn btn-danger" id="confirmExit">Exit</button>
			</div>
		  </div>
		</div>
	</body>
</html>
