
# Unisite PHP (KINPOE Website Rebuild) Documentation
## Old vs New: Feature Comparison

| Feature/Section                | Old KINPOE Website (kinpoe.edu.pk)         | New Rebuild (unisite_php)                        |
|-------------------------------|--------------------------------------------|--------------------------------------------------|
| **Homepage**                  | Mostly static, limited interactivity       | Dynamic, modular, modern UI, responsive          |
| **Faculty Section**           | Static, hard to update                     | Dynamic, data-driven, modal with details         |
| **Gallery**                   | Static images, no modal or navigation      | Dynamic gallery, modal with captions/navigation  |
| **Research/Publications**     | Static, scattered, not easily updatable    | Centralized, dynamic, single data source         |
| **Application Status Checker**| Basic, only CNIC search, no validation     | Search by CNIC or name, validation, instructions |
| **Modals/Popups**             | Minimal, not accessible                    | Alpine.js/JS modals, accessible, keyboard nav    |
| **Design/Styling**            | Outdated, non-responsive                   | Tailwind CSS, modern, fully responsive           |
| **Code Structure**            | Monolithic, hard to maintain               | Modular PHP, partials, maintainable              |
| **Security**                  | Minimal input validation                   | Input validation, prepared statements, best practices |
| **Accessibility**             | Lacking                                   | Improved ARIA, tooltips, accessible modals       |
| **Customization**             | Difficult, code changes required           | Easy to extend, update data files, modular       |
| **Performance**               | Slower, heavy pages                        | Optimized, lighter, better UX                    |
| **Documentation**             | None or minimal                            | Full README, code comments, setup guide          |

**Summary:**
- The new rebuild is dynamic, maintainable, secure, and user-friendly, with a modern design and improved accessibility. All major sections are now data-driven and easy to update, and the application status checker is much more robust and helpful for users.

## Overview
This project is a modern, maintainable rebuild of the KINPOE (Karachi Institute of Power Engineering) website, originally at [kinpoe.edu.pk](https://kinpoe.edu.pk). The new version is built with PHP, Tailwind CSS, Alpine.js, and MySQL, focusing on dynamic content, accessibility, and a professional, user-friendly experience.

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
├── config.php                # Database credentials
├── index.php                 # Main entry point
├── pages/                    # Main site pages (about, contact, gallery, etc.)
├── partials/                 # Reusable UI components (header, navbar, footer, etc.)
├── layouts/                  # Layout templates
├── data/                     # Data sources (e.g., research-items.php)
├── static/                   # Static files (images, PDFs, Excel, etc.)
├── modules/                  # JS modules (e.g., facultyModal.js)
├── _setup/                   # SQL and setup scripts
```

## Technology Stack
- **PHP**: Backend logic, dynamic page rendering, modular includes
- **Tailwind CSS**: Utility-first, responsive styling
- **Alpine.js**: Lightweight interactivity (modals, tooltips)
- **JavaScript**: Custom logic for modals, validation, tooltips
- **MySQL**: Application status checker backend
- **Font Awesome**: Iconography

## Key Features
- Dynamic homepage sections (faculty, gallery, research, news)
- Application status checker (search by CNIC or name, modal instructions)
- Responsive, accessible UI with modern design
- Modular PHP includes for maintainability
- Centralized data sources for research and gallery
- Security best practices (input validation, prepared statements)

## Setup & Deployment
1. **Clone the repository** to your web server (e.g., XAMPP `htdocs`)
2. **Database**: Import `_setup/create_unisite_pdp_dp.sql` into MySQL
3. **Configure DB**: Edit `config.php` with your database credentials
4. **Static Files**: Place images, PDFs, and other assets in the `static/` directory
5. **Access**: Open `index.php` or any page in your browser

## Dynamic Content & Data Sources
- **Faculty, Gallery, Research**: Data loaded from PHP arrays/files for easy updates
- **Application Status**: Data fetched from MySQL, search by CNIC or name, with validation and user guidance
- **Modals**: Alpine.js/JS for navigation, accessibility, and instructions

## Custom Modules & Scripts
- `modules/facultyModal.js`: Handles faculty modal logic
- `pages/application-status.php`: Application status checker (form, validation, AJAX, modal)
- `partials/`: All reusable UI components

## Security & Best Practices
- All user input is sanitized and validated
- Database queries use prepared statements to prevent SQL injection
- Sensitive config (DB credentials) is separated in `config.php`
- Accessible markup and ARIA roles where needed

## Customization & Extending
- Add new pages in `pages/`, include common layout/partials
- Update data in `data/` or `static/` as needed
- Extend modals or UI with Alpine.js or custom JS
- Adjust Tailwind classes for design tweaks

## Contact & Support
For questions, issues, or contributions, contact the KINPOE IT/web team or the project maintainer.

---

This documentation covers the structure, setup, and key features of the KINPOE website rebuild. For further details, see code comments and individual module documentation.
