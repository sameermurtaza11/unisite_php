-- PDTP Applications Table
-- This table stores multi-step PDTP application form data
-- Allows partial saves and resuming applications

CREATE TABLE IF NOT EXISTS pdtp_applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    application_id VARCHAR(20) UNIQUE NOT NULL,
    program_key VARCHAR(50) NOT NULL,
    
    -- Application Status
    current_step TINYINT DEFAULT 1,
    status ENUM('draft', 'in_progress', 'submitted', 'under_review', 'accepted', 'rejected') DEFAULT 'draft',
    
    -- Personal Information (Step 1)
    date_of_birth DATE,
    gender ENUM('male', 'female'),
    address TEXT,
    
    -- Academic Background (Step 2)
    qualification_option ENUM('option_a', 'option_b'),
    
    -- Option A: DAE Details
    dae_field VARCHAR(50),
    dae_institute VARCHAR(200),
    dae_marks DECIMAL(5,2),
    appearing_dae BOOLEAN DEFAULT FALSE,
    
    -- Option B: B.Sc./ADS Details
    degree_type ENUM('bsc', 'ads'),
    bsc_institute VARCHAR(200),
    subjects JSON, -- Store subjects array as JSON
    hsc_marks DECIMAL(5,2),
    degree_marks DECIMAL(5,2),
    degree_cgpa DECIMAL(3,2),
    appearing_degree BOOLEAN DEFAULT FALSE,
    
    -- Common Academic Fields
    ssc_marks DECIMAL(5,2),
    
    -- Professional Experience (Step 3)
    job_title VARCHAR(100),
    organization VARCHAR(200),
    experience_years VARCHAR(20),
    industry VARCHAR(100),
    motivation TEXT,
    
    -- File Uploads
    transcripts_filename VARCHAR(255),
    cv_filename VARCHAR(255),
    
    -- PDTP Validation Results
    age_at_deadline INT,
    eligibility_status ENUM('eligible', 'ineligible', 'pending') DEFAULT 'pending',
    validation_errors JSON,
    validation_warnings JSON,
    
    -- Timestamps
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    submitted_at TIMESTAMP NULL,
    
    -- Foreign Key Constraints
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    
    -- Indexes for better performance
    INDEX idx_user_program (user_id, program_key),
    INDEX idx_application_id (application_id),
    INDEX idx_status (status),
    INDEX idx_created_at (created_at)
);

-- Add some sample data for testing (optional)
-- INSERT INTO pdtp_applications (user_id, application_id, program_key, current_step, status) 
-- VALUES (1, 'PDTP2025001', 'pdtp', 1, 'draft');
