<?php
// application-status.php
// Student Application Status Checker

// Load DB credentials from config.php (outside web root in production)
$config = require __DIR__ . '/../config.php';
$conn = @new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
$error = '';
$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cnic = preg_replace('/[^0-9]/', '', $_POST['cnic'] ?? ''); // Remove non-numeric
    $name = trim($_POST['applicant_name'] ?? '');
    $name = preg_replace('/[^a-zA-Z\s\-\.]/', '', $name); // Basic sanitization: allow letters, spaces, dash, dot

    if ($cnic === '' && $name === '') {
        $error = 'Please enter CNIC or Name to search your application status.';
    } elseif ($cnic !== '') {
        if (strlen($cnic) !== 13) {
            $error = 'Please enter a valid 13-digit CNIC.';
        } else {
            $stmt = $conn->prepare('SELECT cnic, full_name, program_name, status, status_description FROM application_status WHERE cnic = ?');
            $stmt->bind_param('s', $cnic);
            $stmt->execute();
            $res = $stmt->get_result();
            if ($row = $res->fetch_assoc()) {
                $result = $row;
            } else {
                $result = [
                    'cnic' => $cnic,
                    'full_name' => 'Unknown',
                    'program_name' => 'Unknown',
                    'status' => 'Not Received',
                    'status_description' => 'No application found for this CNIC. Please re-check the CNIC Number or contact support.',
                ];
            }
            $stmt->close();
        }
    } elseif ($name !== '') {
        // Search by name (case-insensitive, partial match)
        $likeName = "%" . $name . "%";
        $stmt = $conn->prepare('SELECT cnic, full_name, program_name, status, status_description FROM application_status WHERE full_name LIKE ? LIMIT 1');
        $stmt->bind_param('s', $likeName);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc()) {
            $result = $row;
        } else {
            $result = [
                'cnic' => 'Unknown',
                'full_name' => $name,
                'program_name' => 'Unknown',
                'status' => 'Not Received',
                'status_description' => 'No application found against this name. Please check the spelling or contact support.',
            ];
        }
        $stmt->close();
    }
}

function statusBadge($status)
{
    $map = [
        'Selected' => 'bg-green-500',
        'Rejected' => 'bg-red-500',
        'Waiting' => 'bg-yellow-400',
        'Objection' => 'bg-orange-500',
    ];
    return $map[$status] ?? 'bg-gray-400';
}
?>

<!-- <style>
    *{
        outline: 1px solid green;
    }
</style> -->

<section class="relative py-20 bg-gradient-to-r from-kinpoe-blue to-kinpoe-light-blue text-white">
    <!-- Hero Section: Institute branding and intro -->
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6">Check Your Application Status</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">Track your admission application in real time.</p>
        </div>
    </div>
</section>

