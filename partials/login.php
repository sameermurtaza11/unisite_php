<?php
// Session is already started in index.php
require_once __DIR__ . '/../includes/auth.php';

$errors = [];
$success_message = '';

// Generate CSRF token early
$csrf_token = Security::generateCSRFToken();

// Handle form submission
if ($_POST) {
    // Verify CSRF token
    if (!isset($_POST['csrf_token']) || !Security::verifyCSRFToken($_POST['csrf_token'])) {
        $errors[] = 'Invalid security token. Please refresh the page and try again.';
    } else {
        $auth = new UserAuth();
        $result = $auth->login($_POST['cnic_email'], $_POST['password']);
        
        if ($result['success']) {
            // Set success flag for JavaScript redirection
            $success_message = 'Login successful! Redirecting to program selection...';
            $redirect_to = 'partials/program_selection.php';
        } else {
            $errors = $result['errors'];
        }
    }
}
?>

<style>
/* Login success animation styles */
@keyframes checkmark {
    0% { transform: scale(0) rotate(45deg); }
    50% { transform: scale(1.3) rotate(45deg); }
    100% { transform: scale(1) rotate(45deg); }
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes progressBar {
    from { width: 0%; }
    to { width: 100%; }
}

.checkmark-container {
    width: 40px;
    height: 40px;
}

.checkmark {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: block;
    stroke-width: 3;
    stroke: #10b981;
    stroke-miterlimit: 10;
    animation: checkmark 0.6s ease-in-out;
}

.checkmark-circle {
    stroke-dasharray: 166;
    stroke-dashoffset: 166;
    stroke-width: 2;
    stroke-miterlimit: 10;
    stroke: #10b981;
    fill: none;
    animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
}

.checkmark-check {
    transform-origin: 50% 50%;
    stroke-dasharray: 48;
    stroke-dashoffset: 48;
    animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
}

@keyframes stroke {
    100% {
        stroke-dashoffset: 0;
    }
}

.success-animation {
    animation: fadeIn 0.5s ease-out;
}

.loading-bar {
    height: 4px;
    background-color: #d1fae5;
    border-radius: 2px;
    overflow: hidden;
}

.loading-bar::after {
    content: '';
    display: block;
    height: 100%;
    background-color: #10b981;
    border-radius: 2px;
    animation: progressBar 2s ease-out;
}
</style>

<!-- Success/Error Messages -->
<?php if (!empty($success_message)): ?>
    <div class="max-w-md mx-auto mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg success-animation">
        <div class="flex items-center justify-center">
            <div class="checkmark-container mr-3">
                <svg class="checkmark" viewBox="0 0 52 52">
                    <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark-check" fill="none" d="m14.1 27.2l7.1 7.2 16.7-16.8"/>
                </svg>
            </div>
            <div>
                <div class="font-bold text-green-800">Login Successful!</div>
                <div class="text-sm text-green-600"><?= htmlspecialchars($success_message) ?></div>
            </div>
        </div>
        <div class="loading-bar mt-3"></div>
    </div>
    
    <!-- Success Sound -->
    <audio id="loginSuccessSound" preload="auto">
        <source src="data:audio/wav;base64,UklGRnoGAABXQVZFZm10IBAAAAABAAEAQB8AAEAfAAABAAgAZGF0YQoGAACBhYqFbF1fdJivrJBhNjVgodDbq2EcBj+a2/LDciUFLIHO8tiJNwgZaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmEZBSeL1/LRfiwFJ3zM8NyPOggVaLPq55xKCw5OpOPwtmEcBjiS2/LKdCUFLIHO8tiJOQgXaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmEZByeL1/LRfiwFJ3zM8NyPOggVaLPq55xKCw5OpOPwtmEcBjiS2/LKdCUFLIHO8tiJOQgXaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmEZByeL1/LRfiwFJ3zM8NyPOggVaLPq55xKCw5OpOPwtmEcBjiS2/LKdCUFLIHO8tiJOQgXaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmEZByeL1/LRfiwFJ3zM8NyPOggVaLPq55xKCw5OpOPwtmEcBjiS2/LKdCUFLIHO8tiJOQgXaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmEZByeL1/LRfiwFJ3zM8NyPOggVaLPq55xKCw5OpOPwtmEcBjiS2/LKdCUFLIHO8tiJOQgXaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmEZByeL1/LRfiwFJ3zM8NyPOggVaLPq55xKCw5OpOPwtmEcBjiS2/LKdCUFLIHO8tiJOQgXaLvt==" type="audio/wav">
    </audio>
    
    <script>
        // Play success sound
        document.getElementById('loginSuccessSound').play().catch(e => console.log('Sound play failed:', e));
        
        // Auto-redirect to application form after 2 seconds
        setTimeout(function() {
            window.location.href = 'index.php?content_file=<?= htmlspecialchars($redirect_to) ?>';
        }, 2000);
    </script>
<?php endif; ?>

<?php if (!empty($errors)): ?>
    <div class="max-w-md mx-auto mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
        <div class="flex items-center mb-2">
            <i class="fas fa-exclamation-triangle mr-2"></i>
            <strong>Login Error:</strong>
        </div>
        <ul class="list-disc list-inside text-sm">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post" class="max-w-md w-full my-8 mx-auto bg-gradient-to-br from-white via-gray-50 to-gray-200 rounded-2xl border border-gray-200 shadow-2xl hover:shadow-[0_8px_32px_0_rgba(31,38,135,0.18)] transition-shadow duration-300 p-8 space-y-6" id="studentLoginForm" autocomplete="off">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
    
    <h2 class="text-2xl font-bold text-kinpoe-blue mb-4 text-center">Student Login</h2>
    
    <div>
        <label for="loginCnicEmail" class="block mb-1 font-semibold text-kinpoe-blue">CNIC or Email</label>
        <input type="text" name="cnic_email" id="loginCnicEmail" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue text-lg transition-shadow shadow-sm focus:shadow-lg"
            placeholder="Enter CNIC or Email" value="<?= isset($_POST['cnic_email']) ? htmlspecialchars($_POST['cnic_email']) : '' ?>">
    </div>
    
    <div>
        <label for="loginPassword" class="block mb-1 font-semibold text-kinpoe-blue">Password</label>
        <input type="password" name="password" id="loginPassword" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue text-lg transition-shadow shadow-sm focus:shadow-lg"
            placeholder="Enter your password">
    </div>
    
    <button type="submit" class="w-full bg-kinpoe-blue hover:bg-kinpoe-gold text-white font-bold py-2 px-4 rounded-lg transition-all duration-300 text-lg shadow-md">Login</button>
    
    <div class="text-center mt-4">
        <span class="text-gray-600">Don't have an account?</span>
        <a href="index.php?content_file=partials/register.php" class="text-kinpoe-blue font-semibold hover:underline ml-1">Create an account</a>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced form submission handling
    document.getElementById('studentLoginForm').addEventListener('submit', function(e) {
        const cnicEmail = document.getElementById('loginCnicEmail').value.trim();
        const password = document.getElementById('loginPassword').value;
        
        // Basic validation
        if (!cnicEmail || !password) {
            e.preventDefault();
            alert('Please fill in all fields');
            return;
        }
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = 
            '<svg class="animate-spin h-5 w-5 mr-2 inline" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Logging in...';
        submitBtn.disabled = true;
        
        // Re-enable button after 5 seconds in case of issues
        setTimeout(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 5000);
    });
});
</script>
