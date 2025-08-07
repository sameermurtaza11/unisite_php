<?php
// Check if form is submitted
if ($_POST && isset($_POST['program_key']) && isset($_POST['available_from']) && isset($_POST['deadline'])) {
    $selected_program = $_POST['program_key'];
    $new_available_from = $_POST['available_from'];
    $new_deadline = $_POST['deadline'];
    
    // Read the current programs data file
    $programs_file = __DIR__ . '/../data/programs_data.php';
    $content = file_get_contents($programs_file);
    
    if ($content !== false) {
        // Find the specific program block and update it
        $pattern = '/(\[\s*\r?\n\s*\'key\'\s*=>\s*\'' . preg_quote($selected_program, '/') . '\',.*?\'available_from\'\s*=>\s*\')[^\']*(\',.*?\'deadline\'\s*=>\s*\')[^\']*(\',)/s';
        
        $replacement = '${1}' . $new_available_from . '${2}' . $new_deadline . '${3}';
        $updated_content = preg_replace($pattern, $replacement, $content);
        
        if ($updated_content && $updated_content !== $content) {
            file_put_contents($programs_file, $updated_content);
            $success_message = "Program updated successfully!";
        } else {
            $error_message = "Failed to update program. Please check the program key.";
        }
    } else {
        $error_message = "Could not read programs file.";
    }
}

// Read current program data for display
include __DIR__ . '/../data/programs_data.php';
?>

