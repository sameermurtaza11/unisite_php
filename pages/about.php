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
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-kinpoe-blue mb-6">Our Institution</h2>
                <p class="text-lg text-gray-600 mb-4 leading-relaxed">
                    Karachi Institute of Power Engineering (KINPOE) has a rich legacy of developing qualified professionals in nuclear power technology. Affiliated with PIEAS for MS (Nuclear Power Engineering), KINPOE was previously affiliated with NED University. The institute has evolved from its origins as KNPTC, consistently advancing nuclear education and training in Pakistan.
                </p>
                <!-- Timeline Section -->
                <div class="mt-6">
                    <div class="flex flex-col gap-6">
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
                        <!-- 2023 -->
                        <div class="flex flex-col items-center w-full">
                            <div class="flex items-center w-full mb-2">
                                <div class="flex-grow border-t border-gray-300"></div>
                                <span class="mx-4 text-lg font-bold text-orange-500"> 2023 </span>
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
                <!-- End Timeline Section -->
                <div class="grid grid-cols-2 gap-6 mt-8">
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
            <div>
                <img src="static/media/kinpoe_building.jpg" alt="KINPOE Building" class="rounded-lg shadow-lg w-full">
            </div>
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
                    <img src="static/media/profile_icon.png" alt="Director"
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

