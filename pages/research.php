<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-r from-kinpoe-blue to-kinpoe-light-blue text-white">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6">Researches & Innovation</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Pioneering Innovation in Power & Energy – A Legacy of Excellence with PIEAS
            </p>
        </div>
    </div>
</section>

<section class="relative py-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
            <?php
            $research_items = [
                [
                    'title' => 'Smart Grid Technology',
                    'desc' => 'Development of intelligent power distribution and management systems for modern energy networks.',
                    'detail' => 'Our research focuses on automation, real-time monitoring, and cybersecurity for smart grids. We collaborate with industry to test new algorithms for load balancing, outage management, and renewable integration.',
                    'img' => 'static/media/Electrical Lab/research_1.jpg'
                ],
                [
                    'title' => 'Renewable Energy Integration',
                    'desc' => 'Advanced research in solar, wind, and hybrid energy systems for sustainable power solutions.',
                    'detail' => 'Projects include grid integration, storage solutions, and environmental impact assessment. Our labs are equipped for hands-on experimentation and simulation.',
                    'img' => 'static/media/SKDL/research_2.jpg'
                ],
                [
                    'title' => 'Nuclear Safety & Instrumentation',
                    'desc' => 'Innovative approaches to nuclear reactor safety, measurement, and control systems.',
                    'detail' => 'We develop and test radiation detectors, nuclear simulators, and control system trainers. Our work supports safe and efficient reactor operations.',
                    'img' => 'static/media/NI Lab/research_3.jpg'
                ],
                [
                    'title' => 'Power System Protection',
                    'desc' => 'Research on electrical power system safety, reliability, and protection relays.',
                    'detail' => 'Students and faculty work on transformer protection, relay coordination, and grid fault analysis using industry-grade equipment.',
                    'img' => 'static/media/Electrical Lab/research_4.jpg'
                ],
                [
                    'title' => 'Energy Efficiency & Management',
                    'desc' => 'Projects focused on reducing energy consumption and optimizing industrial processes.',
                    'detail' => 'We analyze building energy use, develop smart metering solutions, and promote sustainable practices in industry and academia.',
                    'img' => 'static/media/Electronic Lab/research_5.jpg'
                ],
                [
                    'title' => 'Robotics & Automation',
                    'desc' => 'Design and implementation of robotic systems for industrial and research applications.',
                    'detail' => 'Our robotics group works on automation, sensor integration, and AI-driven control for manufacturing and energy sectors.',
                    'img' => 'static/media/DEAR Lab/research_6.jpg'
                ],
                [
                    'title' => 'Environmental Monitoring',
                    'desc' => 'Research on air, water, and soil quality monitoring for power plants and urban areas.',
                    'detail' => 'We use advanced sensors and data analytics to assess environmental impact and support regulatory compliance.',
                    'img' => 'static/media/CML/research_7.jpg'
                ],
                [
                    'title' => 'High Voltage Engineering',
                    'desc' => 'Study of insulation, breakdown phenomena, and high voltage testing techniques.',
                    'detail' => 'Our labs are equipped for impulse testing, insulation diagnostics, and research on new dielectric materials.',
                    'img' => 'static/media/Electrical Lab/research_8.jpg'
                ],
                [
                    'title' => 'Industrial Collaboration',
                    'desc' => 'Joint research with leading power companies and government agencies for real-world impact.',
                    'detail' => 'Collaborative projects include grid modernization, safety protocols, and workforce training for the power sector.',
                    'img' => 'static/media/SKDL/research_9.jpg'
                ],
                [
                    'title' => 'Data Analytics in Power Systems',
                    'desc' => 'Application of big data and AI for predictive maintenance and grid optimization.',
                    'detail' => 'We develop machine learning models for fault detection, load forecasting, and asset management in power networks.',
                    'img' => 'static/media/Electronic Lab/research_10.jpg'
                ]
            ];
            foreach ($research_items as $item):
            ?>
                <div x-data="{ open: false }" class="bg-gray-100 rounded-lg p-6 shadow flex flex-col items-start">
                    <img src="<?= $item['img'] ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="rounded mb-4 w-full h-40 object-cover">
                    <h3 class="text-xl font-bold text-kinpoe-blue mb-2"><?= htmlspecialchars($item['title']) ?></h3>
                    <p class="text-gray-700 mb-2"><?= htmlspecialchars($item['desc']) ?></p>
                    <button @click="open = !open" class="text-kinpoe-blue hover:text-kinpoe-gold font-semibold focus:outline-none mb-2">
                        <span x-show="!open">Read More</span><span x-show="open">Collapse</span>
                    </button>
                    <div x-show="open" x-transition class="w-full">
                        <p class="text-gray-600 text-sm"><?= htmlspecialchars($item['detail']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>