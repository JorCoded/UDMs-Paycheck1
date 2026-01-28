document.addEventListener("DOMContentLoaded", () => {

  /* ========================================
     1. CHRISTMAS COUNTDOWN TIMER
     ======================================== */
  const eventDate = new Date("December 24, 2025 00:00:00").getTime();  // Set to Dec 24, 2025

  function updateCountdown() {
    const now = new Date().getTime();
    const timeLeft = eventDate - now;

    const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

    document.getElementById("days").textContent = String(days).padStart(2, "0");
    document.getElementById("hours").textContent = String(hours).padStart(2, "0");
    document.getElementById("minutes").textContent = String(minutes).padStart(2, "0");
    document.getElementById("seconds").textContent = String(seconds).padStart(2, "0");

    if (timeLeft < 0) {
      clearInterval(countdownInterval);
      document.getElementById("countdown").innerHTML = `
        <div style="grid-column: 1 / -1; color: white; font-size: 42px; font-weight: 800; text-align: center;">
          Merry Christmas!
        </div>`;
    }
  }

  const countdownInterval = setInterval(updateCountdown, 1000);
  updateCountdown();


  /* ========================================
     2. NEWS POPUP HANDLING
     ======================================== */
  const newsCards = document.querySelectorAll(".news-card");

  newsCards.forEach(card => {
    card.addEventListener("click", () => {
      const popupUrl = card.getAttribute("data-popup");
      if (!popupUrl) return;

      // Create the popup modal
      const modal = document.createElement("div");
      modal.className = "news-modal";

      modal.innerHTML = `
        <div class="modal-content">
          <span class="close">×</span>
          <div class="modal-body">
            <div style="text-align:center; padding:60px; color:#888;">
              <p>Loading article...</p>
            </div>
          </div>
        </div>
      `;

      document.body.appendChild(modal);

      // Load the HTML file content
      fetch(popupUrl)
        .then(res => {
          if (!res.ok) throw new Error();
          return res.text();
        })
        .then(html => {
          modal.querySelector(".modal-body").innerHTML = html;
        })
        .catch(() => {
          modal.querySelector(".modal-body").innerHTML = `
            <p style="color:#e74c3c; text-align:center; padding:60px;">
              Unable to load the article. Please try again later.
            </p>`;
        });

      // Show modal
      requestAnimationFrame(() => modal.classList.add("show"));

      // Close handlers
      const closeModal = () => modal.classList.remove("show");

      modal.querySelector(".close").onclick = closeModal;
      modal.onclick = (e) => {
        if (e.target === modal) closeModal();
      };

      // Remove modal when animation finishes
      modal.addEventListener("transitionend", () => {
        if (!modal.classList.contains("show")) modal.remove();
      });
    });
  });

});
