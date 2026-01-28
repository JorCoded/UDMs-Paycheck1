// Slider duration in milliseconds (15 seconds)
const SLIDE_DURATION = 15000;

// Data configuration for each slide in order
const sliderData = [
  {
    id: "trailer",
    title: "Discover Our Campus & Community",
    desc:
      "Watch a short overview of life at the University of Mascareignes, from modern labs to collaborative spaces.",
    buttonText: "Explore Faculties",
    buttonLink: "about/about.php"
  },
  {
    id: "fsde",
    title: "Faculty of Sustainable Development & Engineering",
    desc:
      "Engineering, environment and innovation working together for a sustainable future.",
    buttonText: "View Courses",
    buttonLink: "courses/courses.php"
  },
  {
    id: "fbm",
    title: "Faculty of Business & Management",
    desc:
      "Shape tomorrow’s leaders in management, finance, marketing and entrepreneurship.",
    buttonText: "View Courses",
    buttonLink: "courses/courses.php"
  },
  {
    id: "fict",
    title: "Faculty of Information & Communication Technology",
    desc:
      "Build your path in software engineering, networks, data and emerging digital technologies.",
    buttonText: "View Courses",
    buttonLink: "courses/courses.php"
  }
];

// Collect all hero slide elements
const slides = Array.from(document.querySelectorAll(".hero-slide"));

// Collect all preview card elements
const cards = Array.from(document.querySelectorAll(".preview-card"));

// Select hero title element
const titleEl = document.querySelector(".hero-title");

// Select hero description element
const descEl = document.querySelector(".hero-desc");

// Select hero button element
const btnEl = document.getElementById("hero-btn");

// Select preview track container
const trackEl = document.querySelector(".previews-track");

// Select progress bar fill element
const progressFill = document.querySelector(".progress-bar-fill");

// Select current slide number display
const numCurrent = document.querySelector(".slide-number-current");

// Select total slide number display
const numTotal = document.querySelector(".slide-number-total");

// Select left navigation arrow
const arrowLeft = document.getElementById("arrow-left");

// Select right navigation arrow
const arrowRight = document.getElementById("arrow-right");

// Track the currently active slide index
let currentIndex = 0;

// Store the auto-rotation timer ID
let timerId = null;

// Set the total number of slides in the UI
numTotal.textContent = slides.length.toString();

// Update slide visuals, text content, and state
function updateSlide(index) {

  // Wrap the index to stay within bounds
  currentIndex = (index + slides.length) % slides.length;

  // Toggle active class on background slides
  slides.forEach((s, i) => {
    s.classList.toggle("active", i === currentIndex);
  });

  // Toggle active class on preview cards
  cards.forEach((c, i) => {
    c.classList.toggle("active", i === currentIndex);
  });

  // Calculate card width including gap
  const cardWidth = cards[0].offsetWidth + 16;

  // Calculate horizontal offset for preview track
  const offset = Math.max(0, currentIndex - 1) * cardWidth;

  // Move the preview track
  trackEl.style.transform = `translateX(-${offset}px)`;

  // Retrieve slide data for the active slide
  const data = sliderData[currentIndex];

  // Update hero title text
  titleEl.textContent = data.title;

  // Update hero description text
  descEl.textContent = data.desc;

  // Update hero button text
  btnEl.textContent = data.buttonText || "";

  // Show or hide hero button based on data
  btnEl.style.display = data.buttonText ? "inline-flex" : "none";

  // Assign click action to hero button
  btnEl.onclick = () => {
    if (data.buttonLink && data.buttonLink !== "#") {
      window.location.href = data.buttonLink;
    }
  };

  // Update current slide number display
  numCurrent.textContent = (currentIndex + 1).toString();

  // Restart progress bar animation
  restartProgressBar();

  // Schedule the next automatic slide
  scheduleNext();
}

// Reset and restart the progress bar animation
function restartProgressBar() {

  // Remove transition temporarily
  progressFill.style.transition = "none";

  // Reset progress bar width
  progressFill.style.width = "0%";

  // Use double requestAnimationFrame to force reflow before animating
  requestAnimationFrame(() => {
    requestAnimationFrame(() => {
      progressFill.style.transition = `width ${SLIDE_DURATION}ms linear`;
      progressFill.style.width = "100%";
    });
  });
}

// Schedule automatic slide rotation
function scheduleNext() {

  // Clear existing timer if present
  if (timerId) {
    clearTimeout(timerId);
  }

  // Set new timer for next slide
  timerId = setTimeout(() => {
    updateSlide(currentIndex + 1);
  }, SLIDE_DURATION);
}

// Handle right arrow click
arrowRight.addEventListener("click", () => {
  updateSlide(currentIndex + 1);
});

// Handle left arrow click
arrowLeft.addEventListener("click", () => {
  updateSlide(currentIndex - 1);
});

// Enable clicking preview cards to jump to slides
cards.forEach((card) => {
  card.addEventListener("click", () => {
    const idx = parseInt(card.getAttribute("data-index"), 10);
    updateSlide(idx);
  });
});

// Initialize slider on first slide
updateSlide(0);