<!-- Faculty Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-kinpoe-blue mb-4">Our Faculty</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Meet our distinguished faculty members who bring years of experience and expertise to our programs
            </p>
        </div>

        <!-- Faculty Preview Grid -->

        <!-- Row 1: Director -->
        <div class="relative grid grid-cols-1 gap-8 mb-8 justify-items-center" id="faculty-row1">
            <!-- Row 1: Director Card -->
            <div class="bg-white rounded-lg border border-slate-100 shadow-[0_0_15px_rgba(0,0,0,0.15)] hover:shadow-[0_0_25px_rgba(0,0,0,0.25)] transition-all duration-300 flex flex-col md:flex-row items-center px-8 py-16 hover:-translate-y-1">
                <img src="static/media/profile_icon.png" alt="Syed Perwaiz Asdaque" class="w-32 h-32 rounded-full shadow-lg object-cover mb-4 md:mb-0 md:mr-8">
                <div class="flex flex-col items-center">
                    <h3 class="text-2xl font-bold text-kinpoe-blue mb-2">Syed Perwaiz Asdaque</h3>
                    <p class="text-kinpoe-gold font-semibold mb-2">Director</p>
                    <p class="text-gray-600 text-sm mb-2">Not Avalible for Now.</p>
                    <div class="flex flex-wrap gap-2 text-xs mb-2">
                        <span class="bg-gray-200 text-kinpoe-blue px-2 py-1 rounded">Not Avalible for Now.</span>
                    </div>
                    <button class="faculty-readmore mt-2 text-kinpoe-blue hover:text-kinpoe-gold text-xs underline" data-faculty='{"photo":"static/media/profile_icon.png","name":"Syed Perwaiz Asdaque","title":"Director","contact":"info@kinpoe.edu.pk","education":"Not Avalible for Now.","research":"Not Avalible for Now.","publications":"Not Avalible for Now."}'>Read More</button>
                </div>
            </div>
        </div>
        <!-- Row 2: 3 Faculty -->
        <div class="relative grid grid-cols-1 md:grid-cols-3 gap-8 mb-8 z-10" id="faculty-row2">
            <!-- Row 2: Registrar, ORIC Manager, ISS Manager -->
            <div class="bg-white rounded-lg border border-slate-100 shadow-[0_0_15px_rgba(0,0,0,0.15)] hover:shadow-[0_0_25px_rgba(0,0,0,0.25)] transition-all duration-300 flex flex-col items-center p-6 hover:-translate-y-1">
                <img src="static/media/ZAS.png" alt="Zafer Ahmed Siddiqui" class="w-24 h-24 rounded-full shadow mb-3">
                <h3 class="text-lg font-bold text-kinpoe-blue mb-1">Zafer Ahmed Siddiqui</h3>
                <p class="text-kinpoe-gold font-semibold mb-1">Registrar (KINPOE-C)</p>
                <p class="text-gray-600 text-sm mb-2">MS (ELECTRICAL ENGINEERING)</p>
                <div class="flex flex-wrap gap-1 text-xs mb-2">
                    <span class="bg-gray-200 text-kinpoe-blue px-2 py-0.5 rounded">Not Avalible for Now.</span>
                </div>
                <button class="faculty-readmore mt-2 text-kinpoe-blue hover:text-kinpoe-gold text-xs underline" data-faculty='{"photo":"static/media/ZAS.png","name":"Zafer Ahmed Siddiqui","title":"Registrar (KINPOE-C)","contact":"zafer.ahmed@kinpoe.edu.pk","education":"MS (ELECTRICAL ENGINEERING)","research":"Not Avalible for Now.","publications":"Not Avalible for Now."}'>Read More</button>
            </div>
            <div class="bg-white rounded-lg border border-slate-100 shadow-[0_0_15px_rgba(0,0,0,0.15)] hover:shadow-[0_0_25px_rgba(0,0,0,0.25)] transition-all duration-300 flex flex-col items-center p-6 hover:-translate-y-1">
                <img src="static/media/DRA.png" alt="Dr. Rizwan Ahmed" class="w-24 h-24 rounded-full shadow mb-3">
                <h3 class="text-lg font-bold text-kinpoe-blue mb-1">Dr. Rizwan Ahmed</h3>
                <p class="text-kinpoe-gold font-semibold mb-1">Manager (ORIC)</p>
                <p class="text-gray-600 text-sm mb-2">Not Avalible for Now.</p>
                <div class="flex flex-wrap gap-1 text-xs mb-2">
                    <span class="bg-kinpoe-blue text-white px-2 py-0.5 rounded">Reactor Physics</span>
                    <span class="bg-gray-200 text-kinpoe-blue px-2 py-0.5 rounded">Fuel Management</span>
                </div>
                <button class="faculty-readmore mt-2 text-kinpoe-blue hover:text-kinpoe-gold text-xs underline" data-faculty='{"photo":"static/media/DRA.png","name":"Dr. Rizwan Ahmed","title":"Manager (ORIC)","contact":"info@kinpoe.edu.pk","education":"Not Avalible for Now.","research":"Reactor Physics, Fuel Management.","publications":"Not Avalible for Now."}'>Read More</button>
            </div>
            <div class="bg-white rounded-lg border border-slate-100 shadow-[0_0_15px_rgba(0,0,0,0.15)] hover:shadow-[0_0_25px_rgba(0,0,0,0.25)] transition-all duration-300 flex flex-col items-center p-6 hover:-translate-y-1">
                <img src="static/media/MAAK.png" alt="Muhammad Arif Abdul Karim" class="w-24 h-24 rounded-full shadow mb-3">
                <h3 class="text-lg font-bold text-kinpoe-blue mb-1">Muhammad Arif Abdul Karim</h3>
                <p class="text-kinpoe-gold font-semibold mb-1">Manager (ISS)</p>
                <p class="text-gray-600 text-sm mb-2">B.E (Electronics)</p>
                <div class="flex flex-wrap gap-1 text-xs mb-2">
                    <span class="bg-gray-200 text-kinpoe-blue px-2 py-0.5 rounded">Not Avalible for Now.</span>
                </div>
                <button class="faculty-readmore mt-2 text-kinpoe-blue hover:text-kinpoe-gold text-xs underline" data-faculty='{"photo":"static/media/MAAK.png","name":"Muhammad Arif Abdul Karim","title":"Manager (ISS)","contact":"Karim79121@hotmail.com","education":"B.E (Electronics)","research":"Not Avalible for Now.","publications":"Not Avalible for Now."}'>Read More</button>
            </div>
            <!-- SVG lines to row 3 -->
            <!-- <svg class="absolute left-0 bottom-0 w-full h-10 pointer-events-none z-0 hidden md:block" width="100%" height="40" xmlns="http://www.w3.org/2000/svg">
                <line x1="16.66%" y1="0" x2="10%" y2="40" stroke="#cbd5e1" stroke-width="2" />
                <line x1="50%" y1="0" x2="50%" y2="40" stroke="#cbd5e1" stroke-width="2" />
                <line x1="83.33%" y1="0" x2="90%" y2="40" stroke="#cbd5e1" stroke-width="2" />
            </svg> -->
        </div>
        <!-- Row 3: 5 Compact Faculty -->
        <div class="relative grid grid-cols-2 mb-8 sm:grid-cols-3 md:grid-cols-5 gap-6 z-10" id="faculty-row3">
            <!-- Row 3: IT/CS, QA, Basic Training, Academic, Professor -->
            <div class="bg-white rounded-lg border border-slate-100 shadow-[0_0_15px_rgba(0,0,0,0.15)] hover:shadow-[0_0_25px_rgba(0,0,0,0.25)] transition-all duration-300 flex flex-col items-center p-4 hover:-translate-y-1">
                <img src="static/media/profile_icon.png" alt="Dr. Nadeem Ahsan" class="w-16 h-16 rounded-full shadow mb-2">
                <h3 class="text-base font-bold text-kinpoe-blue">Dr. Nadeem Ahsan</h3>
                <p class="text-xs text-kinpoe-gold">Manager (IT & CS)</p>
                <span class="text-xs text-gray-500">Software Engineering, Machine Learning, Mining Software Repositories</span>
                <button class="faculty-readmore mt-2 text-kinpoe-blue hover:text-kinpoe-gold text-xs underline" data-faculty='{"photo":"static/media/profile_icon.png","name":"Dr. Nadeem Ahsan","title":"Manager (IT & CS)","contact":"Not Avalible for Now","education":"PhD - Institute for Software Technology, TUG, Graz, Austria.","research":"Software Engineering, Machine Learning, Mining Software Repositories","publications":"1. Automatic software bug triage system (bts) based on latent semantic indexing and support vector machine. (Link: https://scholar.google.com/citations?view_op=view_citation&hl=en&user=NHHRRIAAAAAJ&citation_for_view=NHHRRIAAAAAJ:9yKSN-GCB0IC)\n2. Structure of fluxed sinter. (Link: https://scholar.google.com/citations?view_op=view_citation&hl=en&user=NHHRRIAAAAAJ&citation_for_view=NHHRRIAAAAAJ:pyW8ca7W8N0C)\n3. Improved routing metrics for energy constrained interconnected devices in low-power and lossy networks. (Link: https://scholar.google.com/citations?view_op=view_citation&hl=en&user=NHHRRIAAAAAJ&citation_for_view=NHHRRIAAAAAJ:CHSYGLWDkRkC)\n4. Data throughput improvement in IS2000 networks via effective F-SCH reduced active set pilot switching. (Link: https://scholar.google.com/citations?view_op=view_citation&hl=en&user=NHHRRIAAAAAJ&citation_for_view=NHHRRIAAAAAJ:qxL8FJ1GzNcC)\n5. System and method for edge of coverage detection in a wireless communication device. (Link: https://scholar.google.com/citations?view_op=view_citation&hl=en&user=NHHRRIAAAAAJ&citation_for_view=NHHRRIAAAAAJ:Zph67rFs4hoC)"}'>Read More</button>
            </div>
            <div class="bg-white rounded-lg border border-slate-100 shadow-[0_0_15px_rgba(0,0,0,0.15)] hover:shadow-[0_0_25px_rgba(0,0,0,0.25)] transition-all duration-300 flex flex-col items-center p-4 hover:-translate-y-1">
                <img src="static/media/DJAB.png" alt="Dr. Jawed Akhtar Bhutto" class="w-16 h-16 rounded-full shadow mb-2">
                <h3 class="text-base font-bold text-kinpoe-blue">Dr. Jawed Akhtar Bhutto</h3>
                <p class="text-xs text-kinpoe-gold">Manager (QA)</p>
                <span class="text-xs text-gray-500">Power Engineering & Control Engineering</span>
                <button class="faculty-readmore mt-2 text-kinpoe-blue hover:text-kinpoe-gold text-xs underline" data-faculty='{"photo":"static/media/DJAB.png","name":"Dr. Jawed Akhtar Bhutto","title":"Manager (QA)","contact":"info@kinpoe.edu.pk","education":"PhD Electrical Engineering - NUST, Islamabad.","research":"Power Engineering & Control Engineering","publications":"1: Trade-off between the H2 and H(infinite) in the Multi-Objective State Feedback Synthesis through LMI characterizations.\n2: Synthesis of Robust Performance of Active Suspension Control of Vehicle with Parametric uncertainty.\n3: Analysis of robust performance of active suspension control of vehicle with polytopic uncertainty.\n4: Robust Performance Control Synthesis of Smart Structural System with Limited Input.\n5: Robust optimal active vibration control of smart structures using convex optimization."}'>Read More</button>
            </div>
            <div class="bg-white rounded-lg border border-slate-100 shadow-[0_0_15px_rgba(0,0,0,0.15)] hover:shadow-[0_0_25px_rgba(0,0,0,0.25)] transition-all duration-300 flex flex-col items-center p-4 hover:-translate-y-1">
                <img src="static/media/profile_icon.png" alt="Atiq ur Rehman" class="w-16 h-16 rounded-full shadow mb-2">
                <h3 class="text-base font-bold text-kinpoe-blue">Atiq ur Rehman</h3>
                <p class="text-xs text-kinpoe-gold">Manager (Basic Training)</p>
                <span class="text-xs text-gray-500">Not Avalible for Now.</span>
                <button class="faculty-readmore mt-2 text-kinpoe-blue hover:text-kinpoe-gold text-xs underline" data-faculty='{"photo":"static/media/profile_icon.png","name":"Atiq ur Rehman","title":"Manager (Basic Training)","contact":"Not Avalible for Now.","education":"Not Avalible for Now.","research":"Not Avalible for Now.","publications":"Not Avalible for Now."}'>Read More</button>
            </div>
            <div class="bg-white rounded-lg border border-slate-100 shadow-[0_0_15px_rgba(0,0,0,0.15)] hover:shadow-[0_0_25px_rgba(0,0,0,0.25)] transition-all duration-300 flex flex-col items-center p-4 hover:-translate-y-1">
                <img src="static/media/DARA.png" alt="Dr. Abdul Rehman Abbasi" class="w-16 h-16 rounded-full shadow mb-2">
                <h3 class="text-base font-bold text-kinpoe-blue">Dr. Abdul Rehman Abbasi</h3>
                <p class="text-xs text-kinpoe-gold">Manager (Academic)</p>
                <span class="text-xs text-gray-500">Automation, Machine Vision Sensors and Actuators, Leadership Development</span>
                <button class="faculty-readmore mt-2 text-kinpoe-blue hover:text-kinpoe-gold text-xs underline" data-faculty='{"photo":"static/media/DARA.png","name":"Dr. Abdul Rehman Abbasi","title":"Manager (Academic)","contact":"areahman.abbasi@kinpoe.edu.pk","education":"PhD (Mechatronics)","research":"Automation, Machine Vision Sensors and Actuators, Leadership Development","publications":"1. Towards development of a low cost early fire detection system using wireless sensor network and machine vision. (Link: https://scholar.google.com/citations?view_op=view_citation&hl=en&user=nCcP5vcAAAAJ&citation_for_view=nCcP5vcAAAAJ:9yKSN-GCB0IC)\n2. Power flow & voltage stability analyses and remedies for a 340 MW nuclear power plant using ETAP. (Link: https://scholar.google.com/citations?view_op=view_citation&hl=en&user=nCcP5vcAAAAJ&citation_for_view=nCcP5vcAAAAJ:roLk4NBRz8UC)\n3. Detecting & interpreting self-manipulating hand movements for student’s affect prediction. (Link: https://scholar.google.com/citations?view_op=view_citation&hl=en&user=nCcP5vcAAAAJ&citation_for_view=nCcP5vcAAAAJ:0EnyYjriUFMC)\n4. Student mental state inference from unintentional body gestures using dynamic Bayesian networks. (Link: https://scholar.google.com/citations?view_op=view_citation&hl=en&user=nCcP5vcAAAAJ&citation_for_view=nCcP5vcAAAAJ:LkGwnXOMwfcC)\n5. Towards knowledge-based affective interaction: situational interpretation of affect. (Link: https://scholar.google.com/citations?view_op=view_citation&hl=en&user=nCcP5vcAAAAJ&citation_for_view=nCcP5vcAAAAJ:UeHWp8X0CEIC)"}'>Read More</button>
            </div>
            <div class="bg-white rounded-lg border border-slate-100 shadow-[0_0_15px_rgba(0,0,0,0.15)] hover:shadow-[0_0_25px_rgba(0,0,0,0.25)] transition-all duration-300 flex flex-col items-center p-4 hover:-translate-y-1">
                <img src="static/media/Profile_icon.png" alt="Dr. Zahra Ali" class="w-16 h-16 rounded-full shadow mb-2">
                <h3 class="text-base font-bold text-kinpoe-blue">Dr. Zahra Ali</h3>
                <p class="text-xs text-kinpoe-gold">Professor</p>
                <span class="text-xs text-gray-500">Plasma Physics, Reactor Core Modeling, Fusion Research</span>
                <button class="faculty-readmore mt-2 text-kinpoe-blue hover:text-kinpoe-gold text-xs underline" data-faculty='{"photo":"static/media/Profile_icon.png","name":"Dr. Zahra Ali","title":"Professor","contact":"zahra.ali@paec.gov.pk","education":"PhD Plasma Physics - UTM, Malaysia.","research":"Plasma Physics, Reactor Core Modeling, Fusion Research","publications":"1. Radiation Self Absorption Effect in Ar Gas Nx2 Mather Type Plasma Focus.\n2. Numerical Experiments for Radial Dynamics and Opacity Effect in Argon Plasma Focus."}'>Read More</button>
            </div>
        </div>
        <!-- Row 4: 5 Compact Faculty -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-8">
            <!-- Row 4: Cyber Security, C&PC, Professor, IT, Laboratories, PDTP -->
            <div class="bg-white rounded-lg border border-slate-100 shadow-[0_0_15px_rgba(0,0,0,0.15)] hover:shadow-[0_0_25px_rgba(0,0,0,0.25)] transition-all duration-300 flex flex-col items-center p-4 hover:-translate-y-1">
                <img src="static/media/profile_icon.png" alt="Dr. Salman Ahmed" class="w-16 h-16 rounded-full shadow mb-2">
                <h3 class="text-base font-bold text-kinpoe-blue">Dr. Salman Ahmed Khan</h3>
                <p class="text-xs text-kinpoe-gold">Section Head (Cyber Security)</p>
                <span class="text-xs text-gray-500">Nano Science, Nanotechnology</span>
                <button class="faculty-readmore mt-2 text-kinpoe-blue hover:text-kinpoe-gold text-xs underline" data-faculty='{"photo":"static/media/profile_icon.png","name":"Dr. Salman Ahmed Khan","title":"Section Head (Cyber Security)","contact":"info@kinpoe.edu.pk","education":"PhD","research":"Nano Science, Nanotechnology","publications":"1. A Facile, Cost Effective, Patterned ZnO Microwires Synthesis for Large-Scale Fabrication of Piezoelectric-Generator."}'>Read More</button>
            </div>
            <div class="bg-white rounded-lg border border-slate-100 shadow-[0_0_15px_rgba(0,0,0,0.15)] hover:shadow-[0_0_25px_rgba(0,0,0,0.25)] transition-all duration-300 flex flex-col items-center p-4 hover:-translate-y-1">
                <img src="static/media/DKK.png" alt="Dr. Khurram Kafeel" class="w-16 h-16 rounded-full shadow mb-2">
                <h3 class="text-base font-bold text-kinpoe-blue">Dr. Khurram Kafeel</h3>
                <p class="text-xs text-kinpoe-gold">Section Head (C&PC)</p>
                <span class="text-xs text-gray-500">CFD in Nuclear Safety</span>
                <span class="text-xs text-gray-500">BEPU in Accident Analysis</span>
                <button class="faculty-readmore mt-2 text-kinpoe-blue hover:text-kinpoe-gold text-xs underline" data-faculty='{"photo":"static/media/DKK.png","name":"Dr. Khurram Kafeel","title":"Section Head (C&PC)","contact":"kafeel@kinpoe.edu.pk","education":"Ph.D. in Nuclear Safety","research":"CFD, BEPU","publications":"Nuclear Safety Journal, 2023"}'>Read More</button>
            </div>
            <div class="bg-white rounded-lg border border-slate-100 shadow-[0_0_15px_rgba(0,0,0,0.15)] hover:shadow-[0_0_25px_rgba(0,0,0,0.25)] transition-all duration-300 flex flex-col items-center p-4 hover:-translate-y-1">
                <img src="static/media/DAA.png" alt="Dr. Adeel Abbas" class="w-16 h-16 rounded-full shadow mb-2">
                <h3 class="text-base font-bold text-kinpoe-blue">Dr. Adeel Abbas</h3>
                <p class="text-xs text-kinpoe-gold">Professor</p>
                <span class="text-xs text-gray-500">Microgrids - Demand Side Management</span>
                <span class="text-xs text-gray-500">Renewable Integration</span>
                <button class="faculty-readmore mt-2 text-kinpoe-blue hover:text-kinpoe-gold text-xs underline" data-faculty-id="adeel-abbas">Read More</button>
            </div>
            <!-- Dr. Naveen Masood Card -->
            <div class="bg-white rounded-lg border border-slate-100 shadow-[0_0_15px_rgba(0,0,0,0.15)] hover:shadow-[0_0_25px_rgba(0,0,0,0.25)] transition-all duration-300 flex flex-col items-center p-4 hover:-translate-y-1">
                <img src="static/media/profile_icon.png" alt="Dr. Naveen Masood" class="w-16 h-16 rounded-full shadow mb-2">
                <h3 class="text-base font-bold text-kinpoe-blue">Dr. Naveen Masood</h3>
                <p class="text-xs text-kinpoe-gold">Section Head (IT)</p>
                <span class="text-xs text-gray-500">Brain Computer Interfacing, Machine Learning, EEG Signal Processing</span>
                <button class="faculty-readmore mt-2 text-kinpoe-blue hover:text-kinpoe-gold text-xs underline" data-faculty-id="naveen-masood">Read More</button>
            </div>
            <!-- Dr. Naila Zareen Card -->
            <div class="bg-white rounded-lg border border-slate-100 shadow-[0_0_15px_rgba(0,0,0,0.15)] hover:shadow-[0_0_25px_rgba(0,0,0,0.25)] transition-all duration-300 flex flex-col items-center p-4 hover:-translate-y-1">
                <img src="static/media/Profile_icon.png" alt="Dr. Naila Zareen" class="w-16 h-16 rounded-full shadow mb-2">
                <h3 class="text-base font-bold text-kinpoe-blue">Dr. Naila Zareen</h3>
                <p class="text-xs text-kinpoe-gold">Section Head (Laboratories)</p>
                <span class="text-xs text-gray-500">Grid Automation & AI Integration</span>
                <span class="text-xs text-gray-500">Machine Vision for NSS</span>
                <button class="faculty-readmore mt-2 text-kinpoe-blue hover:text-kinpoe-gold text-xs underline" data-faculty-id="naila-zareen">Read More</button>
            </div>
            <!-- Mazhar Ali Card -->
            <div class="bg-white rounded-lg border border-slate-100 shadow-[0_0_15px_rgba(0,0,0,0.15)] hover:shadow-[0_0_25px_rgba(0,0,0,0.25)] transition-all duration-300 flex flex-col items-center p-4 hover:-translate-y-1">
                <img src="static/media/profile_icon.png" alt="Mazhar Ali" class="w-16 h-16 rounded-full shadow mb-2">
                <h3 class="text-base font-bold text-kinpoe-blue">Mazhar Ali</h3>
                <p class="text-xs text-kinpoe-gold">Section Head (PDTP)</p>
                <span class="text-xs text-gray-500">Not Avalible for Now.</span>
                <button class="faculty-readmore mt-2 text-kinpoe-blue hover:text-kinpoe-gold text-xs underline" data-faculty-id="mazhar-ali">Read More</button>
            </div>
        </div>
        <!-- Faculty Modal -->
        <div id="facultyModalOverlay" class="fixed inset-0 bg-black bg-opacity-40 z-50 hidden"></div>
        <!-- Faculty Modal: Shows detailed info for selected faculty -->
        <div id="facultyModal" class="fixed inset-0 flex items-center justify-center z-50 hidden focus:outline-none">
            <div class="bg-white rounded-lg shadow-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto p-8 relative flex flex-col items-center space-y-4" tabindex="-1">
                <button id="facultyModalClose" class="absolute top-4 right-4 text-gray-400 hover:text-kinpoe-blue text-2xl font-bold focus:outline-none">&times;</button>
                <img id="facultyModalPhoto" src="" alt="Faculty Photo" class="w-32 h-32 rounded-full shadow mb-4 object-cover">
                <h2 id="facultyModalName" class="text-2xl font-bold text-kinpoe-blue mb-1"></h2>
                <p id="facultyModalTitle" class="text-kinpoe-gold font-semibold mb-2"></p>
                <div class="mb-2 text-gray-500 text-sm"><span class="font-semibold">Email: </span><span id="facultyModalContact"></span></div>
                <div class="mb-2 w-full"><span class="font-semibold text-kinpoe-blue">Education: </span><span id="facultyModalEducation"></span></div>
                <div class="mb-2 w-full"><span class="font-semibold text-kinpoe-blue">Research Area: </span><span id="facultyModalResearchArea"></span></div>
                <div class="mb-2 w-full"><span class="font-semibold text-kinpoe-blue">Publications: </span>
                  <ul id="facultyModalPublications" class="list-disc ml-6 text-gray-700"></ul>
                </div>
            </div>
        </div>
</section>
<script src="modules/facultyModal.js"></script>
    <!-- Faculty modal logic in facultyModal.js -->
    <!-- Campus Info Section: Facilities, Infrastructure -->
    <!-- Affiliations & Partnerships Section -->
</div>
</section>

<!-- Campus Info -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-kinpoe-blue mb-4">Campus Information</h2>
            <p class="text-xl text-gray-600">Explore our modern facilities and state-of-the-art infrastructure</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <img src="static/media/kinpoe_building.jpg" alt="Campus Aerial View" class="rounded-lg shadow-lg w-full">
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