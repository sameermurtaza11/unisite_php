
# Unisite PHP (KINPOE Website Rebuild) Documentation
## Old vs New: Feature Comparison

| Feature/Section                | Old KINPOE Website (kinpoe.edu.pk)         | New Rebuild (unisite_php)                        |
|-------------------------------|--------------------------------------------|--------------------------------------------------|
| **Homepage**                  | Mostly static, limited interactivity       | Dynamic, modular, modern UI, responsive          |
| **Faculty Section**           | Static, hard to update                     | Dynamic, data-driven, modal with details         |
| **Gallery**                   | Static images, no modal or navigation      | Dynamic gallery, modal with captions/navigation  |
| **Research/Publications**     | Static, scattered, not easily updatable    | Centralized, dynamic, single data source         |
| **Application System**        | No online application system               | Complete multi-step PDTP application form with validation |
| **Application Status Checker**| Basic, only CNIC search, no validation     | Search by CNIC or name, validation, instructions |
| **Program Management**        | Static program listings                    | Dynamic program data with external integration   |
| **User Authentication**       | No user system                             | Complete login/registration system with sessions |
| **Database Integration**      | Limited or no database usage               | Full MySQL integration with form persistence     |
| **Form Data Persistence**    | No form saving capabilities                | Auto-save progress, resume applications, reset functionality |
| **Modals/Popups**             | Minimal, not accessible                    | Alpine.js/JS modals, accessible, keyboard nav    |
| **Design/Styling**            | Outdated, non-responsive                   | Tailwind CSS, modern, fully responsive           |
| **Code Structure**            | Monolithic, hard to maintain               | Modular PHP, partials, maintainable              |
| **Security**                  | Minimal input validation                   | Input validation, CSRF protection, prepared statements |
| **Accessibility**             | Lacking                                   | Improved ARIA, tooltips, accessible modals       |
| **Customization**             | Difficult, code changes required           | Easy to extend, update data files, modular       |
| **Performance**               | Slower, heavy pages                        | Optimized, lighter, better UX                    |
| **Documentation**             | None or minimal                            | Full README, code comments, setup guide          |

**Summary:**
- The new rebuild is a complete web application with dynamic content management, user authentication, and a comprehensive online application system. Features include multi-step PDTP application forms with database persistence, external program integration (MS program links to PIEAS), form data validation and preservation, reset functionality, and modern responsive design. All major sections are data-driven, secure, and easily maintainable.

