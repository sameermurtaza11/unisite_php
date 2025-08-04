// facultyModal.js

document.addEventListener("DOMContentLoaded", function () {

    const facultyData = {
        "syed-perwaiz-asdaque": {
            photo: "static/media/Profile Pics/SPA.png",
            name: "Syed Perwaiz Asdaque",
            title: "Director",
            contact: "info@kinpoe.edu.pk",
            education: "Not Avalible for Now.",
            research: "Not Avalible for Now.",
            publications: [{ title: "Not Avalible for Now.", link: "" }],
        },
        "zafer-ahmed-siddiqui": {
            photo: "static/media/Profile Pics/ZAS.png",
            name: "Zafer Ahmed Siddiqui",
            title: "Registrar (KINPOE-C)",
            contact: "zafer.ahmed@kinpoe.edu.pk",
            education: "MS (ELECTRICAL ENGINEERING)",
            research: "Not Avalible for Now.",
            publications: [{ title: "Not Avalible for Now.", link: "" }],
        },
        "rizwan-ahmed": {
            photo: "static/media/Profile Pics/DRA.png",
            name: "Dr. Rizwan Ahmed",
            title: "Manager (ORIC)",
            contact: "info@kinpoe.edu.pk",
            education: "Not Avalible for Now.",
            research: "Reactor Physics, Fuel Management.",
            publications: [{ title: "Not Avalible for Now.", link: "" }],
        },
        "muhammad-arif-abdul-karim": {
            photo: "static/media/Profile Pics/MAAK.png",
            name: "Muhammad Arif Abdul Karim",
            title: "Manager (ISS)",
            contact: "Karim79121@hotmail.com",
            education: "B.E (Electronics)",
            research: "Not Avalible for Now.",
            publications: [{ title: "Not Avalible for Now.", link: "" }],
        },
        "nadeem-ahsan": {
            photo: "static/media/Profile Pics/DNA.png",
            name: "Dr. Nadeem Ahsan",
            title: "Manager (IT & CS)",
            contact: "info@kinpoe.edu.pk",
            education: "PhD - Institute for Software Technology, TUG, Graz, Austria.",
            research:
                "Software Engineering, Machine Learning, Mining Software Repositories",
            publications: [
                {
                    title:
                        "Automatic software bug triage system (bts) based on latent semantic indexing and support vector machine.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=NHHRRIAAAAAJ&citation_for_view=NHHRRIAAAAAJ:9yKSN-GCB0IC",
                },
                {
                    title: "Structure of fluxed sinter.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=NHHRRIAAAAAJ&citation_for_view=NHHRRIAAAAAJ:pyW8ca7W8N0C",
                },
                {
                    title:
                        "Improved routing metrics for energy constrained interconnected devices in low-power and lossy networks.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=NHHRRIAAAAAJ&citation_for_view=NHHRRIAAAAAJ:CHSYGLWDkRkC",
                },
                {
                    title:
                        "Data throughput improvement in IS2000 networks via effective F-SCH reduced active set pilot switching.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=NHHRRIAAAAAJ&citation_for_view=NHHRRIAAAAAJ:qxL8FJ1GzNcC",
                },
                {
                    title:
                        "System and method for edge of coverage detection in a wireless communication device.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=NHHRRIAAAAAJ&citation_for_view=NHHRRIAAAAAJ:Zph67rFs4hoC",
                },
            ],
        },
        "jawed-akhtar-bhutto": {
            photo: "static/media/Profile Pics/DJAB.png",
            name: "Dr. Jawed Akhtar Bhutto",
            title: "Manager (QA)",
            contact: "info@kinpoe.edu.pk",
            education: "PhD Electrical Engineering - NUST, Islamabad.",
            research: "Power Engineering & Control Engineering",
            publications: [
                {
                    title:
                        "Trade-off between the H/sub 2/ and H/sub /spl infin// in the multi-objective state feedback synthesis through LMI characterizations.",
                    link: "https://ieeexplore.ieee.org/document/1416740/",
                },
                {
                    title:
                        "Synthesis of Robust Performance of Active Suspension Control of Vehicle with Parametric uncertainty.",
                    link: "",
                },
                {
                    title:
                        "Analysis of robust performance of active suspension control of vehicle with polytopic uncertainty.",
                    link: "",
                },
                {
                    title:
                        "Robust Performance Control Synthesis of Smart Structural System with Limited Input.",
                    link: "",
                },
                {
                    title:
                        "Robust optimal active vibration control of smart structures using convex optimization.",
                    link: "",
                },
            ],
        },
        "atiq-ur-rehman": {
            photo: "static/media/Profile Pics/AUR.png",
            name: "Atiq ur Rehman",
            title: "Manager (Basic Training)",
            contact: "info@kinpoe.edu.pk",
            education: "Not Avalible for Now.",
            research: "Not Avalible for Now.",
            publications: [{ title: "Not Avalible for Now.", link: "" }],
        },
        "abdul-rehman-abbasi": {
            photo: "static/media/Profile Pics/DARA.png",
            name: "Dr. Abdul Rehman Abbasi",
            title: "Manager (Academic)",
            contact: "areahman.abbasi@kinpoe.edu.pk",
            education: "PhD (Mechatronics)",
            research:
                "Automation, Machine Vision Sensors and Actuators, Leadership Development",
            publications: [
                {
                    title:
                        "Towards development of a low cost early fire detection system using wireless sensor network and machine vision.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=nCcP5vcAAAAJ&citation_for_view=nCcP5vcAAAAJ:9yKSN-GCB0IC",
                },
                {
                    title:
                        "Power flow & voltage stability analyses and remedies for a 340 MW nuclear power plant using ETAP.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=nCcP5vcAAAAJ&citation_for_view=nCcP5vcAAAAJ:roLk4NBRz8UC",
                },
                {
                    title:
                        "Detecting & interpreting self-manipulating hand movements for student’s affect prediction.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=nCcP5vcAAAAJ&citation_for_view=nCcP5vcAAAAJ:0EnyYjriUFMC",
                },
                {
                    title:
                        "Student mental state inference from unintentional body gestures using dynamic Bayesian networks.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=nCcP5vcAAAAJ&citation_for_view=nCcP5vcAAAAJ:LkGwnXOMwfcC",
                },
                {
                    title:
                        "Towards knowledge-based affective interaction: situational interpretation of affect.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=nCcP5vcAAAAJ&citation_for_view=nCcP5vcAAAAJ:UeHWp8X0CEIC",
                },
            ],
        },
        "zahra-ali": {
            photo: "static/media/Profile Pics/Profile_icon.png",
            name: "Dr. Zahra Ali",
            title: "Professor",
            contact: "zahra.ali@paec.gov.pk",
            education: "PhD Plasma Physics - UTM, Malaysia.",
            research: "Plasma Physics, Reactor Core Modeling, Fusion Research",
            publications: [
                {
                    title:
                        "Radiation Self Absorption Effect in Ar Gas Nx2 Mather Type Plasma Focus.",
                    link: "",
                },
                {
                    title:
                        "Numerical Experiments for Radial Dynamics and Opacity Effect in Argon Plasma Focus.",
                    link: "",
                },
            ],
        },
        "salman-ahmed-khan": {
            photo: "static/media/Profile Pics/DSAK.png",
            name: "Dr. Salman Ahmed Khan",
            title: "Section Head (Cyber Security)",
            contact: "salman.khan@kinpoe.edu.pk",
            education: "PhD",
            research: "Mechatronics, Cyber Security",
            publications: [
                {
                    title:
                        "A Facile, Cost Effective, Patterned ZnO Microwires Synthesis for Large-Scale Fabrication of Piezoelectric-Generator.",
                    link: "",
                },
            ],
        },
        "khurram-kafeel": {
            photo: "static/media/Profile Pics/DKK.png",
            name: "Dr. Khurram Kafeel",
            title: "Section Head (C&PC)",
            contact: "khurram464@hotmail.com",
            education:
                "PhD Mechanical Engineering - The University of Manchester, UK",
            research:
                "Computational Fluid Dynamics, Numerical Simulation, Multiphase flow, Heat transfer, Mass transfer",
            publications: [
                {
                    title:
                        "Simulation of the response of a thermosyphon under pulsed heat input conditions.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=eBmZv5YAAAAJ&citation_for_view=eBmZv5YAAAAJ:u-x6o8ySG0sC",
                },
                {
                    title:
                        "Axi-symmetric simulation of a two phase vertical thermosyphon using Eulerian two-fluid methodology.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=eBmZv5YAAAAJ&citation_for_view=eBmZv5YAAAAJ:u5HHmVD_uO8C",
                },
                {
                    title:
                        "Modelling and simulation of two-phase closed thermosyphones using two-fluid method.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=eBmZv5YAAAAJ&citation_for_view=eBmZv5YAAAAJ:d1gkVwhDpl0C",
                },
                {
                    title:
                        "CFD simulation of air ventilated spent fuel cask design for PWR fuel assemblies.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=eBmZv5YAAAAJ&citation_for_view=eBmZv5YAAAAJ:9yKSN-GCB0IC",
                },
                {
                    title:
                        "Analysis of distribution of feed water through J tubes in feed water ring of chashma nuclear power plant.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=eBmZv5YAAAAJ&citation_for_view=eBmZv5YAAAAJ:2osOgNQ5qMEC",
                },
            ],
        },
        "adeel-abbas": {
            photo: "static/media/Profile Pics/DAA.png",
            name: "Dr. Adeel Abbas",
            title: "Professor",
            contact: "adeel.abbas@paec.gov.pk",
            education: "PhD (Energy & IT) - Vienna University of Technology, Austria",
            research: "Microgrids - Demand Side Management",
            publications: [
                {
                    title:
                        "Design and Tuning of a Decentralized Fuzzy Logic Controller for a MIMO Type Pressurized Heavy Water Reactor.",
                    link: "",
                },
                {
                    title:
                        "Experimental Testing of Observers Comprising Discrete Kalman Filter and High-Gain Observers.",
                    link: "",
                },
                {
                    title:
                        "A Hidden Markov Model Based Procedure for Identifying Household Electric Loads.",
                    link: "",
                },
                {
                    title:
                        "Load Recognition for Automated Demand Response in Microgrids.",
                    link: "",
                },
                {
                    title:
                        "Automated Demand Side Management in Microgrids Using Load Recognition.",
                    link: "",
                },
            ],
        },
        "naveen-masood": {
            photo: "static/media/Profile Pics/profile_icon.png",
            name: "Dr. Naveen Masood",
            title: "Section Head (IT)",
            contact: "student.bahria.edu.pk",
            education: "PhD - Bahria University, Karachi, Pakistan",
            research:
                "Brain Computer Interfacing, Machine Learning, EEG Signal Processing",
            publications: [
                {
                    title:
                        "Investigating EEG Patterns for Dual-Stimuli Induced Human Fear Emotional State.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=QpT4nQYAAAAJ&citation_for_view=QpT4nQYAAAAJ:_Qo2XoVZTnwC",
                },
                {
                    title: "Selection of EEG channels based on spatial filter weights.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=QpT4nQYAAAAJ&citation_for_view=QpT4nQYAAAAJ:hFOr9nPyWt4C",
                },
                {
                    title:
                        "Comparing Neural Correlates of Human Emotions across Multiple Stimulus Presentation Paradigms.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=QpT4nQYAAAAJ&citation_for_view=QpT4nQYAAAAJ:j3f4tGmQtD8C",
                },
                {
                    title: "Emotiv-based low-cost brain computer interfaces: A survey.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=QpT4nQYAAAAJ&citation_for_view=QpT4nQYAAAAJ:-f6ydRqryjwC",
                },
                {
                    title:
                        "Multimodal Paradigm for Emotion Recognition Based on EEG Signals.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=QpT4nQYAAAAJ&citation_for_view=QpT4nQYAAAAJ:R3hNpaxXUhUC",
                },
            ],
        },
        "naila-zareen": {
            photo: "static/media/Profile Pics/Profile_icon.png",
            name: "Dr. Naila Zareen",
            title: "Section Head (Laboratories)",
            contact: "dr.naila.zareen@paec.gov.pk",
            education: "PhD (Electrical Power Engineering) - UTM, Malaysia",
            research:
                "DEAR Lab, Demand Side Management, Distributed Generation, Regulated & Dereglated Power System, Electrical Vehicle.",
            publications: [
                {
                    title:
                        "A review of optimum DG placement based on minimization of power losses and voltage stability enhancement of distribution system.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=klEVmXwAAAAJ&citation_for_view=klEVmXwAAAAJ:_kc_bZDykSQC",
                },
                {
                    title:
                        "Grey wolf optimizer based placement and sizing of multiple distributed generation in the distribution system.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=klEVmXwAAAAJ&citation_for_view=klEVmXwAAAAJ:4TOpqqG69KYC",
                },
                {
                    title:
                        "Optimal real time cost-benefit based demand response with intermittent resources.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=klEVmXwAAAAJ&citation_for_view=klEVmXwAAAAJ:Se3iqnhoufwC",
                },
                {
                    title:
                        "Root cause analysis (RCA) of fractured ASTM A53 carbon steel pipe at oil & gas company.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=klEVmXwAAAAJ&citation_for_view=klEVmXwAAAAJ:hqOjcs7Dif8C",
                },
                {
                    title:
                        "Automatic classification of power quality disturbances: A review.",
                    link: "https://scholar.google.com/citations?view_op=view_citation&hl=en&user=QpT4nQYAAAAJ&citation_for_view=QpT4nQYAAAAJ:R3hNpaxXUhUC",
                },
            ],
        },
        "mazhar-ali": {
            photo: "static/media/Profile Pics/MA.png",
            name: "Mazhar Ali",
            title: "Section Head (ISS)",
            contact: "mazhar.ali@kinpoe.edu.pk",
            education: "Master of Sciences(NPE)",
            research: "Computational fluid dynamics analysis, process Engineering",
            publications: [
                { title: "Not Avalible for Now.", link: "" }
            ],
        },
        "muhammad-faizan-mansoor": {
            photo: "static/media/Profile Pics/MFM.png",
            name: "Muhammad Faizan Mansoor",
            title: "Lab Coordinator",
            contact: "m.faizan@kinpoe.edu.pk",
            education: "Master of Sciences(NPE)",
            research:
                "Structural and Fatigue Analysis, Robotics, Computational Fluid Dynamics",
            publications: [
                { title: "Not Avalible for Now.", link: "" }
            ],
        },
        "syed-muhammad-haris": {
            photo: "static/media/Profile Pics/SMH.png",
            name: "Syed Muhammad Haris",
            title: "Section Head (QA)",
            contact: "syed.haris@kinpoe.edu.pk",
            education: "Master of Sciences(NPE)",
            research: "Artificial Intelligence, Robotics, Structural Analysis, Computational Fluid Dynamics",
            publications: [
                { title: "Bearing Degradation Process Prediction Based on Feedforward Neural Network.", link: "" },
                { title: "Design, Modeling and analysis of Robotic Manipulator for Welding of Nuclear Spent Fuel Cask Lid.", link: "" }
            ],
        },
        "syed-khawar-hussain": {
            photo: "static/media/Profile Pics/SKH.png",
            name: "Syed Khawar Hussain",
            title: "Section Head (QTP)",
            contact: "info@kinpoe.edu.pk",
            education: "Master of Sciences(NPE)",
            research:
                "Materials Engineering, Fracture mechanics, Welding, Heat Treatment, Nano Materials, Physical Metallurgy, fabrication of Materials, Degradation and Corrosion, Nuclear Reactor Materials, Microscopy of Materials",
            publications: [
                { title: "Not Avalible for Now.", link: "" }
            ],
        },
        "muhammad-junaid-ur-rehman": {
            photo: "static/media/Profile Pics/MJUR.png",
            name: "Muhammad Junaid ur Rehman",
            title: "Section Head (ORIC)",
            contact: "Muhammad.junaid@paec.gov.pk",
            education: "Master of Sciences(NPE)",
            research:
                "Micro structural Modifications, Heat treatment, NDT, Fracture Mechanics, Ageing Assessments",
            publications: [
                { title: "Not Avalible for Now.", link: "" }
            ],
        },
        "akbar-abbas": {
            photo: "static/media/Profile Pics/AA.png",
            name: "Akbar Abbas",
            title: "Section Head (Programs)",
            contact: "Akbar.abbas@kinpoe.edu.pk",
            education: "MS(Physics)",
            research: "Computational Condensed Matter Physics (Density Functional Theory)",
            publications: [
                { title: "Not Avalible for Now.", link: "" }
            ],
        },

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
        document.getElementById("facultyModalContact").textContent =
            data.contact || "";
        document.getElementById("facultyModalEducation").textContent =
            data.education || "";
        document.getElementById("facultyModalResearchArea").textContent =
            data.research || "";
        // Render publications as a list with links
        const publicationsList = document.getElementById(
            "facultyModalPublications"
        );
        publicationsList.innerHTML = "";
        if (Array.isArray(data.publications)) {
            data.publications.forEach((pub) => {
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
