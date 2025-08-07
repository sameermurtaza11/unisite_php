
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
        $result = $auth->register($_POST);
        
        if ($result['success']) {
            $success_message = $result['message'];
            // Clear form data on success
            $_POST = [];
        } else {
            $errors = $result['errors'];
        }
    }
}
?>

<style>
/* Success animation */
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

/* Form validation animations */
@keyframes shake {
    0%, 100% { transform: translateX(0); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
    20%, 40%, 60%, 80% { transform: translateX(5px); }
}

.shake {
    animation: shake 0.5s ease-in-out;
}

.checkmark {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: block;
    stroke-width: 3;
    stroke: #10b981;
    stroke-miterlimit: 10;
    margin: 0 auto 20px;
    animation: checkmark 0.6s ease-in-out;
}

.success-animation {
    animation: fadeIn 0.5s ease-out;
}

.progress-bar {
    animation: progressBar 3s ease-out;
}
</style>

<!-- Success/Error Messages -->
<?php if (!empty($success_message)): ?>
    <div id="successAnimation" class="max-w-md mx-auto mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative overflow-hidden">
        <div class="flex items-center">
            <div class="success-checkmark mr-3">
                <div class="check-icon">
                    <span class="icon-line line-tip"></span>
                    <span class="icon-line line-long"></span>
                    <div class="icon-circle"></div>
                    <div class="icon-fix"></div>
                </div>
            </div>
            <div>
                <div class="font-bold text-green-800">Registration Successful!</div>
                <div class="text-sm text-green-600">Welcome to KINPOE! Redirecting to login page...</div>
            </div>
        </div>
        <div class="loading-bar"></div>
    </div>
    
    <!-- Success Sound -->
    <audio id="successSound" preload="auto">
        <source src="data:audio/wav;base64,UklGRnoGAABXQVZFZm10IBAAAAABAAEAQB8AAEAfAAABAAgAZGF0YQoGAACBhYqFbF1fdJivrJBhNjVgodDbq2EcBj+a2/LDciUFLIHO8tiJNwgZaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmEZBSeL1/LRfiwFJ3zM8NyPOggVaLPq55xKCw5OpOPwtmEcBjiS2/LKdCUFLIHO8tiJOQgXaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmEZByeL1/LRfiwFJ3zM8NyPOggVaLPq55xKCw5OpOPwtmEcBjiS2/LKdCUFLIHO8tiJOQgXaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmEZByeL1/LRfiwFJ3zM8NyPOggVaLPq55xKCw5OpOPwtmEcBjiS2/LKdCUFLIHO8tiJOQgXaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmEZByeL1/LRfiwFJ3zM8NyPOggVaLPq55xKCw5OpOPwtmEcBjiS2/LKdCUFLIHO8tiJOQgXaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmEZByeL1/LRfiwFJ3zM8NyPOggVaLPq55xKCw5OpOPwtmEcBjiS2/LKdCUFLIHO8tiJOQgXaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmEZByeL1/LRfiwFJ3zM8NyPOggVaLPq55xKCw5OpOPwtmEcBjiS2/LKdCUFLIHO8tiJOQgXaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmEZByeL1/LRfiwFJ3zM8NyPOggVaLPq55xKCw5OpOPwtmEcBjiS2/LKdCUFLIHO8tiJOQgXaLvt==" type="audio/wav">
    </audio>
    
    <script>
        // Play success sound
        document.getElementById('successSound').play().catch(e => console.log('Sound play failed:', e));
        
        // Auto-redirect to login page after 4 seconds
        setTimeout(function() {
            window.location.href = 'index.php?content_file=partials/login.php';
        }, 4000);
    </script>
<?php endif; ?>

<?php if (!empty($errors)): ?>
    <div class="max-w-md mx-auto mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg animate-shake">
        <div class="flex items-center mb-2">
            <i class="fas fa-exclamation-triangle mr-2 text-lg"></i>
            <strong>Please fix the following errors:</strong>
        </div>
        <ul class="list-disc list-inside text-sm">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post" class="max-w-md w-full mx-auto my-8 bg-gradient-to-br from-white via-gray-50 to-gray-200 rounded-2xl border border-gray-200 shadow-2xl hover:shadow-[0_8px_32px_0_rgba(31,38,135,0.18)] transition-shadow duration-300 p-8 space-y-6" id="studentRegisterForm" autocomplete="off">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
    
    <h2 class="text-2xl font-bold text-kinpoe-blue mb-4 text-center">Student Registration</h2>
    
    <div>
        <label for="regCnic" class="block mb-1 font-semibold text-kinpoe-blue">CNIC</label>
        <input type="text" name="cnic" id="regCnic" maxlength="13" pattern="[0-9]{13}" 
               inputmode="numeric" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue text-lg transition-shadow shadow-sm focus:shadow-lg"
            placeholder="Enter 13-digit CNIC (numbers only)" value="<?= isset($_POST['cnic']) ? htmlspecialchars($_POST['cnic']) : '' ?>">
        <div class="text-xs text-gray-500 mt-1">Format: 1234567890123 (13 digits only)</div>
    </div>
    
    <div>
        <label for="regFullName" class="block mb-1 font-semibold text-kinpoe-blue">Full Name <span class="text-gray-400 font-normal">(as per CNIC)</span></label>
        <input type="text" name="full_name" id="regFullName" pattern="[A-Za-z\s]+" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue text-lg transition-shadow shadow-sm focus:shadow-lg"
            placeholder="Enter your full name (alphabets only)" value="<?= isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : '' ?>">
        <div class="text-xs text-gray-500 mt-1">Only alphabets and spaces allowed</div>
    </div>
    
    <div>
        <label for="regEmail" class="block mb-1 font-semibold text-kinpoe-blue">Email Address</label>
        <input type="email" name="email" id="regEmail" 
               pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue text-lg transition-shadow shadow-sm focus:shadow-lg"
            placeholder="Enter your email address" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
        <div id="emailError" class="text-xs text-red-500 mt-1 hidden">Please enter a valid email address</div>
    </div>
    
    <div>
        <label for="regMobile" class="block mb-1 font-semibold text-kinpoe-blue">Mobile Number</label>
        <input type="text" name="mobile" id="regMobile" maxlength="11" pattern="03[0-9]{9}" 
               inputmode="numeric" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue text-lg transition-shadow shadow-sm focus:shadow-lg"
            placeholder="03XXXXXXXXX (numbers only)" value="<?= isset($_POST['mobile']) ? htmlspecialchars($_POST['mobile']) : '' ?>">
        <div class="text-xs text-gray-500 mt-1">Format: 03XXXXXXXXX (11 digits starting with 03)</div>
    </div>
    
    <div>
        <label for="regPassword" class="block mb-1 font-semibold text-kinpoe-blue">Password</label>
        <input type="password" name="password" id="regPassword" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue text-lg transition-shadow shadow-sm focus:shadow-lg"
            placeholder="Enter password">
        <div class="text-xs text-gray-500 mt-1">Password must be at least 8 characters, include a number and a capital letter.</div>
    </div>
    
    <div>
        <label for="regConfirmPassword" class="block mb-1 font-semibold text-kinpoe-blue">Confirm Password</label>
        <input type="password" name="confirm_password" id="regConfirmPassword" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-kinpoe-blue text-lg transition-shadow shadow-sm focus:shadow-lg"
            placeholder="Re-enter password">
    </div>
    
    <button type="submit" class="w-full bg-kinpoe-blue hover:bg-kinpoe-gold text-white font-bold py-2 px-4 rounded-lg transition-all duration-300 text-lg shadow-md">Register</button>
    
    <div class="text-center mt-4">
        <span class="text-gray-600">Already have an account?</span>
        <a href="index.php?content_file=partials/login.php" class="text-kinpoe-blue font-semibold hover:underline ml-1">Login</a>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced form validation
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        const cnic = document.getElementById('regCnic').value;
        const fullName = document.getElementById('regFullName').value;
        const email = document.getElementById('regEmail').value;
        const mobile = document.getElementById('regMobile').value;
        const password = document.getElementById('regPassword').value;
        const confirmPassword = document.getElementById('regConfirmPassword').value;
        
        // Validation flags
        let isValid = true;
        
        // CNIC validation - only numbers, exactly 13 digits
        if (!/^[0-9]{13}$/.test(cnic)) {
            showFieldError('regCnic', 'CNIC must be exactly 13 digits (numbers only)');
            isValid = false;
        }
        
        // Full name validation - only letters and spaces
        if (!/^[A-Za-z\s]+$/.test(fullName) || fullName.trim().length < 2) {
            showFieldError('regFullName', 'Full name must contain only letters and spaces (minimum 2 characters)');
            isValid = false;
        }
        
        // Email validation - proper email format
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailRegex.test(email)) {
            showFieldError('regEmail', 'Please enter a valid email address');
            isValid = false;
        }
        
        // Mobile validation - must start with 03 and be 11 digits
        if (!/^03[0-9]{9}$/.test(mobile)) {
            showFieldError('regMobile', 'Mobile number must be 11 digits starting with 03');
            isValid = false;
        }
        
        // Password validation
        if (password.length < 6) {
            showFieldError('regPassword', 'Password must be at least 6 characters long');
            isValid = false;
        }
        
        // Password confirmation
        if (password !== confirmPassword) {
            showFieldError('regConfirmPassword', 'Passwords do not match');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
            return;
        }
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML = 
            '<svg class="animate-spin h-5 w-5 mr-2 inline" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Creating Account...';
        submitBtn.disabled = true;
    });
    
    // Real-time input validation and formatting
    document.getElementById('regCnic').addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, ''); // Only allow numbers
        if (this.value.length > 13) {
            this.value = this.value.slice(0, 13);
        }
        clearFieldError('regCnic');
    });
    
    document.getElementById('regFullName').addEventListener('input', function() {
        this.value = this.value.replace(/[^A-Za-z\s]/g, ''); // Only allow letters and spaces
        clearFieldError('regFullName');
    });
    
    document.getElementById('regMobile').addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, ''); // Only allow numbers
        if (this.value.length > 11) {
            this.value = this.value.slice(0, 11);
        }
        clearFieldError('regMobile');
    });
    
    document.getElementById('regEmail').addEventListener('input', function() {
        clearFieldError('regEmail');
    });
    
    document.getElementById('regPassword').addEventListener('input', function() {
        clearFieldError('regPassword');
    });
    
    document.getElementById('regConfirmPassword').addEventListener('input', function() {
        clearFieldError('regConfirmPassword');
    });
    
    // Helper functions for field validation
    function showFieldError(fieldId, message) {
        const field = document.getElementById(fieldId);
        field.classList.add('border-red-500', 'shake');
        
        // Remove existing error message
        const existingError = field.parentNode.querySelector('.field-error');
        if (existingError) {
            existingError.remove();
        }
        
        // Add new error message
        const errorDiv = document.createElement('div');
        errorDiv.className = 'field-error text-xs text-red-500 mt-1 font-medium';
        errorDiv.textContent = message;
        field.parentNode.appendChild(errorDiv);
        
        // Remove shake animation after it completes
        setTimeout(() => {
            field.classList.remove('shake');
        }, 500);
    }
    
    function clearFieldError(fieldId) {
        const field = document.getElementById(fieldId);
        field.classList.remove('border-red-500');
        
        const existingError = field.parentNode.querySelector('.field-error');
        if (existingError) {
            existingError.remove();
        }
    }
});
</script>
