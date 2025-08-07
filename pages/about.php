<!--
  about.php
  Main About page for KINPOE website.
  Contains: Hero, Institute Overview, Vision/Mission, Director Message, Faculty Grid, Modal, Campus Info, Affiliations, Call to Action.
  Author: KINPOE Web Team
-->
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-r from-kinpoe-blue to-kinpoe-light-blue text-white">
    <!-- Hero Section: Institute branding and intro -->
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6">About KINPOE</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">Empowering the Future of Energy Through Excellence in Engineering Education</p>
        </div>
    </div>
</section>

<!-- Institute Overview -->
<section class="py-16 bg-white">
    <!-- Institute Overview: History, Timeline, Stats -->
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-kinpoe-blue mb-6 text-center">Our Institution</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-top">
            <div>
                <!-- Timeline Section -->
                <div class="">
                    <div class="flex flex-col gap-6">
                        <h1 class="text-2xl font-bold text-kinpoe-blue mb-6 text-center">Our Legacy in Progress</h1>
                        <!-- 1973 -->
                        <div class="flex flex-col items-center w-full">
                            <div class="flex items-center w-full mb-2">
                                <div class="flex-grow border-t border-gray-300"></div>
                                <span class="mx-4 text-lg font-bold text-red-600"> 1973 </span>
                                <div class="flex-grow border-t border-gray-300"></div>
                            </div>
                            <div class="bg-white rounded-lg shadow p-4 w-full">
                                <div class="font-semibold text-kinpoe-blue mb-1">Establishment of Karachi Nuclear Power Training Centre (KNPTC)</div>
                                <ul class="list-disc ml-5 text-gray-600 text-sm">
                                    <li>Post Graduate Training Program (PGTP) for Engineers/Scientists</li>
                                    <li>Post Diploma Training Program (PDTP) for Technicians</li>
                                </ul>
                            </div>
                        </div>
                        <!-- 1993 -->
                        <div class="flex flex-col items-center w-full">
                            <div class="flex items-center w-full mb-2">
                                <div class="flex-grow border-t border-gray-300"></div>
                                <span class="mx-4 text-lg font-bold text-gray-700"> 1993 </span>
                                <div class="flex-grow border-t border-gray-300"></div>
                            </div>
                            <div class="bg-white rounded-lg shadow p-4 w-full">
                                <div class="font-semibold text-kinpoe-blue mb-1">Upgraded to KANUPP Institute of Nuclear Power Engineering (KINPOE)</div>
                                <ul class="list-disc ml-5 text-gray-600 text-sm">
                                    <li>Launched 2-year MS in Nuclear Power Engineering</li>
                                    <li>Initially affiliated with NED University, later PIEAS</li>
                                </ul>
                            </div>
                        </div>
                        <!-- 2019-2020 -->
                        <div class="flex flex-col items-center w-full">
                            <div class="flex items-center w-full mb-2">
                                <div class="flex-grow border-t border-gray-300"></div>
                                <span class="mx-4 text-base font-bold text-green-700"> 2019-20 </span>
                                <div class="flex-grow border-t border-gray-300"></div>
                            </div>
                            <div class="bg-white rounded-lg shadow p-4 w-full">
                                <div class="font-semibold text-kinpoe-blue mb-1">Became constituent college of PIEAS for MS (NPE)</div>
                                <ul class="list-disc ml-5 text-gray-600 text-sm">
                                    <li>Took over O&M of Full-Scope Training Simulator</li>
                                    <li>Assigned training of KNPGS Licensed Operators, Maintenance, and Technical staff</li>
                                </ul>
                            </div>
                        </div>
                        <!-- 2025 -->
                        <div class="flex flex-col items-center w-full">
                            <div class="flex items-center w-full mb-2">
                                <div class="flex-grow border-t border-gray-300"></div>
                                <span class="mx-4 text-lg font-bold text-orange-500"> 2025 </span>
                                <div class="flex-grow border-t border-gray-300"></div>
                            </div>
                            <div class="bg-white rounded-lg shadow p-4 w-full">
                                <div class="font-semibold text-kinpoe-blue mb-1">Recent Milestones</div>
                                <ul class="list-disc ml-5 text-gray-600 text-sm">
                                    <li>Launched first batch of Skill Development and Junior Nuclear Leadership Development Programs</li>
                                    <li>Integrated C-Series Soft Panel (Educational-Cum-Training) Simulator in MS (NPE) curriculum</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <img src="static/media/Photos/Gallery/kinpoe_view.jpg" alt="KINPOE Building" class="rounded-lg shadow-lg w-full">

                <!-- Overlay Box -->
                <div class="absolute h-min inset-0 bg-gradient-to-b from-white to-transparent flex items-top justify-center pt-5 pb-20 px-6 rounded-lg shadow-lg">
                    <p class="text-lg text-justify text-gray-700 leading-relaxed sm:text-base">
                        <!-- <strong class="block text-2xl text-kinpoe-blue font-bold mb-4">Our Institution</strong> -->
                        Karachi Institute of Power Engineering (KINPOE) has a rich legacy of developing qualified professionals in nuclear power technology. Affiliated with PIEAS for MS (Nuclear Power Engineering), KINPOE was previously affiliated with NED University. The institute has evolved from its origins as KNPTC, consistently advancing nuclear education and training in Pakistan.
                    </p>
                </div>
                <!-- Stats -->
                <div class="grid grid-cols-2 gap-6 mt-14">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-kinpoe-blue">2000+</div>
                        <div class="text-gray-600">Graduates</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-kinpoe-blue">100+</div>
                        <div class="text-gray-600">Faculty Members</div>
                    </div>
                </div>
            </div>
            <!-- <div>
                <img src="static/media/Photos/Gallery/kinpoe_view.jpg" alt="KINPOE Building" class="rounded-lg shadow-lg w-full">
            </div> -->
        </div>
    </div>