## Overview
This project is a complete modern rebuild of the KINPOE (Karachi Institute of Power Engineering) website, originally at [kinpoe.edu.pk](https://kinpoe.edu.pk). The new version is a full-featured web application built with PHP, MySQL, Tailwind CSS, and Alpine.js, featuring a comprehensive online application system, user authentication, database integration, and modern responsive design.

---

## Table of Contents
1. [Project Structure](#project-structure)
2. [Technology Stack](#technology-stack)
3. [Key Features](#key-features)
4. [Setup & Deployment](#setup--deployment)
5. [Dynamic Content & Data Sources](#dynamic-content--data-sources)
6. [Custom Modules & Scripts](#custom-modules--scripts)
7. [Security & Best Practices](#security--best-practices)
8. [Customization & Extending](#customization--extending)
9. [Contact & Support](#contact--support)

---

## Project Structure
```
├── config.php                # Database credentials and configuration
├── index.php                 # Main entry point with routing system
├── pages/                    # Main site pages (about, contact, gallery, programs, etc.)
├── partials/                 # Reusable UI components and application forms
│   ├── form_pdtp.php         # Multi-step PDTP application form with validation
│   ├── login.php             # User authentication system
│   ├── register.php          # User registration form
│   └── program_selection.php # Program selection interface
├── layouts/                  # Layout templates
├── includes/                 # Core functionality (auth, database, security)
│   ├── auth.php              # User authentication and session management
│   ├── database.php          # Database connection and security
│   └── logout.php            # Logout functionality
├── data/                     # Data sources (programs, research items, etc.)
├── static/                   # Static files (images, PDFs, Excel, media)
├── modules/                  # JavaScript modules (facultyModal.js, etc.)
├── _setup/                   # SQL setup scripts and database schema
│   ├── create_unisite_pdp_dp.sql      # Main database structure
│   └── create_pdtp_applications_table.sql # PDTP applications table
└── test_*.php                # Testing and validation scripts
```

## Technology Stack
- **PHP**: Backend logic, session management, form processing, database operations
- **MySQL**: Database for user accounts, application data, and persistent storage
- **Tailwind CSS**: Utility-first, responsive styling framework
- **Alpine.js**: Lightweight JavaScript framework for interactivity
- **JavaScript**: Custom logic for real-time validation, modals, and UX enhancements
- **Font Awesome**: Professional iconography
- **PDO**: Secure database queries with prepared statements

## Key Features

### 🎓 **Complete Application System**
- **Multi-step PDTP Application Form**: 4-step guided application process with real-time validation
- **Form Data Persistence**: Automatic saving of progress with ability to resume applications
- **Reset Functionality**: Complete form reset with database cleanup and confirmation dialogs
- **External Program Integration**: MS program applications redirect to PIEAS admission portal
- **Eligibility Validation**: PDTP-specific validation for age limits, qualification requirements, and academic criteria

### 🔐 **User Authentication & Security**
- **Complete user registration and login system** with secure session management
- **CSRF protection** on all forms to prevent cross-site request forgery
- **Input sanitization and validation** on all user inputs
- **Prepared statements** for all database queries to prevent SQL injection
- **Password hashing and secure authentication** practices

### 📊 **Database Integration**
- **Full MySQL integration** with proper schema design
- **Application data persistence** with INSERT ON DUPLICATE KEY UPDATE logic
- **User management** with secure credential storage
- **Application status tracking** and progress monitoring
- **Data integrity** with foreign key constraints and proper indexing

### 🎨 **Modern UI/UX**
- **Responsive design** that works on all devices (desktop, tablet, mobile)
- **Dynamic homepage** with interactive sections (faculty, gallery, research, news)
- **Professional modal systems** with Alpine.js for accessibility and keyboard navigation
- **Real-time form validation** with immediate user feedback
- **Progress indicators** for multi-step processes

### 🔍 **Application Status Checker**
- **Search by CNIC or name** with comprehensive validation
- **Modal instructions** and user guidance
- **Database-driven results** with detailed application information

### 📱 **Enhanced Functionality**
- **Program selection interface** with dynamic filtering and detailed information
- **File upload capabilities** for CV/resume submissions
- **Debug and testing tools** for development and troubleshooting
- **Comprehensive error handling** with user-friendly messages

## Setup & Deployment

### Prerequisites
- **Web Server**: Apache/Nginx with PHP support (XAMPP/WAMP recommended for development)
- **PHP**: Version 7.4 or higher
- **MySQL**: Version 5.7 or higher
- **Extensions**: PDO, MySQLi, and standard PHP extensions

### Installation Steps
1. **Clone/Download**: Place the project in your web server directory (e.g., XAMPP `htdocs`)
2. **Database Setup**: 
   - Create a MySQL database named `kinpoe_db`
   - Import `_setup/create_unisite_pdp_dp.sql` for basic structure
   - Import `_setup/create_pdtp_applications_table.sql` for application system
3. **Configuration**: 
   - Edit `config.php` with your database credentials
   - Ensure proper file permissions for uploads and session directories
4. **Static Assets**: 
   - Place images, PDFs, and other media in the `static/` directory
   - Verify file paths in data files match your static structure
5. **Testing**: 
   - Access `index.php` in your browser
   - Test user registration and login functionality
   - Verify database connections and form submissions

### Database Configuration Example
```php
// config.php
$config = [
    'db_host' => 'localhost',
    'db_name' => 'database_name',
    'db_user' => 'your_username',
    'db_pass' => 'your_password'
];
```

## Dynamic Content & Data Sources

### 📚 **Program Management**
- **Dynamic program data** from `data/programs_data.php` with eligibility, deadlines, and details
- **External integration** for MS program applications (redirects to PIEAS portal)
- **Automatic deadline management** with date-based availability controls
- **Program-specific form routing** and validation logic

### 👥 **Faculty, Gallery & Research**
- **Faculty data** loaded from PHP arrays with modal details and publications
- **Dynamic gallery** with categorized images and modal navigation
- **Research publications** from centralized data sources for easy updates
- **Modal systems** with Alpine.js for enhanced user interaction

### 📝 **Application Data Management**
- **Multi-step form data** preserved in database with automatic saving
- **Session-based temporary storage** with database persistence on save/next actions
- **Form state preservation** across qualification option changes
- **Comprehensive validation** with real-time feedback and error handling

### 🗄️ **Database Schema**
- **User management** with secure authentication and session tracking
- **Application storage** with JSON fields for complex data structures
- **Foreign key relationships** maintaining data integrity
- **Optimized queries** with proper indexing for performance

## Custom Modules & Scripts

### 🔧 **Core Application Files**
- **`partials/form_pdtp.php`**: Complete multi-step PDTP application form with:
  - Real-time validation and eligibility checking
  - Database persistence with auto-save functionality
  - Form reset with confirmation and database cleanup
  - Cross-step data preservation for qualification options
  - Debug information display for development
- **`includes/auth.php`**: User authentication system with session management
- **`includes/database.php`**: Secure database connection with PDO and error handling
- **`pages/application-status.php`**: Application status checker with CNIC/name search
- **`partials/program_selection.php`**: Dynamic program selection with external integration

### 🧪 **Testing & Validation**
- **`test_*.php` files**: Automated testing scripts for form validation and database operations
- **Debug logging**: Comprehensive error logging and development feedback
- **Form validation testing**: Real-time validation with immediate user feedback

### 🎨 **Frontend Enhancement**
- **`modules/facultyModal.js`**: Enhanced faculty modal with accessibility features
- **Real-time validation scripts**: JavaScript for immediate form feedback
- **Progressive enhancement**: Works without JavaScript, enhanced with it

## Security & Best Practices

### 🔒 **Authentication & Authorization**
- **Secure user registration and login** with password hashing
- **Session-based authentication** with proper session management
- **User role management** and access control for sensitive areas
- **Automatic logout** functionality with proper session cleanup

### 🛡️ **Input Validation & Security**
- **CSRF protection** on all forms using token-based validation
- **Input sanitization** using `htmlspecialchars()` and proper escaping
- **SQL injection prevention** with PDO prepared statements
- **File upload validation** with type and size restrictions
- **Real-time client-side validation** with server-side verification

### 📊 **Database Security**
- **Prepared statements** for all database queries
- **Foreign key constraints** maintaining referential integrity
- **Proper indexing** for performance and security
- **Error handling** without exposing sensitive information
- **Database connection security** with credential protection

### 🔍 **Development & Debugging**
- **Comprehensive error logging** using `error_log()` for troubleshooting
- **Debug information display** (disabled in production)
- **Form validation testing** with automated test scripts
- **Security headers** and best practices implementation

## Customization & Extending

### 🎨 **Adding New Content**
- **New Pages**: Create files in `pages/` directory and include common layout/partials
- **Program Management**: Update `data/programs_data.php` for new programs or changes
- **Static Content**: Add images, PDFs, and media to `static/` directory structure
- **Faculty & Research**: Update data files in `data/` directory for easy content management

### 🔧 **Extending Functionality**
- **New Application Forms**: Create new form files in `partials/` following PDTP form patterns
- **Additional Authentication**: Extend `includes/auth.php` for role-based access control
- **Database Extensions**: Add new tables using SQL files in `_setup/` directory
- **External Integrations**: Follow MS program pattern for linking to external systems

### 🎭 **UI/UX Customization**
- **Design Changes**: Modify Tailwind CSS classes throughout the templates
- **Interactive Elements**: Extend Alpine.js functionality or add custom JavaScript
- **Modal Systems**: Create new modals following existing accessibility patterns
- **Form Validation**: Add new validation rules in both client-side and server-side code

### ⚙️ **Configuration Options**
- **Database Settings**: Modify `config.php` for different environments
- **Debug Mode**: Toggle debug information display in forms and pages
- **File Upload Settings**: Adjust file size limits and allowed types
- **Email Configuration**: Extend for notification systems and user communications

## Recent Updates & Improvements

### ✅ **Latest Features (August 2025)**
- **Complete Database Integration**: Full PDTP application form with MySQL persistence
- **Auto-save Functionality**: Form progress automatically saved on "Save Progress" and "Next" actions
- **Reset Form Feature**: Complete form reset with database cleanup and confirmation dialogs
- **External Program Links**: MS program applications now redirect to PIEAS admission portal
- **Form State Preservation**: SSC marks and other data preserved across qualification option changes
- **Enhanced Validation**: Real-time validation with comprehensive eligibility checking
- **Debug and Testing**: Complete test suite for form validation and database operations

### 🔄 **Continuous Improvements**
- **Performance Optimization**: Database queries optimized with proper indexing
- **User Experience**: Enhanced error messages and user guidance throughout the application
- **Security Enhancements**: CSRF protection and comprehensive input validation
- **Code Quality**: Modular, maintainable code structure with comprehensive documentation

## Contact & Support
For questions, issues, contributions, or technical support regarding the KINPOE website rebuild:

- **Primary Contact**: KINPOE IT/Web Development Team
- **Technical Issues**: Use GitHub issues or contact the project maintainer
- **Feature Requests**: Submit detailed requirements through official channels
- **Security Concerns**: Report immediately to the IT security team

---

## Development Status: Production Ready ✅

This documentation covers the complete structure, setup, features, and customization options for the KINPOE website rebuild. The system is fully functional with comprehensive application management, user authentication, and database integration. For implementation details, see code comments and individual module documentation.

