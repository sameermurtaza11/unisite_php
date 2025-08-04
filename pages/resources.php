<!-- Resources Page Content -->
<section class="pb-20 bg-white">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-kinpoe-blue to-kinpoe-light-blue text-white">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-6">Resources</h1>
                <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                    Karachi Institute of Power Engineering - Excellence in Engineering Education and Research
                </p>
            </div>
        </div>
    </section>

    <!-- Laboratories Section -->
    <div class="mb-12"
        x-data="{
                showModal: false,
                modalLab: null,
                labImages: [],
                labSlide: 0,
                openModal(lab) {
                    this.modalLab = lab;
                    this.labImages = lab.images;
                    this.labSlide = 0;
                    this.showModal = true;
                }
            }">
        <h2 class="text-2xl font-bold text-kinpoe-blue mb-4 border-b pb-2">Laboratories</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Chemical Monitoring Lab -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-vial text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2 text-center">Chemical Monitoring Lab</h3>
                <p class="text-gray-600 text-center">Equipped for advanced chemical analysis and monitoring for power plant operations and research.</p>
                <button @click="openModal({
                        title: 'Chemical Monitoring Lab',
                        desc: 'The Chemical Monitoring Lab provides hands-on experience in water chemistry, fuel analysis, and environmental monitoring. Students and researchers use state-of-the-art equipment for real-time analysis and quality assurance in power plant operations.',
                        images: [
                            {img: 'static/media/Photos/2025_06_21_0116.jpg', alt: 'Chemical Lab 1'},
                            {img: 'static/media/Photos/2025_06_21_0119.jpg', alt: 'Chemical Lab 2'},
                            {img: 'static/media/Photos/chem_lab2.jpg', alt: 'Chemical Lab 3'},
                            {img: 'static/media/Photos/chem_lab1.jpg', alt: 'Chemical Lab 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
            <!-- Mechanical Lab -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-cogs text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2 text-center">Mechanical Lab</h3>
                <p class="text-gray-600 text-center">Facilities for mechanical testing, materials science, and engineering mechanics experiments.</p>
                <button @click="openModal({
                        title: 'Mechanical Lab',
                        desc: 'The Mechanical Lab is equipped for stress analysis, vibration testing, and materials characterization. It supports research in thermodynamics, fluid mechanics, and mechanical design, providing students with practical engineering skills.',
                        images: [
                            {img: 'static/media/Photos/2025_06_21_0145.jpg', alt: 'Mechanical Lab 1'},
                            {img: 'static/media/Photos/mech_lab_2.jpg', alt: 'Mechanical Lab 2'},
                            {img: 'static/media/Photos/mech_lab3.jpg', alt: 'Mechanical Lab 3'},
                            {img: 'static/media/Photos/mech_lab4.jpg', alt: 'Mechanical Lab 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
            <!-- Nuclear Instrumentation Lab -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-atom text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2 text-center">Nuclear Instrumentation Lab</h3>
                <p class="text-gray-600 text-center">Hands-on training with nuclear measurement and control systems for reactor operations.</p>
                <button @click="openModal({
                        title: 'Nuclear Instrumentation Lab',
                        desc: 'This lab features radiation detectors, nuclear simulators, and control system trainers. Students learn about reactor safety, neutron flux measurement, and nuclear electronics in a safe, supervised environment.',
                        images: [
                            {img: 'static/media/Photos/2025_06_21_0125.jpg', alt: 'Nuclear Lab 1'},
                            {img: 'static/media/Photos/2025_06_21_0124.jpg', alt: 'Nuclear Lab 2'},
                            {img: 'static/media/Photos/nuclear_lab1.jpg', alt: 'Nuclear Lab 3'},
                            {img: 'static/media/Photos/nuclear_lab2.jpg', alt: 'Nuclear Lab 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
            <!-- Electronic Lab -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-microchip text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2 text-center">Electronic Lab</h3>
                <p class="text-gray-600 text-center">Modern electronics lab for circuit design, embedded systems, and instrumentation projects.</p>
                <button @click="openModal({
                        title: 'Electronic Lab',
                        desc: 'The Electronic Lab supports PCB prototyping, microcontroller programming, and sensor interfacing. It is ideal for IoT, automation, and robotics projects, with access to oscilloscopes, logic analyzers, and soldering stations.',
                        images: [
                            {img: 'static/media/Photos/2025_06_21_0112.jpg', alt: 'Electronic Lab 1'},
                            {img: 'static/media/Photos/2025_06_21_0111.jpg', alt: 'Electronic Lab 2'},
                            {img: 'static/media/Photos/electronic_lab2.jpg', alt: 'Electronic Lab 3'},
                            {img: 'static/media/Photos/electronic_lab3.jpg', alt: 'Electronic Lab 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
            <!-- Electrical Lab -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-bolt text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2 text-center">Electrical Lab</h3>
                <p class="text-gray-600 text-center">Power systems, machines, and electrical safety experiments with industry-grade equipment.</p>
                <button @click="openModal({
                        title: 'Electrical Lab',
                        desc: 'The Electrical Lab offers training in power generation, transmission, and distribution. Students work with transformers, motors, and protection relays, gaining experience in electrical safety and grid operations.',
                        images: [
                            {img: 'static/media/Photos/2025_06_21_0110.jpg', alt: 'Electrical Lab 1'},
                            {img: 'static/media/Photos/2025_06_21_0107.jpg', alt: 'Electrical Lab 2'},
                            {img: 'static/media/Photos/20230721_121927.jpg', alt: 'Electrical Lab 3'},
                            {img: 'static/media/Photos/20230721_121734.jpg', alt: 'Electrical Lab 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
            <!-- RAISE Lab -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-chalkboard-teacher text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2 text-center">SKDL Lab</h3>
                <p class="text-gray-600 text-center">Exploring Intelligence, Engineering the Future — At the Crossroads of AI and Software Innovation.</p>
                <button @click="openModal({
                        title: 'SKDL Lab',
                        desc: 'At the forefront of innovation, the Research in AI and Software Engineering Lab explores intelligent systems and cutting-edge software solutions. Our mission is to bridge theory and real-world applications through collaborative research. From machine learning to advanced system design, we empower the next generation of engineers to solve tomorrow’s challenges today.',
                        images: [
                            {img: 'static/media/Photos/IMG_20230420_122310.jpg', alt: 'SKDL Lab 1'},
                            {img: 'static/media/Photos/skdl_lab1.jpg', alt: 'SKDL Lab 2'},
                            {img: 'static/media/Photos/skdl_lab2.jpg', alt: 'SKDL Lab 3'},
                            {img: 'static/media/Photos/skdl_lab3.jpg', alt: 'SKDL Lab 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
        </div>
        <!-- Modal with Carousel for Labs -->
        <div x-show="showModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60">
            <div class="bg-white rounded-lg shadow-lg max-w-xl w-full p-6 relative">
                <button @click="showModal = false" class="absolute top-2 right-2 text-gray-500 hover:text-kinpoe-blue text-xl">&times;</button>
                <h3 class="text-2xl font-bold text-kinpoe-blue mb-2 text-center" x-text="modalLab?.title"></h3>
                <p class="text-gray-700 mb-4" x-text="modalLab?.desc"></p>
                <div class="flex justify-center items-center mb-4">
                    <button @click="labSlide = (labSlide === 0 ? labImages.length - 1 : labSlide - 1)"
                        class="text-kinpoe-blue hover:text-kinpoe-gold px-2">
                        <i class="fas fa-chevron-left text-2xl"></i>
                    </button>
                    <template x-for="(img, index) in labImages" :key="index">
                        <div x-show="labSlide === index" x-transition class="w-full max-w-md mx-4">
                            <img :src="img.img" :alt="img.alt" class="rounded-lg shadow-lg w-full h-56 object-cover">
                            <div class="text-center mt-2 text-kinpoe-blue font-semibold" x-text="img.alt"></div>
                        </div>
                    </template>
                    <button @click="labSlide = (labSlide + 1) % labImages.length"
                        class="text-kinpoe-blue hover:text-kinpoe-gold px-2">
                        <i class="fas fa-chevron-right text-2xl"></i>
                    </button>
                </div>
                <div class="flex justify-center mt-2 space-x-2">
                    <template x-for="(img, index) in labImages" :key="index">
                        <button @click="labSlide = index"
                            :class="labSlide === index ? 'bg-kinpoe-blue' : 'bg-gray-300'"
                            class="w-3 h-3 rounded-full transition-all duration-300"></button>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <!-- IT Services & Library Section -->
    <div class="mb-12"
        x-data="{
                showModal: false,
                modalItem: null,
                itemImages: [],
                itemSlide: 0,
                openModal(item) {
                    this.modalItem = item;
                    this.itemImages = item.images;
                    this.itemSlide = 0;
                    this.showModal = true;
                }
            }">
        <h2 class="text-2xl font-bold text-kinpoe-blue mb-4 border-b pb-2">IT Services & Library</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- IT Services -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-desktop text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2 text-center">IT Services</h3>
                <p class="text-gray-600 text-center">Campus-wide WiFi, computer labs, and technical support for students and faculty. Access to licensed engineering software and cloud resources.</p>
                <button @click="openModal({
                        title: 'IT Services',
                        desc: 'Our IT Services department ensures seamless connectivity and access to digital resources across campus. Students benefit from high-speed internet, secure cloud storage, and 24/7 helpdesk support. Specialized engineering software and virtual labs are available for coursework and research.',
                        images: [
                            {img: 'static/media/Photos/2025_07_22_0221.jpg', alt: 'IT Services 1'},
                            {img: 'static/media/Photos/2025_06_21_0137.jpg', alt: 'IT Services 2'},
                            {img: 'static/media/Photos/IMG_20230420_120351.jpg', alt: 'IT Services 3'},
                            {img: 'static/media/Photos/IMG_20230420_120425.jpg', alt: 'IT Services 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
            <!-- Library -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-book text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2 text-center">Library</h3>
                <p class="text-gray-600 text-center">Extensive collection of engineering books, journals, and digital resources. Study spaces and online access to research databases.</p>
                <button @click="openModal({
                        title: 'Library',
                        desc: 'The KINPOE Library offers a quiet environment for study and research, with thousands of print and digital resources. Students can access e-journals, engineering standards, and online learning platforms. Group study rooms and digital catalog search are also available.',
                        images: [
                            {img: 'static/media/Photos/2025_06_21_0130.jpg', alt: 'Library 1'},
                            {img: 'static/media/Photos/2025_06_21_0132.jpg', alt: 'Library 2'},
                            {img: 'static/media/Photos/2025_06_21_0133.jpg', alt: 'Library 3'},
                            {img: 'static/media/Photos/IMG_20230502_120027.jpg', alt: 'Library 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
        </div>
        <!-- Modal with Carousel for IT Services & Library -->
        <div x-show="showModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60">
            <div class="bg-white rounded-lg shadow-lg max-w-xl w-full p-6 relative">
                <button @click="showModal = false" class="absolute top-2 right-2 text-gray-500 hover:text-kinpoe-blue text-xl">&times;</button>
                <h3 class="text-2xl font-bold text-kinpoe-blue mb-2 text-center" x-text="modalItem?.title"></h3>
                <p class="text-gray-700 mb-4" x-text="modalItem?.desc"></p>
                <div class="flex justify-center items-center mb-4">
                    <button @click="itemSlide = (itemSlide === 0 ? itemImages.length - 1 : itemSlide - 1)"
                        class="text-kinpoe-blue hover:text-kinpoe-gold px-2">
                        <i class="fas fa-chevron-left text-2xl"></i>
                    </button>
                    <template x-for="(img, index) in itemImages" :key="index">
                        <div x-show="itemSlide === index" x-transition class="w-full max-w-md mx-4">
                            <img :src="img.img" :alt="img.alt" class="rounded-lg shadow-lg w-full h-56 object-cover">
                            <div class="text-center mt-2 text-kinpoe-blue font-semibold" x-text="img.alt"></div>
                        </div>
                    </template>
                    <button @click="itemSlide = (itemSlide + 1) % itemImages.length"
                        class="text-kinpoe-blue hover:text-kinpoe-gold px-2">
                        <i class="fas fa-chevron-right text-2xl"></i>
                    </button>
                </div>
                <div class="flex justify-center mt-2 space-x-2">
                    <template x-for="(img, index) in itemImages" :key="index">
                        <button @click="itemSlide = index"
                            :class="itemSlide === index ? 'bg-kinpoe-blue' : 'bg-gray-300'"
                            class="w-3 h-3 rounded-full transition-all duration-300"></button>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <!-- R&D Activities Section -->
    <div class="mb-12"
        x-data="{
                showModal: false,
                modalItem: null,
                itemImages: [],
                itemSlide: 0,
                openModal(item) {
                    this.modalItem = item;
                    this.itemImages = item.images;
                    this.itemSlide = 0;
                    this.showModal = true;
                }
            }">
        <h2 class="text-2xl font-bold text-kinpoe-blue mb-4 border-b pb-2">R&D Activities</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- RAISE Lab -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-brain text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2 text-center">RAISE Lab</h3>
                <p class="text-gray-600 text-center">
                    "RAISE Lab" applies AI and modern software engineering to enhance safety, efficiency, and automation in nuclear power plant systems—driving innovation from intelligent diagnostics to digital twins.
                </p>
                <button @click="openModal({
                        title: 'RAISE Lab',
                        desc: 'At RAISE Lab, we harness the power of AI and software engineering to modernize nuclear systems. Our work includes developing ML models for real-time diagnostics and predictive maintenance, designing digital twins for simulation and operator training, and optimizing human-machine interfaces for better control room performance. We also focus on software verification to ensure reliability and use data-driven insights to automate and upgrade legacy systems.',
                        images: [
                            {img: 'static/media/raise_lab1.jpg', alt: 'RAISE Lab 1'},
                            {img: 'static/media/raise_lab2.jpg', alt: 'RAISE Lab 2'},
                            {img: 'static/media/raise_lab3.jpg', alt: 'RAISE Lab 3'},
                            {img: 'static/media/raise_lab4.jpg', alt: 'RAISE Lab 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
            <!-- DEAR Lab -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-drafting-compass text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg text-center font-semibold text-kinpoe-blue mb-2 text-center">Design Engineering & Applied Research Lab</h3>
                <p class="text-gray-600 text-center">
                    "DEAR Lab" provides resources for robotics, automation, and 3D vision research, supporting hands-on projects in intelligent systems at KINPOE.
                </p>
                <button @click="openModal({
                        title: 'DEAR LAB',
                        desc: 'DEAR Lab at KINPOE is a multidisciplinary R&D facility offering computing and hardware resources for students, faculty, and plant personnel. The lab specializes in robotic vision—enabling robots to identify and locate 3D objects in their environment by extracting and interpreting information from images.',
                        images: [
                            {img: 'static/media/Photos/2025_06_21_0140.jpg', alt: 'DEAR Lab 1'},
                            {img: 'static/media/Photos/2025_06_21_0139.jpg', alt: 'DEAR Lab 2'},
                            {img: 'static/media/Photos/IMG_20230502_1209089.jpg', alt: 'DEAR Lab 3'},
                            {img: 'static/media/Photos/dear_lab_3.jpg', alt: 'DEAR Lab 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
            <!-- Industry Collaboration -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-lightbulb text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2 text-center">Industry Collaboration</h3>
                <p class="text-gray-600 text-center">
                    KINPOE partners with Karachi Nuclear Power Generating Station (KNPGS) to provide students and trainees with on-the-job training, offering hands-on experience in real-world nuclear power plant operations.
                </p>
                <button @click="openModal({
                        title: 'Industry Collaboration',
                        desc: 'Through collaboration with KNPGS, KINPOE enables students and trainees to participate in on-site training at a working nuclear power plant. This partnership bridges academic learning with industry practice, allowing participants to gain practical skills, understand operational protocols, and experience the challenges and responsibilities of the energy sector firsthand.',
                        images: [
                            {img: 'static/media/industry1.jpg', alt: 'Industry Collaboration 1'},
                            {img: 'static/media/industry2.jpg', alt: 'Industry Collaboration 2'},
                            {img: 'static/media/industry3.jpg', alt: 'Industry Collaboration 3'},
                            {img: 'static/media/industry4.jpg', alt: 'Industry Collaboration 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
        </div>
        <!-- Modal with Carousel for R&D Activities -->
        <div x-show="showModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60">
            <div class="bg-white rounded-lg shadow-lg max-w-xl w-full p-6 relative">
                <button @click="showModal = false" class="absolute top-2 right-2 text-gray-500 hover:text-kinpoe-blue text-xl">&times;</button>
                <h3 class="text-2xl font-bold text-kinpoe-blue mb-2 text-center" x-text="modalItem?.title"></h3>
                <p class="text-gray-700 mb-4" x-text="modalItem?.desc"></p>
                <div class="flex justify-center items-center mb-4">
                    <button @click="itemSlide = (itemSlide === 0 ? itemImages.length - 1 : itemSlide - 1)"
                        class="text-kinpoe-blue hover:text-kinpoe-gold px-2">
                        <i class="fas fa-chevron-left text-2xl"></i>
                    </button>
                    <template x-for="(img, index) in itemImages" :key="index">
                        <div x-show="itemSlide === index" x-transition class="w-full max-w-md mx-4">
                            <img :src="img.img" :alt="img.alt" class="rounded-lg shadow-lg w-full h-56 object-cover">
                            <div class="text-center mt-2 text-kinpoe-blue font-semibold" x-text="img.alt"></div>
                        </div>
                    </template>
                    <button @click="itemSlide = (itemSlide + 1) % itemImages.length"
                        class="text-kinpoe-blue hover:text-kinpoe-gold px-2">
                        <i class="fas fa-chevron-right text-2xl"></i>
                    </button>
                </div>
                <div class="flex justify-center mt-2 space-x-2">
                    <template x-for="(img, index) in itemImages" :key="index">
                        <button @click="itemSlide = index"
                            :class="itemSlide === index ? 'bg-kinpoe-blue' : 'bg-gray-300'"
                            class="w-3 h-3 rounded-full transition-all duration-300"></button>
                    </template>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>