<?php
require_once __DIR__ . '/../includes/auth.php';

// Check if user is logged in
$auth = new UserAuth();
if (!$auth->isLoggedIn()) {
    header('Location: index.php?content_file=partials/login.php');
    exit();
}

// Handle program selection POST request
if ($_POST && isset($_POST['program_key']) && isset($_POST['csrf_token'])) {
    if (Security::verifyCSRFToken($_POST['csrf_token'])) {
        // Store selected program in session
        $_SESSION['selected_program'] = $_POST['program_key'];

        // Redirect to the application form
        echo '<script>window.location.href = "index.php?content_file=partials/form_pdtp.php";</script>';
        echo '<div class="text-center mt-8"><p>Redirecting to application form...</p></div>';
        return;
    }
}

// Get current user data
$currentUser = $auth->getCurrentUser();

// Include program data
include __DIR__ . '/../data/programs_data.php';

// Filter available programs based on dates
$today = date('Y-m-d');
$availablePrograms = [];

foreach ($programs as $program) {
    $deadline_passed = $today > $program['deadline'];
    $application_available = $today >= $program['available_from'];
    $can_apply = $application_available && !$deadline_passed;

    if ($can_apply) {
        $availablePrograms[] = $program;
    }
}
?>

<!-- Page Header -->
<div class="bg-gradient-to-r from-kinpoe-blue to-kinpoe-dark-blue py-16">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-graduation-cap text-5xl text-kinpoe-gold mr-4"></i>
                <div>
                    <h1 class="text-4xl font-bold text-white mb-2">Program Selection</h1>
                    <p class="text-xl text-blue-200">Choose Your Academic Journey</p>
                </div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 max-w-md mx-auto mt-6">
                <p class="text-white text-lg">Welcome back, <strong><?= htmlspecialchars($currentUser['full_name']) ?></strong></p>
                <p class="text-blue-200 text-sm">Select a program to begin your application</p>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container mx-auto px-4 py-12">

    <!-- User Info Card -->
    <div class="max-w-4xl mx-auto mb-8">
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="bg-kinpoe-blue text-white rounded-full w-12 h-12 flex items-center justify-center">
                        <i class="fas fa-user text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-kinpoe-blue"><?= htmlspecialchars($currentUser['full_name']) ?></h3>
                        <p class="text-gray-600"><?= htmlspecialchars($currentUser['email']) ?></p>
                        <p class="text-sm text-gray-500">CNIC: <?= htmlspecialchars($currentUser['cnic']) ?></p>
                    </div>
                </div>
                <div class="text-right">
                    <a href="includes/logout.php" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-all duration-300">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php if (empty($availablePrograms)): ?>
        <!-- No Programs Available -->
        <div class="max-w-2xl mx-auto text-center">
            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-8">
                <i class="fas fa-exclamation-triangle text-4xl text-yellow-500 mb-4"></i>
                <h3 class="text-xl font-semibold text-yellow-800 mb-2">No Programs Currently Available</h3>
                <p class="text-yellow-700">
                    Unfortunately, there are no programs accepting applications at this time.
                    Please check back later or contact the admissions office for more information.
                </p>
                <div class="mt-6">
                    <a href="index.php?content_file=pages/contact.php"
                        class="bg-kinpoe-blue hover:bg-kinpoe-dark-blue text-white px-6 py-3 rounded-lg transition-all duration-300 inline-flex items-center">
                        <i class="fas fa-phone mr-2"></i>Contact Admissions
                    </a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <!-- Available Programs -->
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-kinpoe-blue mb-2">Available Programs</h2>
                <p class="text-gray-600">Select a program below to start your application process</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($availablePrograms as $program): ?>
                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <!-- Program Header -->
                        <div class="bg-gradient-to-r from-kinpoe-blue to-kinpoe-light-blue text-white p-6">
                            <h3 class="text-lg font-bold mb-2"><?= htmlspecialchars($program['title']) ?></h3>
                            <div class="flex items-center justify-between">
                                <span class="bg-white/20 px-3 py-1 rounded-full text-sm font-medium">
                                    <?= ucfirst(htmlspecialchars($program['type'])) ?>
                                </span>
                                <span class="bg-kinpoe-gold px-3 py-1 rounded-full text-sm font-bold text-white">
                                    <?= htmlspecialchars($program['duration']) ?>
                                </span>
                            </div>
                        </div>

                        <!-- Program Details -->
                        <div class="p-6">
                            <div class="space-y-3 mb-6">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-certificate text-kinpoe-gold mr-2 w-4"></i>
                                    <span><?= htmlspecialchars($program['degree']) ?></span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-user-graduate text-kinpoe-gold mr-2 w-4"></i>
                                    <span><?= htmlspecialchars($program['eligibility']) ?></span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-calendar-times text-red-500 mr-2 w-4"></i>
                                    <span>Deadline: <?= date('M d, Y', strtotime($program['deadline'])) ?></span>
                                </div>
                            </div>

                            <p class="text-gray-700 text-sm mb-6 line-clamp-3">
                                <?= htmlspecialchars($program['desc']) ?>
                            </p>

                            <!-- Action Buttons -->
                            <div class="space-y-3">
                                <?php if ($program['key'] === 'ms'): ?>
                                    <a href="https://admissions.pieas.edu.pk/Admissions/MS.html" target="_blank"
                                        class="w-full bg-kinpoe-blue hover:bg-kinpoe-dark-blue text-white font-bold py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-105 text-center block">
                                        <i class="fas fa-file-alt mr-2"></i>Apply Now
                                    </a>
                                <?php else: ?>
                                    <form method="POST" class="w-full">
                                        <input type="hidden" name="program_key" value="<?= htmlspecialchars($program['key']) ?>">
                                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(Security::generateCSRFToken()) ?>">
                                        <button type="submit"
                                            class="w-full bg-kinpoe-blue hover:bg-kinpoe-dark-blue text-white font-bold py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-105">
                                            <i class="fas fa-file-alt mr-2"></i>Apply Now
                                        </button>
                                    </form>
                                <?php endif; ?>

                                <?php if (!empty($program['brochure'])): ?>
                                    <a href="<?= htmlspecialchars($program['brochure']) ?>" target="_blank"
                                        class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2 px-4 rounded-lg transition-all duration-300 text-center block">
                                        <i class="fas fa-download mr-2"></i>Download Brochure
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Help Section -->
    <div class="max-w-4xl mx-auto mt-12">
        <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
            <div class="flex items-start space-x-4">
                <div class="bg-kinpoe-blue text-white rounded-full w-10 h-10 flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-info"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-kinpoe-blue mb-2">Need Help?</h3>
                    <p class="text-gray-700 mb-4">
                        If you have questions about any program or need assistance with your application,
                        our admissions team is here to help.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="index.php?content_file=pages/contact.php"
                            class="bg-kinpoe-blue hover:bg-kinpoe-dark-blue text-white px-4 py-2 rounded-lg transition-all duration-300 inline-flex items-center">
                            <i class="fas fa-phone mr-2"></i>Contact Us
                        </a>
                        <a href="index.php?content_file=pages/programs.php"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-all duration-300 inline-flex items-center">
                            <i class="fas fa-list mr-2"></i>View All Programs
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>