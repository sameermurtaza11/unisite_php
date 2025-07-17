<?php
// Program data
$programs = [
    [
        'key' => 'ms',
        'title' => 'MS in Nuclear Power Engineering',
        'type' => 'graduate',
        'deadline' => '2026-03-31',
        'duration' => '2 Years',
        'eligibility' => "Bachelor's in Engineering/Science",
        'degree' => 'MS-NPE from PIEAS',
        'desc' => 'Two-year PIEAS-accredited MS program offered at KINPOE, covering design, construction, and operation of nuclear power plants. Includes a 7-week zero semester and five 14-week semesters. Fellowship provided.',
        'brochure' => 'static/media/sample1.pdf',
    ],
    [
        'key' => 'pdtp',
        'title' => 'Post Diploma Training Program',
        'type' => 'training',
        'deadline' => '2026-03-31',
        'duration' => '1 Year',
        'eligibility' => 'DAE or B.Sc. (Science)',
        'degree' => 'PDTP Certificate',
        'desc' => 'One-year technical training for DAE holders and science graduates in nuclear plant operations. Includes classroom, labs, and site visits. Fellowship and hostel provided. Conducted at KINPOE & CHASCENT.',
        'brochure' => 'static/media/sample2.pdf',
    ],
    [
        'key' => 'pgtp',
        'title' => 'Post Graduate Training Program',
        'type' => 'training',
        'deadline' => '2020-03-31',
        'duration' => '1 Year',
        'eligibility' => "Bachelor's in Engineering",
        'degree' => 'Post-Graduate Certificate',
        'desc' => 'Joint KINPOE & CHASCENT program for engineers. Includes 6-week orientation, 2 semesters of academic training, followed by plant visits and on-job training. Prepares for nuclear facility operations.',
        'brochure' => 'static/media/sample3.pdf',
    ],
    [
        'key' => 'csr',
        'title' => 'CSR Technical Training Program',
        'type' => 'professional',
        'deadline' => '2026-03-31',
        'duration' => '2 Months',
        'eligibility' => 'Matriculation',
        'degree' => 'CSR Skill Certificate',
        'desc' => 'Empowering the people residing around KNPGS Site through vocational training in employable areas. The course content is as per national qualifications provided by NAVTTC, and will provide quality training.',
        'brochure' => 'static/media/sample4.pdf',
    ],
];

// Get filter from query string
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

// Helper for active button
function activeBtn($btn, $filter) {
    return $btn === $filter ? 'bg-kinpoe-blue text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300';
}
?>

<!-- Programs Page Hero Section -->
<section class="relative py-20 bg-gradient-to-r from-kinpoe-blue to-kinpoe-light-blue text-white">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6">Academic Programs</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Comprehensive engineering programs designed to prepare you for the future of power engineering
            </p>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="py-8 bg-white border-b">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center gap-4">
            <a href="index.php?content_file=pages/programs.php&filter=all"
                class="px-6 py-2 rounded-lg font-semibold transition-all duration-300 <?= activeBtn('all', $filter) ?>">All Programs</a>
            <a href="index.php?content_file=pages/programs.php&filter=graduate"
                class="px-6 py-2 rounded-lg font-semibold transition-all duration-300 <?= activeBtn('graduate', $filter) ?>">Graduate Programs</a>
            <a href="index.php?content_file=pages/programs.php&filter=professional"
                class="px-6 py-2 rounded-lg font-semibold transition-all duration-300 <?= activeBtn('professional', $filter) ?>">Professional Development</a>
            <a href="index.php?content_file=pages/programs.php&filter=training"
                class="px-6 py-2 rounded-lg font-semibold transition-all duration-300 <?= activeBtn('training', $filter) ?>">Training Programs</a>
        </div>
    </div>
</section>

