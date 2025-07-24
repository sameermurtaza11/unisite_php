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
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2">Chemical Monitoring Lab</h3>
                <p class="text-gray-600 text-center">Equipped for advanced chemical analysis and monitoring for power plant operations and research.</p>
                <button @click="openModal({
                        title: 'Chemical Monitoring Lab',
                        desc: 'The Chemical Monitoring Lab provides hands-on experience in water chemistry, fuel analysis, and environmental monitoring. Students and researchers use state-of-the-art equipment for real-time analysis and quality assurance in power plant operations.',
                        images: [
                            {img: 'static/media/CML/chem_lab1.jpg', alt: 'Chemical Lab 1'},
                            {img: 'static/media/CML/chem_lab2.jpg', alt: 'Chemical Lab 2'},
                            {img: 'static/media/CML/chem_lab3.jpg', alt: 'Chemical Lab 3'},
                            {img: 'static/media/CML/chem_lab4.jpg', alt: 'Chemical Lab 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
            <!-- Mechanical Lab -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-cogs text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2">Mechanical Lab</h3>
                <p class="text-gray-600 text-center">Facilities for mechanical testing, materials science, and engineering mechanics experiments.</p>
                <button @click="openModal({
                        title: 'Mechanical Lab',
                        desc: 'The Mechanical Lab is equipped for stress analysis, vibration testing, and materials characterization. It supports research in thermodynamics, fluid mechanics, and mechanical design, providing students with practical engineering skills.',
                        images: [
                            {img: 'static/media/Mech Lab/mech_lab1.jpg', alt: 'Mechanical Lab 1'},
                            {img: 'static/media/Mech Lab/mech_lab2.jpg', alt: 'Mechanical Lab 2'},
                            {img: 'static/media/Mech Lab/mech_lab3.jpg', alt: 'Mechanical Lab 3'},
                            {img: 'static/media/Mech Lab/mech_lab4.jpg', alt: 'Mechanical Lab 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
            <!-- Nuclear Instrumentation Lab -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-atom text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2">Nuclear Instrumentation Lab</h3>
                <p class="text-gray-600 text-center">Hands-on training with nuclear measurement and control systems for reactor operations.</p>
                <button @click="openModal({
                        title: 'Nuclear Instrumentation Lab',
                        desc: 'This lab features radiation detectors, nuclear simulators, and control system trainers. Students learn about reactor safety, neutron flux measurement, and nuclear electronics in a safe, supervised environment.',
                        images: [
                            {img: 'static/media/NI Lab/nuclear_lab1.jpg', alt: 'Nuclear Lab 1'},
                            {img: 'static/media/NI Lab/nuclear_lab2.jpg', alt: 'Nuclear Lab 2'},
                            {img: 'static/media/NI Lab/nuclear_lab3.jpg', alt: 'Nuclear Lab 3'},
                            {img: 'static/media/NI Lab/nuclear_lab4.jpg', alt: 'Nuclear Lab 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
            <!-- Electronic Lab -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-microchip text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2">Electronic Lab</h3>
                <p class="text-gray-600 text-center">Modern electronics lab for circuit design, embedded systems, and instrumentation projects.</p>
                <button @click="openModal({
                        title: 'Electronic Lab',
                        desc: 'The Electronic Lab supports PCB prototyping, microcontroller programming, and sensor interfacing. It is ideal for IoT, automation, and robotics projects, with access to oscilloscopes, logic analyzers, and soldering stations.',
                        images: [
                            {img: 'static/media/Electronic Lab/electronic_lab1.jpg', alt: 'Electronic Lab 1'},
                            {img: 'static/media/Electronic Lab/electronic_lab2.jpg', alt: 'Electronic Lab 2'},
                            {img: 'static/media/Electronic Lab/electronic_lab3.jpg', alt: 'Electronic Lab 3'},
                            {img: 'static/media/Electronic Lab/electronic_lab4.jpg', alt: 'Electronic Lab 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
            <!-- Electrical Lab -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-bolt text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2">Electrical Lab</h3>
                <p class="text-gray-600 text-center">Power systems, machines, and electrical safety experiments with industry-grade equipment.</p>
                <button @click="openModal({
                        title: 'Electrical Lab',
                        desc: 'The Electrical Lab offers training in power generation, transmission, and distribution. Students work with transformers, motors, and protection relays, gaining experience in electrical safety and grid operations.',
                        images: [
                            {img: 'static/media/electrical_lab1.jpg', alt: 'Electrical Lab 1'},
                            {img: 'static/media/electrical_lab2.jpg', alt: 'Electrical Lab 2'},
                            {img: 'static/media/electrical_lab3.jpg', alt: 'Electrical Lab 3'},
                            {img: 'static/media/electrical_lab4.jpg', alt: 'Electrical Lab 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
            <!-- RAISE Lab -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-robot text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2">RAISE Lab</h3>
                <p class="text-gray-600 text-center">Research and Innovation in Smart Energy (RAISE) Lab for smart grid and renewable energy research.</p>
                <button @click="openModal({
                        title: 'RAISE Lab',
                        desc: 'The RAISE Lab is dedicated to smart grid, renewable integration, and energy analytics. Projects include real-time monitoring, demand response, and AI-driven energy management for a sustainable future.',
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
        </div>
        <!-- Modal with Carousel for Labs -->
        <div x-show="showModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60">
            <div class="bg-white rounded-lg shadow-lg max-w-xl w-full p-6 relative">
                <button @click="showModal = false" class="absolute top-2 right-2 text-gray-500 hover:text-kinpoe-blue text-xl">&times;</button>
                <h3 class="text-2xl font-bold text-kinpoe-blue mb-2" x-text="modalLab?.title"></h3>
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
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2">IT Services</h3>
                <p class="text-gray-600 text-center">Campus-wide WiFi, computer labs, and technical support for students and faculty. Access to licensed engineering software and cloud resources.</p>
                <button @click="openModal({
                        title: 'IT Services',
                        desc: 'Our IT Services department ensures seamless connectivity and access to digital resources across campus. Students benefit from high-speed internet, secure cloud storage, and 24/7 helpdesk support. Specialized engineering software and virtual labs are available for coursework and research.',
                        images: [
                            {img: 'static/media/it_services1.jpg', alt: 'IT Services 1'},
                            {img: 'static/media/it_services2.jpg', alt: 'IT Services 2'},
                            {img: 'static/media/it_services3.jpg', alt: 'IT Services 3'},
                            {img: 'static/media/it_services4.jpg', alt: 'IT Services 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
            <!-- Library -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-book text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2">Library</h3>
                <p class="text-gray-600 text-center">Extensive collection of engineering books, journals, and digital resources. Study spaces and online access to research databases.</p>
                <button @click="openModal({
                        title: 'Library',
                        desc: 'The KINPOE Library offers a quiet environment for study and research, with thousands of print and digital resources. Students can access e-journals, engineering standards, and online learning platforms. Group study rooms and digital catalog search are also available.',
                        images: [
                            {img: 'static/media/library1.jpg', alt: 'Library 1'},
                            {img: 'static/media/library2.jpg', alt: 'Library 2'},
                            {img: 'static/media/library3.jpg', alt: 'Library 3'},
                            {img: 'static/media/library4.jpg', alt: 'Library 4'}
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
                <h3 class="text-2xl font-bold text-kinpoe-blue mb-2" x-text="modalItem?.title"></h3>
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
            <!-- Renewable Energy Projects -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-flask text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2">Renewable Energy Projects</h3>
                <p class="text-gray-600 text-center">Research on solar, wind, and hybrid energy systems for sustainable power solutions.</p>
                <button @click="openModal({
                        title: 'Renewable Energy Projects',
                        desc: 'Our R&D team is engaged in developing efficient solar panels, wind turbines, and hybrid energy systems. Projects focus on grid integration, storage solutions, and environmental impact assessment for a greener future.',
                        images: [
                            {img: 'static/media/renewable1.jpg', alt: 'Renewable Energy 1'},
                            {img: 'static/media/renewable2.jpg', alt: 'Renewable Energy 2'},
                            {img: 'static/media/renewable3.jpg', alt: 'Renewable Energy 3'},
                            {img: 'static/media/renewable4.jpg', alt: 'Renewable Energy 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
            <!-- Smart Grid Initiatives -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-network-wired text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2">Smart Grid Initiatives</h3>
                <p class="text-gray-600 text-center">Development of intelligent grid management, automation, and cybersecurity for modern power networks.</p>
                <button @click="openModal({
                        title: 'Smart Grid Initiatives',
                        desc: 'Smart grid research at KINPOE includes automation, real-time monitoring, and cybersecurity. Our labs simulate grid operations and test new algorithms for load balancing, outage management, and renewable integration.',
                        images: [
                            {img: 'static/media/smartgrid1.jpg', alt: 'Smart Grid 1'},
                            {img: 'static/media/smartgrid2.jpg', alt: 'Smart Grid 2'},
                            {img: 'static/media/smartgrid3.jpg', alt: 'Smart Grid 3'},
                            {img: 'static/media/smartgrid4.jpg', alt: 'Smart Grid 4'}
                        ]
                    })"
                    class="mt-3 text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none">
                    Read More
                </button>
            </div>
            <!-- Industry Collaboration -->
            <div class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-center">
                <i class="fas fa-lightbulb text-kinpoe-gold text-3xl mb-3"></i>
                <h3 class="text-lg font-semibold text-kinpoe-blue mb-2">Industry Collaboration</h3>
                <p class="text-gray-600 text-center">Joint research with leading power companies and government agencies for real-world impact.</p>
                <button @click="openModal({
                        title: 'Industry Collaboration',
                        desc: 'We partner with industry leaders and government agencies to solve real-world energy challenges. Collaborative projects include grid modernization, safety protocols, and workforce training for the power sector.',
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
                <h3 class="text-2xl font-bold text-kinpoe-blue mb-2" x-text="modalItem?.title"></h3>
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