</section>

<!-- Vision, Mission & Director Message  -->
<section class="py-16 bg-gray-100">
    <!-- Vision, Mission & Director Message Section -->
    <!-- Faculty Section: Grid and Modal -->
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Our Vision -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="w-16 h-16 bg-kinpoe-blue rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-eye text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-kinpoe-blue mb-4">Our Vision</h3>
                <p class="text-gray-600 leading-relaxed">
                    To be recognized as a global leader in nuclear education and research for a sustainable, safe and empowered future.
                </p>
            </div>
            <!-- Our Mission -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="w-16 h-16 bg-kinpoe-gold rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-bullseye text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-kinpoe-blue mb-4">Our Mission</h3>
                <p class="text-gray-600 leading-relaxed">
                    Committed to advancing knowledge in nuclear engineering and technology, upholding the highest safety standards awareness, driving societal progress through innovative research, education and collaborative solutions, for a sustainable, safe and empowered future by preparing future leaders for national nuclear industry.
                </p>
            </div>
        </div>
        <!-- Director Message -->
        <div class="flex justify-center items-center w-full mt-10">
            <div class="bg-white rounded-xl shadow-lg p-8 flex flex-col md:flex-row items-center w-full mx-auto">
                <div class="flex-shrink-0 flex items-center justify-center mb-6 md:mb-0 md:mr-8">
                    <img src="static/media/Photos/dir_msg.jpg" alt="Director"
                        class="w-32 h-32 rounded-full shadow-lg object-cover">
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-kinpoe-blue mb-4 text-center md:text-left">Director Message
                    </h3>
                    <p class="text-gray-600 leading-relaxed text-justify">
                        The history of this institute is as longstanding as the eminence of nuclear technology in
                        Pakistan. In its early days, established as Karachi Nuclear Power Training Centre (KNPTC),
                        it served towards the training needs of newly inducted engineers, scientists, and
                        technicians of KANUPP. KNPTC trained engineers, scientists and technicians led the early and
                        later operational and maintenance working teams of KANUPP. In 1993, KNPTC was upgraded as
                        KANUPP Institute of Power Engineering (KINPOE) to conduct MS degree program in Nuclear Power
                        Engineering in affiliation with NED University of Engineering & Technology, Karachi.
                        However, from 2008 onwards, KINPOE was affiliated with PIEAS until lately in 2019, it became
                        the constituent college of PIEAS. <br> I am sure that the educational experience you have
                        received here will empower you to
                        overcome challenges in your future endeavors and to better serve the programs of PAEC and
                        national interest. We have made our best efforts to provide you with best of education and
                        inculcated in you the spirit of national building. You achievements will be a source of
                        pride for us like other alumni of this institute. I also must remind you by saying that for
                        long lasting success, you just not only need passion, you need to have strategy and action.
                        May Almighty ALLAH be with you to fulfill this.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('partials/faculty-section.php'); ?>