<!-- Programs Grid -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php
            $today = date('Y-m-d');
            foreach ($programs as $program):
                if ($filter === 'all' || $filter === $program['type']):
                    $deadline_passed = $today > $program['deadline'];
            ?>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="h-48 bg-gradient-to-br
                    <?php
                        if ($program['key'] === 'ms') echo 'from-kinpoe-blue to-kinpoe-light-blue';
                        elseif ($program['key'] === 'pdtp') echo 'from-kinpoe-light-blue to-kinpoe-gold';
                        elseif ($program['key'] === 'pgtp') echo 'from-kinpoe-gold to-orange-500';
                        else echo 'from-green-600 to-green-800';
                    ?>
                    flex items-center justify-center">
                    <i class="fas
                        <?php
                            if ($program['key'] === 'ms') echo 'fa-graduation-cap';
                            elseif ($program['key'] === 'pdtp') echo 'fa-tools';
                            elseif ($program['key'] === 'pgtp') echo 'fa-certificate';
                            else echo 'fa-leaf';
                        ?>
                        text-white text-6xl"></i>
                </div>
                <div class="p-8">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-bold text-kinpoe-blue"><?= $program['title'] ?></h3>
                        <span class="bg-kinpoe-blue text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Application Deadline: <?= $program['deadline'] ?>
                        </span>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed"><?= $program['desc'] ?></p>
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-clock text-kinpoe-gold"></i>
                            <span class="text-gray-700"><strong>Duration:</strong> <?= $program['duration'] ?></span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-user-graduate text-kinpoe-gold"></i>
                            <span class="text-gray-700"><strong>Eligibility:</strong> <?= $program['eligibility'] ?></span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-certificate text-kinpoe-gold"></i>
                            <span class="text-gray-700"><strong>
                                <?= $program['key'] === 'ms' ? 'Degree' : 'Certificate' ?>:</strong> <?= $program['degree'] ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <?php if (!$deadline_passed): ?>
                        <a href="index.php?content_file=pages/application-form.php"
                            class="flex-1 bg-kinpoe-blue hover:bg-kinpoe-dark-blue text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 text-center">
                            Apply Now
                        </a>
                        <?php else: ?>
                        <span class="flex-1 bg-gray-300 text-gray-500 font-bold py-3 px-6 rounded-lg text-center opacity-50 cursor-not-allowed pointer-events-none">
                            Admission Closed
                        </span>
                        <?php endif; ?>
                        <a href="<?= $program['brochure'] ?>" download
                            class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3 px-6 rounded-lg transition-all duration-300 text-center">
                            Download Brochure
                        </a>
                    </div>
                </div>
            </div>
            <?php
                endif;
            endforeach;
            ?>
        </div>
    </div>
</section>

<!-- Admission Process -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-kinpoe-blue mb-4">Admission Process</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Follow these simple steps to apply for your desired program</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-kinpoe-blue rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">1</span>
                </div>
                <h3 class="text-xl font-bold text-kinpoe-blue mb-3">Choose Program</h3>
                <p class="text-gray-600">Select the program that best fits your career goals and educational background.</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-kinpoe-light-blue rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">2</span>
                </div>
                <h3 class="text-xl font-bold text-kinpoe-blue mb-3">Submit Application</h3>
                <p class="text-gray-600">Complete the online application form with all required documents and information.</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-kinpoe-gold rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">3</span>
                </div>
                <h3 class="text-xl font-bold text-kinpoe-blue mb-3">Assessment</h3>
                <p class="text-gray-600">Participate in the entrance test or interview as required for your chosen program.</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">4</span>
                </div>
                <h3 class="text-xl font-bold text-kinpoe-blue mb-3">Enrollment</h3>
                <p class="text-gray-600">Complete the enrollment process and begin your journey at KINPOE.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-kinpoe-blue text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-4">Ready to Apply?</h2>
        <p class="text-xl mb-8 text-blue-100">Take the first step towards your engineering career at KINPOE</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="index.php?content_file=pages/application-form.php"
                class="bg-kinpoe-gold hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105">
                Start Application
            </a>
            <a href="index.php?content_file=pages/contact.php"
                class="bg-transparent border-2 border-white hover:bg-white hover:text-kinpoe-blue text-white font-bold py-3 px-8 rounded-lg transition-all duration-300">
                Get More Info
            </a>
        </div>
    </div>
</section>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-kinpoe-gold rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">3</span>
                </div>
                <h3 class="text-xl font-bold text-kinpoe-blue mb-3">Assessment</h3>
                <p class="text-gray-600">Participate in the entrance test or interview as required for your chosen program.</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">4</span>
                </div>
                <h3 class="text-xl font-bold text-kinpoe-blue mb-3">Enrollment</h3>
                <p class="text-gray-600">Complete the enrollment process and begin your journey at KINPOE.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-kinpoe-blue text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-4">Ready to Apply?</h2>
        <p class="text-xl mb-8 text-blue-100">Take the first step towards your engineering career at KINPOE</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="index.php?content_file=pages/application-form.php"
                class="bg-kinpoe-gold hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105">
                Start Application
            </a>
            <a href="index.php?content_file=pages/contact.php"
                class="bg-transparent border-2 border-white hover:bg-white hover:text-kinpoe-blue text-white font-bold py-3 px-8 rounded-lg transition-all duration-300">
                Get More Info
            </a>
        </div>
    </div>
</section>
