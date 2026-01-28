/* ============================================================
   UDM APPLICATION FORM – APPLY.JS
   Client-side validation and UX helpers
============================================================ */

document.addEventListener("DOMContentLoaded", () => {

    const form = document.querySelector("form");
    const submitBtn = document.querySelector(".btn-primary");
    const printBtn = document.querySelector(".btn-print");
    const resetBtn = document.querySelector(".btn-reset");
    const downloadBtn = document.querySelector(".btn-download");
    const exitBtn = document.getElementById("exitBtn");

    const resetModal = document.getElementById("resetModal");
    const confirmResetBtn = document.getElementById("confirmReset");
    const cancelResetBtn = document.getElementById("cancelReset");

    /* ============================================================
       SUBMIT HANDLER
    ============================================================ */
    if (submitBtn && form) {
        submitBtn.addEventListener("click", (e) => {
            e.preventDefault();

            if (!validateForm()) return;

            const formData = new FormData(form);

            alert(
                "Application validated successfully.\n" +
                "This form is ready to be connected to a PHP backend."
            );

            console.log("Form data ready for submission:");
            for (const [key, value] of formData.entries()) {
                console.log(key, value);
            }
        });
    }

    /* ============================================================
       RESET HANDLER
    ============================================================ */
    if (resetBtn && resetModal) {
        resetBtn.addEventListener("click", (e) => {
            e.preventDefault();
            resetModal.classList.add("active");
        });
    }

    if (cancelResetBtn && resetModal) {
        cancelResetBtn.addEventListener("click", () => {
            resetModal.classList.remove("active");
        });
    }

    if (confirmResetBtn && form && resetModal) {
        confirmResetBtn.addEventListener("click", () => {
            form.reset();
            resetModal.classList.remove("active");
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    }

    if (resetModal) {
        resetModal.addEventListener("click", (e) => {
            if (e.target === resetModal) {
                resetModal.classList.remove("active");
            }
        });
    }

    /* ============================================================
       PRINT SUPPORT
    ============================================================ */
    if (printBtn) {
        printBtn.addEventListener("click", (e) => {
            e.preventDefault();
            window.print();
        });
    }

    /* ============================================================
       DOWNLOAD OFFICIAL PDF
    ============================================================ */
    if (downloadBtn) {
        downloadBtn.addEventListener("click", (e) => {
            e.preventDefault();
            window.open(
                "https://udm.ac.mu/wp-content/uploads/2025/01/Local-Application-Form-2025.pdf",
                "_blank",
                "noopener"
            );
        });
    }

    /* ============================================================
       EXIT MODAL (NO BROWSER ALERTS)
    ============================================================ */
    const exitModal      = document.getElementById("exitModal");
    const confirmExitBtn = document.getElementById("confirmExit");
    const cancelExitBtn  = document.getElementById("cancelExit");

    if (exitBtn && exitModal) {
        exitBtn.addEventListener("click", (e) => {
            e.preventDefault();
            exitModal.classList.add("active");
        });
    }

    if (cancelExitBtn && exitModal) {
        cancelExitBtn.addEventListener("click", () => {
            exitModal.classList.remove("active");
        });
    }

    if (confirmExitBtn) {
        confirmExitBtn.addEventListener("click", () => {
            window.location.href = "../index.php";
        });
    }

    if (exitModal) {
        exitModal.addEventListener("click", (e) => {
            if (e.target === exitModal) {
                exitModal.classList.remove("active");
            }
        });
    }

    /* ============================================================
       VALIDATION LOGIC
    ============================================================ */
    function validateForm() {

        const requiredFields = [
            "surname",
            "othernames",
            "dob",
            "nid",
            "nationality",
            "email"
        ];

        for (const name of requiredFields) {
            const field = document.querySelector(`[name="${name}"]`);
            if (field && field.value.trim() === "") {
                alert(`Please fill in the required field: ${labelFor(name)}`);
                field.focus();
                return false;
            }
        }

        const emailField = document.querySelector('[name="email"]');
        if (emailField && !isValidEmail(emailField.value.trim())) {
            alert("Please enter a valid email address.");
            emailField.focus();
            return false;
        }

        if (!isRadioChecked("gender")) {
            alert("Please select your gender.");
            return false;
        }

        if (!isRadioChecked("marital")) {
            alert("Please select your marital status.");
            return false;
        }

        return true;
    }

    /* ============================================================
       HELPERS
    ============================================================ */
    function isRadioChecked(name) {
        return document.querySelectorAll(`input[name="${name}"]:checked`).length > 0;
    }

    function isValidEmail(email) {
        return /^\S+@\S+\.\S+$/.test(email);
    }

    function labelFor(fieldName) {
        const labels = {
            surname: "Surname",
            othernames: "Other Names",
            dob: "Date of Birth",
            nid: "National ID or Passport Number",
            nationality: "Nationality",
            email: "Email Address"
        };
        return labels[fieldName] || fieldName;
    }

});