<!-- Campus Info -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-kinpoe-blue mb-4">Campus Information</h2>
            <p class="text-xl text-gray-600">Explore our modern facilities and state-of-the-art infrastructure</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <img src="static/media/Photos/Gallery/kinpoe_view.jpg" alt="Campus Aerial View" class="rounded-lg shadow-lg w-full">
            </div>
            <div>
                <h3 class="text-3xl font-bold text-kinpoe-blue mb-6">Modern Campus Facilities</h3>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-kinpoe-blue rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-flask text-white"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-kinpoe-blue mb-2">Advanced Laboratories</h4>
                            <p class="text-gray-600">
                                State-of-the-art power systems, electronics, and renewable energy laboratories equipped with modern instruments.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-kinpoe-light-blue rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-book text-white"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-kinpoe-blue mb-2">Digital Library</h4>
                            <p class="text-gray-600">
                                Comprehensive collection of engineering books, journals, and digital resources for research and study.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-kinpoe-gold rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-chalkboard-teacher text-white"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-kinpoe-blue mb-2">Smart Classrooms</h4>
                            <p class="text-gray-600">
                                Technology-enabled classrooms with multimedia facilities for enhanced learning experience.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-wifi text-white"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-kinpoe-blue mb-2">Campus-wide WiFi</h4>
                            <p class="text-gray-600">
                                High-speed internet connectivity throughout the campus for seamless access to online resources.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Affiliations -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-kinpoe-blue mb-4">Affiliations & Partnerships</h2>
            <p class="text-xl text-gray-600">
                Our strategic partnerships and affiliations strengthen our academic programs
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-gradient-to-r from-kinpoe-blue to-kinpoe-light-blue rounded-xl p-8 text-white">
                <div class="flex items-center space-x-4 mb-4">
                    <div class="w-16 h-16 bg-white rounded-lg flex items-center justify-center">
                        <i class="fas fa-university text-kinpoe-blue text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold">PIEAS Affiliation</h3>
                        <p class="text-blue-100">Pakistan Institute of Engineering and Applied Sciences</p>
                    </div>
                </div>
                <p class="text-blue-100 leading-relaxed">
                    KINPOE is proudly affiliated with PIEAS, one of Pakistan's premier engineering institutions,
                    ensuring our programs meet the highest academic standards.
                </p>
            </div>

            <div class="bg-gradient-to-r from-kinpoe-gold to-yellow-600 rounded-xl p-8 text-white">
                <div class="flex items-center space-x-4 mb-4">
                    <div class="w-16 h-16 bg-white rounded-lg flex items-center justify-center">
                        <i class="fas fa-handshake text-kinpoe-gold text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold">Industry Partners</h3>
                        <p class="text-yellow-100">Leading Power Companies</p>
                    </div>
                </div>
                <p class="text-yellow-100 leading-relaxed">
                    Strong partnerships with major power utilities and energy companies provide our students with
                    practical exposure and career opportunities.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-kinpoe-blue text-white">
    <!-- Call to Action Section -->
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-4">Join Our Community</h2>
        <p class="text-xl mb-8 text-blue-100">
            Become part of KINPOE's legacy of excellence in power engineering education
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="index.php?content_file=pages/programs.php"
                class="bg-kinpoe-gold hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105">
                Explore Programs
            </a>
            <a href="index.php?content_file=pages/contact.php"
                class="bg-transparent border-2 border-white hover:bg-white hover:text-kinpoe-blue text-white font-bold py-3 px-8 rounded-lg transition-all duration-300">
                Contact Us
            </a>
        </div>
    </div>
</section>