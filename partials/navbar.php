<nav class="bg-white shadow-lg sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    <style>
        .nav-zoom {
            transition: transform 0.2s, background 0.2s, color 0.2s;
            border-radius: 0.5rem;
            padding: 0rem 0.4rem 0.1rem 0.4rem;
        }

        .nav-zoom:hover {
            transform: scale(1.08);
            opacity: 80%;
            background: linear-gradient(90deg, #1e40af 0%, #f59e42 100%);
            color: #fff !important;
            box-shadow: 0 2px 12px 0 rgba(30, 64, 175, 0.288);
        }

        .nav-btn-zoom {
            transition: transform 0.2s, background 0.2s, color 0.2s;
        }

        .nav-btn-zoom:hover {
            transform: scale(1.08);
            background: linear-gradient(90deg, #1e40af 0%, #f59e42 100%);
            color: #fff !important;
            box-shadow: 0 2px 12px 0 rgba(30, 64, 175, 0.288);
        }

        /* --- Responsive Fix for 1024px to 1440px --- */
        @media (min-width: 1024px) and (max-width: 1440px) {
            .navbar-fix-gap {
                gap: 0.9rem !important;
            }

            .navbar-fix-font {
                font-size: 0.93rem !important;
            }

            .navbar-fix-logo {
                width: 2.2rem !important;
                height: 2.2rem !important;
                margin-right: 0.5rem !important;
            }

            .navbar-fix-btn {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
                font-size: 0.93rem !important;
            }

            .navbar-hide-subtitle {
                display: none !important;
            }
        }

        @media (max-width: 1024px) {
            .navbar-fix-gap {
                gap: 0.6rem !important;
            }

            .navbar-fix-font {
                font-size: 0.91rem !important;
            }
        }

        @media (min-width: 1441px) {
            .navbar-fix-gap {
                gap: 1.6rem !important;
            }
        }
    </style>

    <div class="container mx-auto px-2 lg:px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-3 2xl:space-x-1">
                <a href="index.php?content_file=pages/home.php" class="flex items-center space-x-3"
                    style="text-decoration: none;">
                    <img src="static/media/kinpoe_logo.png" alt="KINPOE Logo"
                        class="h-12 w-12 rounded-full navbar-fix-logo">
                    <div>
                        <h1 class="text-xl font-bold text-kinpoe-blue navbar-fix-font">KINPOE</h1>
                        <p class="text-xs text-kinpoe-gray navbar-fix-font navbar-hide-subtitle">Karachi Institute of Power Engineering
                        </p>
                    </div>
                </a>
            </div>


            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-3 navbar-fix-gap">
                <a href="index.php?content_file=pages/home.php"
                    class="text-gray-800 font-medium nav-zoom navbar-fix-font">Home</a>
                <a href="index.php?content_file=pages/about.php"
                    class="text-gray-800 font-medium nav-zoom navbar-fix-font">About</a>
                <a href="index.php?content_file=pages/programs.php"
                    class="text-gray-800 font-medium nav-zoom navbar-fix-font">Programs</a>
                <a href="index.php?content_file=pages/gallery.php"
                    class="text-gray-800 font-medium nav-zoom navbar-fix-font">Gallery</a>
                <a href="index.php?content_file=pages/research.php"
                    class="text-gray-800 font-medium nav-zoom navbar-fix-font">Research</a>
                <a href="index.php?content_file=pages/resources.php"
                    class="text-gray-800 font-medium nav-zoom navbar-fix-font">Resources</a>
                <a href="index.php?content_file=pages/qec.php"
                    class="text-gray-800 font-medium nav-zoom navbar-fix-font">QEC</a>
                <a href="index.php?content_file=pages/contact.php"
                    class="text-gray-800 font-medium nav-zoom navbar-fix-font">Contact</a>
                <a href="index.php?content_file=pages/application-status.php"
                    class="bg-kinpoe-blue text-white px-4 py-2 rounded-lg font-medium nav-btn-zoom navbar-fix-btn">Application
                    Status</a>
            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                class="lg:hidden text-gray-700 hover:text-kinpoe-blue">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div x-show="mobileMenuOpen" x-transition class="lg:hidden pb-4">
            <div class="flex flex-col space-y-3">
                <a href="index.php?content_file=pages/home.php" class="text-gray-800 font-medium py-2 nav-zoom">Home</a>
                <a href="index.php?content_file=pages/about.php" class="text-gray-800 font-medium py-2 nav-zoom">About</a>
                <a href="index.php?content_file=pages/programs.php" class="text-gray-800 font-medium py-2 nav-zoom">Programs</a>
                <a href="index.php?content_file=pages/gallery.php" class="text-gray-800 font-medium py-2 nav-zoom">Gallery</a>
                <a href="index.php?content_file=pages/research.php" class="text-gray-800 font-medium py-2 nav-zoom">Research</a>
                <a href="index.php?content_file=pages/resources.php" class="text-gray-800 font-medium py-2 nav-zoom">Resources</a>
                <a href="index.php?content_file=pages/qec.php" class="text-gray-800 font-medium py-2 nav-zoom">QEC</a>
                <a href="index.php?content_file=pages/contact.php" class="text-gray-800 font-medium py-2 nav-zoom">Contact</a>
                <a href="index.php?content_file=pages/application-status.php"
                    class="bg-kinpoe-blue text-white px-4 py-2 rounded-lg font-medium text-center nav-btn-zoom">Application Status</a>
            </div>
        </div>
    </div>
</nav>