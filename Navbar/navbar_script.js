document.addEventListener("DOMContentLoaded", function () {

    /* ========================================
       1. LANGUAGE SWITCHER
       ======================================== */
    const langSwitch = document.getElementById("langSwitch");
    const thumb = langSwitch?.querySelector(".lang-thumb");

    function setLanguage(lang) {
        lang = (lang === "FR") ? "FR" : "EN";
        langSwitch.dataset.lang = lang;
        if (thumb) {
            thumb.style.transform = lang === "EN" ? "translateX(0)" : "translateX(100%)";
        }
        document.cookie = `lang=${lang};path=/;max-age=${60*60*24*365};SameSite=Lax`;
    }

    if (langSwitch) {
        setLanguage(langSwitch.dataset.lang || "EN");
        langSwitch.addEventListener("click", () => {
            setLanguage(langSwitch.dataset.lang === "EN" ? "FR" : "EN");
        });
    }

    /* ========================================
       2. PROFILE DROPDOWN (When Logged In)
       ======================================== */
    const userMenuBtn = document.getElementById("userMenuBtn");
    const userDropdown = document.getElementById("userDropdown");

    if (userMenuBtn && userDropdown) {
        userMenuBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle("show");
        });

        document.addEventListener("click", () => userDropdown.classList.remove("show"));
        userDropdown.addEventListener("click", (e) => e.stopPropagation());
    }

    /* ========================================
       3. LOGIN / SIGNUP MODAL
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

    /* ========================================
       4. REAL AUTHENTICATION - DYNAMIC ROOT_URL (WORKS FROM ANY FOLDER)
       ======================================== */
    const rootUrl = "<?= ROOT_URL ?>";  // Dynamically fetch ROOT_URL from PHP

    document.querySelectorAll(".form-container").forEach(form => {
        form.addEventListener("submit", async function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            formData.append("action", this.id === "signupForm" ? "signup" : "login");

            try {
                // Dynamically use the ROOT_URL in the request path
                const response = await fetch(rootUrl + "ajax_auth.php", {
                    method: "POST",
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}`);
                }

                const result = await response.json();

                alert(result.message);

                if (result.success) {
                    closeModal();
                    setTimeout(() => location.reload(), 800);
                }
            } catch (error) {
                console.error("Auth connection failed:", error);
                alert("Server connection failed. Please try again.");
            }
        });
    });

});
