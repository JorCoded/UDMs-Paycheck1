document.addEventListener("DOMContentLoaded", () => {

    /* ============================================================
       TAB SWITCHING (Academic / Non-Academic)
    ============================================================ */
    const tabs = document.querySelectorAll(".tab-button");
    const contents = document.querySelectorAll(".tab-content");

    tabs.forEach(tab => {
        tab.addEventListener("click", () => {
            tabs.forEach(t => t.classList.remove("active"));
            contents.forEach(c => c.classList.remove("active"));

            tab.classList.add("active");

            const target = tab.dataset.tab;
            const targetPanel = document.getElementById(target);

            if (targetPanel) targetPanel.classList.add("active");
        });
    });

    /* ============================================================
       COLLAPSIBLE STAFF DEPARTMENTS
    ============================================================ */
    const collapsibleButtons = document.querySelectorAll(".collapsible");

    collapsibleButtons.forEach(button => {
        button.addEventListener("click", function () {
            this.classList.toggle("active");

            const panel = this.nextElementSibling;

            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                document.querySelectorAll(".staff-panel").forEach(p => {
                    if (p !== panel) {
                        p.style.maxHeight = null;
                        p.previousElementSibling?.classList.remove("active");
                    }
                });

                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    });

    /* ============================================================
       MISSION / VALUES / VISION POPUP
       (No more mission.js / values.js / vision.js files)
    ============================================================ */

    // Create popup overlay + box
    const popupOverlay = document.createElement("div");
    popupOverlay.classList.add("popup-overlay");

    const popupBox = document.createElement("div");
    popupBox.classList.add("popup-box");

    const popupClose = document.createElement("button");
    popupClose.classList.add("popup-close");
    popupClose.textContent = "×";

    popupBox.appendChild(popupClose);
    popupOverlay.appendChild(popupBox);
    document.body.appendChild(popupOverlay);

    // Popup text content container
    const popupContent = document.createElement("div");
    popupContent.classList.add("popup-content");
    popupBox.appendChild(popupContent);

    // Text content for each popup
    const popupData = {
        mission: {
            title: "Our Mission",
            text: `
			The mission of Université des Mascareignes (UdM) is to offer education and research that 
			empower students to succeed in their personal and professional lives while contributing 
			positively to society. The university strives to provide programs and experiences that 
			encourage innovation, critical thinking, and problem-solving. Through its unique 
			combination of local expertise and international partnerships, UdM ensures students 
			receive high-quality learning experiences that are recognized globally.
            `
        },
		values: {
			title: "Our Values",
			text: `
				<ol class="values-list">
					<li><b>Ethics and Integrity</b> – UdM upholds honesty, fairness and transparency in all its activities ensuring trust and accountability among students, staff and stakeholders.</li>
					<br>
					<li><b>Service and Support</b> – The university prioritizes the well-being of its community offering resources and assistance to help individuals thrive academically and personally.</li>
					<br>
					<li><b>Reliability and Excellence</b> – UdM consistently delivers high-quality education and services maintaining a dependable reputation locally and internationally.</li>
					<br>
					<li><b>Adaptability and Responsiveness</b> – The university listens to the needs of its community and adjusts programs and approaches to remain relevant in a rapidly evolving world.</li>
					<br>
					<li><b>Inclusivity and Diversity</b> – UdM celebrates and welcomes people from all backgrounds fostering an environment of mutual respect and understanding.</li>
					<br>
					<li><b>Sustainability and Environmental Awareness</b> – The institution actively promotes practices that protect the planet and support sustainable development.</li>
					<br>
					<li><b>Innovation and Creativity</b> – UdM encourages bold thinking and exploration of new ideas empowering its community to push boundaries.</li>
					<br>
					<li><b>Continuous Learning and Growth</b> – The university embraces improvement constantly refining its programs research and impact.</li>
				</ol>
			`
		},
        vision: {
            title: "Our Vision",
            text: `
			Université des Mascareignes envisions itself as a leading institution of higher education
			that sets new standards for excellence, inclusivity, and innovation. The university aims 
			to be recognized both locally and globally for its outstanding contributions to education, 
			research, and societal development
            `
        }
    };

    // Open popup when clicking a grid item
    document.querySelectorAll(".grid-item").forEach(item => {
        item.addEventListener("click", () => {
            const id = item.id.replace("-item", ""); // mission-item → mission
            const data = popupData[id];

            if (!data) return;

            popupContent.innerHTML = `
                <h2>${data.title}</h2>
                <p>${data.text}</p>
            `;

            // Change border color to match the tile's background
            const bgColor = window.getComputedStyle(item).backgroundColor;
            popupBox.style.borderColor = bgColor;

            popupOverlay.classList.add("active");
        });
    });

    // Close popup (X button)
    popupClose.addEventListener("click", () => {
        popupOverlay.classList.remove("active");
    });

    // Close popup when clicking outside the box
    popupOverlay.addEventListener("click", e => {
        if (e.target === popupOverlay) {
            popupOverlay.classList.remove("active");
        }
    });

});