<!-- Page Header -->
<div class="bg-gradient-to-r from-kinpoe-blue to-kinpoe-dark-blue py-12">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-cogs text-5xl text-kinpoe-gold mr-4"></i>
                <div>
                    <h1 class="text-4xl font-bold text-white mb-2">Admin Panel</h1>
                    <p class="text-xl text-blue-200">Program Management System</p>
                </div>
            </div>
            <p class="text-lg text-blue-100 max-w-2xl mx-auto">
                Manage academic programs, update availability dates, and monitor application deadlines for all KINPOE programs.
            </p>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container mx-auto px-4 py-12">

    <!-- Success/Error Messages -->
    <?php if (isset($success_message)): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-8 shadow-md">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2 text-lg"></i>
                <span class="font-semibold"><?= htmlspecialchars($success_message) ?></span>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($error_message)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-8 shadow-md">
            <div class="flex items-center">
                <i class="fas fa-exclamation-triangle mr-2 text-lg"></i>
                <span class="font-semibold"><?= htmlspecialchars($error_message) ?></span>
            </div>
        </div>
    <?php endif; ?>

    <!-- Admin Dashboard Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Left Column: Update Form -->
        <div class="space-y-6">
            <!-- Main Form -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="bg-kinpoe-light-blue text-white px-6 py-4">
                    <h2 class="text-xl font-bold flex items-center">
                        <i class="fas fa-edit mr-3"></i>
                        Update Program Dates
                    </h2>
                    <p class="text-blue-100 text-sm mt-1">Modify availability and deadline dates for academic programs</p>
                </div>

                <form method="POST" class="p-6">
                    <!-- Program Selection -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-kinpoe-blue mb-4 flex items-center">
                            <i class="fas fa-graduation-cap mr-2 text-kinpoe-gold"></i>
                            Select Program
                        </h3>
                        <div class="space-y-3">
                            <?php foreach ($programs as $program): ?>
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-kinpoe-light-blue hover:bg-blue-50 cursor-pointer transition-all duration-300 group">
                                    <input type="radio" name="program_key" value="<?= htmlspecialchars($program['key']) ?>" 
                                           class="mr-4 w-5 h-5 text-kinpoe-blue focus:ring-kinpoe-light-blue" required>
                                    <div class="flex-1">
                                        <div class="font-semibold text-kinpoe-blue mb-2"><?= htmlspecialchars($program['title']) ?></div>
                                        <div class="text-sm text-gray-600 space-y-1">
                                            <div class="flex flex-wrap gap-2">
                                                <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-medium">
                                                    <i class="fas fa-calendar-plus mr-1"></i>Available: <?= htmlspecialchars($program['available_from']) ?>
                                                </span>
                                                <span class="inline-block bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-medium">
                                                    <i class="fas fa-calendar-times mr-1"></i>Deadline: <?= htmlspecialchars($program['deadline']) ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Date Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Available From -->
                        <div>
                            <label class="block text-sm font-semibold text-kinpoe-blue mb-3">
                                <i class="fas fa-calendar-plus mr-2 text-kinpoe-gold"></i>
                                Available From
                            </label>
                            <input type="date" name="available_from" required
                                   class="w-full text-gray-700 px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-kinpoe-blue focus:ring-2 focus:ring-kinpoe-light-blue focus:outline-none transition-all duration-300">
                            <p class="text-xs text-gray-600 mt-2">When applications will open for this program</p>
                        </div>

                        <!-- Deadline -->
                        <div>
                            <label class="block text-sm font-semibold text-kinpoe-blue mb-3">
                                <i class="fas fa-calendar-times mr-2 text-kinpoe-gold"></i>
                                Application Deadline
                            </label>
                            <input type="date" name="deadline" required
                                   class="w-full text-gray-700 px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-kinpoe-blue focus:ring-2 focus:ring-kinpoe-light-blue focus:outline-none transition-all duration-300">
                            <p class="text-xs text-gray-600 mt-2">Last date for application submission</p>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <button type="submit" 
                                class="bg-kinpoe-blue hover:bg-kinpoe-dark-blue text-white font-bold py-4 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <i class="fas fa-save mr-2"></i>
                            Update Program Dates
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Column: Programs Status -->
        <div class="space-y-6">
            <!-- Current Programs Status -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="bg-kinpoe-gold text-white px-6 py-4">
                    <h3 class="text-xl font-bold flex items-center">
                        <i class="fas fa-list mr-3"></i>
                        Current Programs Status
                    </h3>
                    <p class="text-yellow-100 text-sm mt-1">Live status of all academic programs</p>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <?php 
                        $today = date('Y-m-d');
                        foreach ($programs as $program): 
                            $deadline_passed = $today > $program['deadline'];
                            $application_available = $today >= $program['available_from'];
                            $can_apply = $application_available && !$deadline_passed;
                            
                            if ($can_apply) {
                                $status = 'Open for Applications';
                                $status_class = 'bg-green-100 text-green-800 border-green-200';
                                $icon = 'fa-check-circle text-green-600';
                                $card_border = 'border-green-200';
                            } elseif (!$application_available) {
                                $status = 'Applications Not Started';
                                $status_class = 'bg-yellow-100 text-yellow-800 border-yellow-200';
                                $icon = 'fa-clock text-yellow-600';
                                $card_border = 'border-yellow-200';
                            } else {
                                $status = 'Applications Closed';
                                $status_class = 'bg-red-100 text-red-800 border-red-200';
                                $icon = 'fa-times-circle text-red-600';
                                $card_border = 'border-red-200';
                            }
                        ?>
                            <div class="border-2 <?= $card_border ?> rounded-lg p-4 hover:shadow-md transition-all duration-300">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="font-semibold text-kinpoe-blue"><?= htmlspecialchars($program['title']) ?></h4>
                                    <span class="<?= $status_class ?> px-3 py-1 rounded-full text-xs font-bold border">
                                        <i class="fas <?= $icon ?> mr-1"></i><?= $status ?>
                                    </span>
                                </div>
                                <div class="text-sm text-gray-600 space-y-2">
                                    <div class="flex justify-between">
                                        <span class="font-medium">Available From:</span>
                                        <span><?= htmlspecialchars($program['available_from']) ?></span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium">Deadline:</span>
                                        <span><?= htmlspecialchars($program['deadline']) ?></span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium">Type:</span>
                                        <span class="capitalize"><?= htmlspecialchars($program['type']) ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="bg-kinpoe-dark-blue text-white px-6 py-4">
                    <h3 class="text-xl font-bold flex items-center">
                        <i class="fas fa-chart-bar mr-3"></i>
                        Quick Statistics
                    </h3>
                </div>
                <div class="p-6">
                    <?php
                    $today = date('Y-m-d');
                    $total_programs = count($programs);
                    $open_programs = 0;
                    $closed_programs = 0;
                    $upcoming_programs = 0;
                    
                    foreach ($programs as $program) {
                        $deadline_passed = $today > $program['deadline'];
                        $application_available = $today >= $program['available_from'];
                        $can_apply = $application_available && !$deadline_passed;
                        
                        if ($can_apply) {
                            $open_programs++;
                        } elseif (!$application_available) {
                            $upcoming_programs++;
                        } else {
                            $closed_programs++;
                        }
                    }
                    ?>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center p-4 bg-blue-50 rounded-lg">
                            <div class="text-2xl font-bold text-kinpoe-blue"><?= $total_programs ?></div>
                            <div class="text-sm text-gray-600">Total Programs</div>
                        </div>
                        <div class="text-center p-4 bg-green-50 rounded-lg">
                            <div class="text-2xl font-bold text-green-600"><?= $open_programs ?></div>
                            <div class="text-sm text-gray-600">Currently Open</div>
                        </div>
                        <div class="text-center p-4 bg-yellow-50 rounded-lg">
                            <div class="text-2xl font-bold text-yellow-600"><?= $upcoming_programs ?></div>
                            <div class="text-sm text-gray-600">Upcoming</div>
                        </div>
                        <div class="text-center p-4 bg-red-50 rounded-lg">
                            <div class="text-2xl font-bold text-red-600"><?= $closed_programs ?></div>
                            <div class="text-sm text-gray-600">Closed</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Auto-fill form when program is selected
    document.querySelectorAll('input[name="program_key"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                const programData = <?= json_encode($programs) ?>;
                const selectedProgram = programData.find(p => p.key === this.value);
                
                if (selectedProgram) {
                    document.querySelector('input[name="available_from"]').value = selectedProgram.available_from;
                    document.querySelector('input[name="deadline"]').value = selectedProgram.deadline;
                }
            }
        });
    });

    // Smooth scroll to top if there are messages
    <?php if (isset($success_message) || isset($error_message)): ?>
        window.scrollTo({ top: 0, behavior: 'smooth' });
    <?php endif; ?>

    // Add form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const availableFrom = new Date(document.querySelector('input[name="available_from"]').value);
        const deadline = new Date(document.querySelector('input[name="deadline"]').value);
        
        if (availableFrom >= deadline) {
            e.preventDefault();
            alert('Error: Available from date must be before the deadline date.');
            return false;
        }
    });
</script>
