// facultyModal.js
// Handles faculty modal open/close, data mapping, rendering, accessibility
// Author: KINPOE Web Team
// modules/facultyModal.js
// Handles faculty modal open/close, content population, focus trap, and accessibility

document.addEventListener("DOMContentLoaded", function () {
  // Faculty data map: scalable, clean separation from HTML
  // Keyed by faculty ID, each entry contains all modal data for a faculty member
  // Faculty data map: scalable, clean separation from HTML
  const facultyData = {
    "adeel-abbas": {
      photo: "static/media/DAA.png",
      name: "Dr. Adeel Abbas",
      title: "Professor",
      contact: "adeel@kinpoe.edu.pk",
      education: "Ph.D. in Electrical Engineering",
      research: "Microgrids, Renewables",
      publications: [
        { title: "Energy Reports, 2024", link: "" }
      ]
    },
    "naveen-masood": {
      photo: "static/media/profile_icon.png",
      name: "Dr. Naveen Masood",
      title: "Section Head (IT)",
      contact: "student.bahria.edu.pk",
      education: "PhD - Bahria University, Karachi, Pakistan",
      research: "Brain Computer Interfacing, Machine Learning, EEG Signal Processing",
      publications: [
        { title: "Investigating EEG Patterns for Dual-Stimuli Induced Human Fear Emotional State.", link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=QpT4nQYAAAAJ&citation_for_view=QpT4nQYAAAAJ:_Qo2XoVZTnwC" },
        { title: "Selection of EEG channels based on spatial filter weights.", link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=QpT4nQYAAAAJ&citation_for_view=QpT4nQYAAAAJ:hFOr9nPyWt4C" },
        { title: "Comparing Neural Correlates of Human Emotions across Multiple Stimulus Presentation Paradigms.", link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=QpT4nQYAAAAJ&citation_for_view=QpT4nQYAAAAJ:j3f4tGmQtD8C" },
        { title: "Emotiv-based low-cost brain computer interfaces: A survey.", link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=QpT4nQYAAAAJ&citation_for_view=QpT4nQYAAAAJ:-f6ydRqryjwC" },
        { title: "Multimodal Paradigm for Emotion Recognition Based on EEG Signals.", link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=QpT4nQYAAAAJ&citation_for_view=QpT4nQYAAAAJ:R3hNpaxXUhUC" }
      ]
    },
    "naila-zareen": {
      photo: "static/media/Profile_icon.png",
      name: "Dr. Naila Zareen",
      title: "Section Head (Laboratories)",
      contact: "naila@kinpoe.edu.pk",
      education: "Ph.D. in Lab Management",
      research: "AI, Machine Vision",
      publications: [
        { title: "Lab Science, 2022", link: "" }
      ]
    },
    "mazhar-ali": {
      photo: "static/media/profile_icon.png",
      name: "Mazhar Ali",
      title: "Section Head (PDTP)",
      contact: "Not Avalible for Now.",
      education: "Not Avalible for Now.",
      research: "Not Avalible for Now.",
      publications: [
        { title: "Not Avalible for Now.", link: "" }
      ]
    }
    // Add more faculty here as needed
  };
  const modal = document.getElementById("facultyModal");
  const overlay = document.getElementById("facultyModalOverlay");
  const closeBtn = document.getElementById("facultyModalClose");
  let lastFocused = null;

  function openModal(data) {
    // Populate modal fields with selected faculty data
    lastFocused = document.activeElement;
    document.getElementById("facultyModalPhoto").src = data.photo;
    document.getElementById("facultyModalPhoto").alt = data.name;
    document.getElementById("facultyModalName").textContent = data.name;
    document.getElementById("facultyModalTitle").textContent = data.title;
    document.getElementById("facultyModalContact").textContent = data.contact || "";
    document.getElementById("facultyModalEducation").textContent = data.education || "";
    document.getElementById("facultyModalResearchArea").textContent = data.research || "";
    // Render publications as a list with links
    const publicationsList = document.getElementById("facultyModalPublications");
    publicationsList.innerHTML = "";
    if (Array.isArray(data.publications)) {
      data.publications.forEach(pub => {
        const li = document.createElement("li");
        if (pub.link && pub.link.trim() !== "") {
          const a = document.createElement("a");
          a.textContent = pub.title;
          a.href = pub.link;
          a.target = "_blank";
          a.rel = "noopener noreferrer";
          a.className = "text-kinpoe-blue underline hover:text-kinpoe-gold";
          li.appendChild(a);
        } else {
          li.textContent = pub.title;
        }
        publicationsList.appendChild(li);
      });
    }

    // Scholar link logic removed as requested. Modal will not show or handle Google Scholar links.

    modal.classList.remove("hidden");
    modal.setAttribute("aria-modal", "true");
    modal.setAttribute("tabindex", "-1");
    modal.focus();
    trapFocus();
  }

  function closeModal() {
    // Close modal and restore focus
    modal.classList.add("hidden");
    modal.removeAttribute("aria-modal");
    if (lastFocused) lastFocused.focus();
  }

  function trapFocus() {
    // Trap keyboard focus within modal for accessibility
    const focusable = modal.querySelectorAll(
      'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
    );
    const first = focusable[0];
    const last = focusable[focusable.length - 1];
    modal.addEventListener("keydown", function (e) {
      if (e.key === "Tab") {
        if (e.shiftKey) {
          if (document.activeElement === first) {
            e.preventDefault();
            last.focus();
          }
        } else {
          if (document.activeElement === last) {
            e.preventDefault();
            first.focus();
          }
        }
      }
      if (e.key === "Escape") closeModal();
    });
  }

  // Attach open handlers
  document.querySelectorAll(".faculty-readmore").forEach((btn) => {
  // Attach click handlers to all faculty buttons, open modal with correct data
    btn.addEventListener("click", function () {
      const facultyId = this.getAttribute("data-faculty-id");
      const data = facultyData[facultyId];
      if (data) {
        openModal(data);
      }
    });
  });
  // Overlay and close
  overlay.addEventListener("click", closeModal);
  // Close modal when overlay is clicked
  closeBtn.addEventListener("click", closeModal);
  // Close modal when close button is clicked
});
