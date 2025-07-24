<?php
// application-status.php
// Student Application Status Checker

// DB connection (kinpoe_db)
$conn = @new mysqli('localhost', 'root', '', 'kinpoe_db');
$error = '';
$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cnic = preg_replace('/[^0-9]/', '', $_POST['cnic'] ?? ''); // Remove non-numeric
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
            // Fallback result for not found
            $result = [
                'cnic' => $cnic,
                'full_name' => 'Unknown',
                'program_name' => 'Unknown',
                'status' => 'Not Received',
                'status_description' => 'Your application has not been received yet. Please contact support if you believe this is a mistake.',
            ];
        }
        $stmt->close();
    }
}

function statusBadge($status) {
    $map = [
        'Selected' => 'bg-green-500',
        'Rejected' => 'bg-red-500',
        'Waiting' => 'bg-yellow-400',
        'Objection' => 'bg-orange-500',
    ];
    return $map[$status] ?? 'bg-gray-400';
}
?>

<section class="py-16 bg-white min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-auto bg-gray-50 rounded-xl shadow-lg p-8">
        <h2 class="text-3xl font-bold text-kinpoe-blue mb-6 text-center">Check Application Status</h2>
        <form method="post" class="space-y-4" id="statusForm">
            <input type="text" name="cnic" id="cnicInput" maxlength="13" pattern="[0-9]{13}" required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue text-lg" placeholder="Enter CNIC (13 digits)">
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
                <h3 class="text-xl font-bold text-kinpoe-blue mb-4">Status Description</h3>
                <p class="text-gray-700 text-center"> <?= nl2br(htmlspecialchars($result['status_description'])) ?> </p>
            </div>
        </div>
    <?php endif; ?>
    </div>
</section>
<script>
// Trim spaces/dashes from CNIC
const cnicInput = document.getElementById('cnicInput');
cnicInput.addEventListener('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '').slice(0,13);
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