<section class="bg-white flex flex-col items-center justify-start pt-10 md:pt-20 pb-20">

    <div class="max-w-md w-full mx-auto bg-gradient-to-br from-white via-gray-50 to-gray-200 rounded-2xl border border-gray-200 shadow-2xl hover:shadow-[0_8px_32px_0_rgba(31,38,135,0.37)] transition-shadow duration-300 p-8 scale-105">

        <form method="post" class="space-y-4 relative" id="statusForm" autocomplete="off">
            <h2 class="text-2xl font-bold text-kinpoe-blue mb-4 text-center">Check Application Status</h2>
            <div class="flex flex-col gap-4 relative">
                <div class="flex-1 relative">
                    <label for="cnicInput" class="block mb-2 text-kinpoe-blue font-semibold text-base">CNIC</label>
                    <input type="text" name="cnic" id="cnicInput" maxlength="13" pattern="[0-9]{13}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue text-lg transition-shadow shadow-sm focus:shadow-lg"
                        placeholder="Enter CNIC (13 digits)"
                        value="<?php echo htmlspecialchars($_POST['cnic'] ?? ''); ?>"
                        onfocus="showCnicTip()" onblur="hideCnicTip()" onmouseenter="showCnicTip()" onmouseleave="hideCnicTip()">
                    <div id="cnicTip" class="absolute right-full top-1/2 -translate-y-1/2 mr-4 bg-white border border-kinpoe-blue shadow-xl rounded-lg px-4 py-3 text-base text-gray-700 w-80 hidden z-50 after:content-[''] after:absolute after:top-1/2 after:left-full after:-translate-y-1/2 after:border-8 after:border-transparent after:border-l-kinpoe-blue after:shadow after:z-30">
                        <span class="font-semibold text-kinpoe-blue block mb-1"><i class="fas fa-info-circle mr-1"></i>CNIC Instructions</span>
                        Enter your 13-digit CNIC number to view your current application status, selection, or any objections.<br>For queries, contact the admissions office.
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <span class="text-gray-400 font-bold text-lg">OR</span>
                </div>
                <div class="flex-1 relative">
                    <label for="applicantNameInput" class="block mb-2 text-kinpoe-blue font-semibold text-base">Applicant Name <span class="text-gray-400 font-normal">(optional)</span></label>
                    <input type="text" name="applicant_name" id="applicantNameInput"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue text-lg transition-shadow shadow-sm focus:shadow-lg"
                        placeholder="Enter your name"
                        value="<?php echo htmlspecialchars($_POST['applicant_name'] ?? ''); ?>"
                        onfocus="showNameTip()" onblur="hideNameTip()" onmouseenter="showNameTip()" onmouseleave="hideNameTip()">
                    <div id="nameTip" class="absolute right-full top-1/2 -translate-y-1/2 mr-4 bg-white border border-kinpoe-blue shadow-xl rounded-lg px-4 py-3 text-base text-gray-700 w-80 hidden z-50 after:content-[''] after:absolute after:top-1/2 after:left-full after:-translate-y-1/2 after:border-8 after:border-transparent after:border-l-kinpoe-blue after:shadow after:z-30">
                        <span class="font-semibold text-kinpoe-blue block mb-1"><i class="fas fa-info-circle mr-1"></i>Name Instructions</span>
                        Enter your full name as used in your application form. For best results, type your complete name. If you do not find your record, try searching by CNIC or check the spelling.
                    </div>
                </div>
            </div>
            <button type="submit"
                class="w-full bg-kinpoe-blue hover:bg-kinpoe-gold text-white font-bold py-2 px-4 rounded-lg transition-all duration-300 text-lg">Check Status</button>
            <?php if ($error): ?>
                <div class="text-red-600 text-center font-semibold mt-2"> <?= htmlspecialchars($error) ?> </div>
            <?php endif; ?>
        </form>

        <?php if ($result): ?>
            <div class="mt-8 bg-white rounded-lg shadow p-6">
                <div class="mb-2"><span class="font-semibold text-kinpoe-blue">CNIC:</span> <?= htmlspecialchars($result['cnic']) ?></div>
                <div class="mb-2"><span class="font-semibold text-kinpoe-blue">Full Name:</span> <?= htmlspecialchars($result['full_name']) ?></div>
                <div class="mb-2"><span class="font-semibold text-kinpoe-blue">Program Name:</span> <?= htmlspecialchars($result['program_name']) ?></div>
                <div class="mb-2 flex items-center gap-2">
                    <span class="font-semibold text-kinpoe-blue">Application Status:</span>
                    <button type="button" id="statusBtn" class="px-3 py-1 rounded text-white font-bold focus:outline-none <?= statusBadge($result['status']) ?>">
                        <?= htmlspecialchars($result['status']) ?>
                    </button>
                </div>
            </div>
            <!-- Modal (always rendered if result exists) -->
            <div id="statusModalOverlay" class="fixed inset-0 bg-black bg-opacity-40 z-50 hidden"></div>
            <div id="statusModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
                <div class="bg-white rounded-lg shadow-2xl max-w-lg w-full p-8 relative flex flex-col items-center">
                    <button id="statusModalClose" class="absolute top-4 right-4 text-gray-400 hover:text-kinpoe-blue text-2xl font-bold focus:outline-none">&times;</button>
                    <h3 class="text-xl font-bold text-kinpoe-blue mb-4">Instructions</h3>
                    <p class="text-gray-700 text-center"> <?= nl2br(htmlspecialchars($result['status_description'])) ?> </p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<script>
    function showCnicTip() {
        document.getElementById('cnicTip').classList.remove('hidden');
    }

    function hideCnicTip() {
        document.getElementById('cnicTip').classList.add('hidden');
    }

    function showNameTip() {
        document.getElementById('nameTip').classList.remove('hidden');
    }

    function hideNameTip() {
        document.getElementById('nameTip').classList.add('hidden');
    }
    // Trim spaces/dashes from CNIC
    const cnicInput = document.getElementById('cnicInput');
    cnicInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13);
    });
    // Allow Enter key
    cnicInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            document.getElementById('statusForm').submit();
        }
    });
    // Modal logic
    const statusBtn = document.getElementById('statusBtn');
    const statusModal = document.getElementById('statusModal');
    const statusModalOverlay = document.getElementById('statusModalOverlay');
    const statusModalClose = document.getElementById('statusModalClose');
    if (statusBtn) {
        statusBtn.addEventListener('click', function() {
            statusModal.classList.remove('hidden');
            statusModalOverlay.classList.remove('hidden');
            statusModal.focus();
        });
    }
    if (statusModalClose) {
        statusModalClose.addEventListener('click', function() {
            statusModal.classList.add('hidden');
            statusModalOverlay.classList.add('hidden');
        });
    }
    if (statusModalOverlay) {
        statusModalOverlay.addEventListener('click', function() {
            statusModal.classList.add('hidden');
            statusModalOverlay.classList.add('hidden');
        });
    }
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            statusModal.classList.add('hidden');
            statusModalOverlay.classList.add('hidden');
        }
    });
</script>