<?php
// Feedback form handler
$feedbackMsg = '';
try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['qec_feedback'])) {
        // DB connection
        $conn = @new mysqli('localhost', 'root', '', 'unisite_pdp_dp');
        if ($conn->connect_error) {
            $feedbackMsg = '<span class="text-red-600">Database connection failed. Please ensure the database <b>unisite_pdp_dp</b> exists.</span>';
        } else {
            // Sanitize inputs
            $name = trim($conn->real_escape_string($_POST['name'] ?? ''));
            $mobile = trim($conn->real_escape_string($_POST['mobile'] ?? ''));
            $email = trim($conn->real_escape_string($_POST['email'] ?? ''));
            $subject = trim($conn->real_escape_string($_POST['subject'] ?? ''));
            $message = trim($conn->real_escape_string($_POST['message'] ?? ''));
            // Validate required fields
            if (!$name || !$email || !$subject || !$message) {
                $feedbackMsg = '<span class="text-red-600">Please fill all required fields.</span>';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $feedbackMsg = '<span class="text-red-600">Invalid email address.</span>';
            } else {
                $sql = "INSERT INTO feedbacks (name, mobile, email, subject, message) VALUES ('$name', '$mobile', '$email', '$subject', '$message')";
                if ($conn->query($sql)) {
                    $feedbackMsg = '<span class="text-green-600">Thank you for your feedback!</span>';
                    $_POST = []; // Reset form fields after success
                } else {
                    $feedbackMsg = '<span class="text-red-600">Failed to submit feedback. Please try again.</span>';
                }
            }
            $conn->close();
        }
    }
} catch (Throwable $e) {
    $feedbackMsg = '<span class="text-red-600">Fatal error: ' . htmlspecialchars($e->getMessage()) . '</span>';
}
?>

<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-r from-kinpoe-blue to-kinpoe-light-blue text-white">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6">Quality Enhancement Cell (QEC)</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                The QEC at KINPOE is committed to maintaining academic excellence and continuous improvement in all educational programs and institutional processes.
            </p>
        </div>
    </div>
</section>

<!-- Feedback Submission Section (now above links) -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-xl mx-auto bg-gray-50 rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-kinpoe-blue mb-6 text-center">Submit Feedback to QEC</h2>
            <?php if ($feedbackMsg): ?>
                <div class="mb-4 text-center text-sm font-semibold"><?= $feedbackMsg ?></div>
            <?php endif; ?>
            <form method="POST" class="space-y-6" autocomplete="off">
                <input type="hidden" name="qec_feedback" value="1">
                <div>
                    <label for="qec_name" class="block text-sm font-semibold text-kinpoe-blue mb-1">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" id="qec_name" name="name" required
                        class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-kinpoe-blue focus:outline-none transition"
                        value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                </div>
                <div>
                    <label for="qec_mobile" class="block text-sm font-semibold text-kinpoe-blue mb-1">Mobile Number</label>
                    <input type="tel" id="qec_mobile" name="mobile"
                        class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-kinpoe-blue focus:outline-none transition"
                        pattern="^\+?\d{0,15}$" placeholder="+92-300-1234567"
                        value="<?= htmlspecialchars($_POST['mobile'] ?? '') ?>">
                </div>
                <div>
                    <label for="qec_email" class="block text-sm font-semibold text-kinpoe-blue mb-1">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" id="qec_email" name="email" required
                        class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-kinpoe-blue focus:outline-none transition"
                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                </div>
                <div>
                    <label for="qec_subject" class="block text-sm font-semibold text-kinpoe-blue mb-1">Feedback Subject <span class="text-red-500">*</span></label>
                    <input type="text" id="qec_subject" name="subject" required
                        class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-kinpoe-blue focus:outline-none transition"
                        value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>">
                </div>
                <div>
                    <label for="qec_message" class="block text-sm font-semibold text-kinpoe-blue mb-1">Feedback Message <span class="text-red-500">*</span></label>
                    <textarea id="qec_message" name="message" required rows="5"
                        class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-kinpoe-blue focus:outline-none transition resize-y"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                </div>
                <button type="submit"
                    class="w-full bg-kinpoe-blue text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 hover:bg-kinpoe-dark-blue flex items-center justify-center">
                    Submit Feedback
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Useful Links Section (moved below feedback) -->
<section class="py-10 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-kinpoe-blue mb-6">Useful Links & Downloads</h2>
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
            <li><a href="static/media/PDFs/sample1.pdf" class="text-blue-700 hover:underline" download>Sample Paper 1 (MS Program)</a></li>
            <li><a href="static/media/PDFs/pdtp_program_samplepaper.pdf" class="text-blue-700 hover:underline" download>Sample Paper (PDTP Program)</a></li>
            <li><a href="static/media/PDFs/sample3.pdf" class="text-blue-700 hover:underline" download>Sample Paper 3 (PGTP Program)</a></li>
            <li><a href="static/media/PDFs/sample4.pdf" class="text-blue-700 hover:underline" download>Sample Paper 4 (CSR Program)</a></li>
            <li><a href="static/media/PDFs/ms_program_brochure.pdf" class="text-blue-700 hover:underline" download>Brochure (MS Program)</a></li>
            <li><a href="static/media/PDFs/pdtp_program_brochure.pdf" class="text-blue-700 hover:underline" download>Brochure (PDTP Program)</a></li>
            <li><a href="static/media/PDFs/pdtp_program_applicationform.pdf" class="text-blue-700 hover:underline" download>Application Form & Admit Card (PDTP Program)</a></li>
            <li><a href="static/media/PDFs/pgtp_program_brochure.pdf" class="text-blue-700 hover:underline" download>Brochure (PGTP Program)</a></li>
            <li><a href="static/media/PDFs/csr_program_brochure.pdf" class="text-blue-700 hover:underline" download>Brochure (CSR Program)</a></li>
            <li><a href="static/media/PDFs/sample9.pdf" class="text-blue-700 hover:underline" download>Prospectus</a></li>
            <li><a href="static/media/PDFs/sample10.pdf" class="text-blue-700 hover:underline" download>Fee Structure</a></li>
        </ul>
    </div>
</section>
<script>
    try {
        // Your main code here (if any)
    } catch (e) {
        msg.textContent = 'Network error. Please try again.';
        msg.className = 'mt-4 text-center text-sm font-semibold text-red-600';
    }
    btn.disabled = false;
    btnText.textContent = 'Submit Feedback';
    loading.classList.add('hidden');
</script>