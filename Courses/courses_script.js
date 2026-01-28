document.addEventListener("DOMContentLoaded", () => {

    /* --------------------------------------------------------
       ELEMENT REFERENCES (SAFE)
    --------------------------------------------------------- */
    const campusFilter = document.getElementById("campusFilter");
    const degreeFilter = document.getElementById("degreeFilter");
    const resetButton  = document.getElementById("reset-button");
    const cards        = document.querySelectorAll(".course-card");

    /* --------------------------------------------------------
       GUARD CLAUSE
       Prevent JS errors if page structure changes
    --------------------------------------------------------- */
    if (!campusFilter || !degreeFilter || !cards.length) {
        return;
    }

    /* --------------------------------------------------------
       FILTER FUNCTION
    --------------------------------------------------------- */
    function filterCourses() {
        const selectedCampus = campusFilter.value.toLowerCase();
        const selectedDegree = degreeFilter.value.toLowerCase();

        cards.forEach(card => {
            const cardCampus = card.dataset.campus?.toLowerCase() || "";
            const cardDegree = card.dataset.degree?.toLowerCase() || "";

            const matchesCampus =
                selectedCampus === "all" || cardCampus.includes(selectedCampus);

            const matchesDegree =
                selectedDegree === "all" || cardDegree.includes(selectedDegree);

            card.style.display = (matchesCampus && matchesDegree)
                ? "block"
                : "none";
        });
    }

    /* --------------------------------------------------------
       EVENT LISTENERS
    --------------------------------------------------------- */
    campusFilter.addEventListener("change", filterCourses);
    degreeFilter.addEventListener("change", filterCourses);

    if (resetButton) {
        resetButton.addEventListener("click", () => {
            campusFilter.value = "all";
            degreeFilter.value = "all";
            filterCourses();
        });
    }

    /* --------------------------------------------------------
       INITIAL FILTER APPLY
    --------------------------------------------------------- */
    filterCourses();

});
