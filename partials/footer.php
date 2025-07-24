<footer class="bg-kinpoe-dark-blue text-white">
    <div class="container mx-auto px-4 pt-12 pb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- About Section -->
            <div>
                <div class="flex items-center space-x-3 mb-4">
                    <img src="static/media/kinpoe_logo.png" alt="KINPOE Logo" class="h-10 w-10 rounded-full">
                    <h3 class="text-xl font-bold">KINPOE</h3>
                </div>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Karachi Institute of Power Engineering, affiliated with PIEAS, is dedicated to excellence in power
                    engineering education and research.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="index.php?content_file=pages/home.php" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Home</a></li>
                    <li><a href="index.php?content_file=pages/about.php" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">About Us</a></li>
                    <li><a href="index.php?content_file=pages/programs.php" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Programs</a></li>
                    <li><a href="index.php?content_file=pages/gallery.php" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Gallery</a></li>
                    <li><a href="index.php?content_file=pages/research.php" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Research</a></li>
                </ul>
            </div>

            <!-- Academic Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Academic</h4>
                <ul class="space-y-2">
                    <li><a href="index.php?content_file=pages/resources.php" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Resources</a></li>
                    <li><a href="index.php?content_file=pages/qec.php" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">QEC</a></li>
                    <li><a href="index.php?content_file=pages/apply.php" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Apply Now</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                <div class="space-y-3">
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-map-marker-alt text-kinpoe-gold mt-1"></i>
                        <div>
                            <p class="text-gray-300 text-sm">
                                <a href="https://maps.app.goo.gl/epTjjvfYe6UMa4yf7" target="_blank" rel="noopener" class="hover:underline">
                                    Karachi Institute of Power Engineering College, PIEAS,<br>
                                    KANUPP P.O. Box No. 12601, Hawks Bay Road, Near Paradise Point, Karachi.
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-phone text-kinpoe-gold"></i>
                        <p class="text-gray-300 text-sm cursor-pointer copyable" data-copy="+92-21-9920 2777 ext: 2701, +92-21-9923 2733">
                            +92-21-9920 2777 ext: 2701 <br> +92-21-9923 2733
                        </p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-fax text-kinpoe-gold"></i>
                        <p class="text-gray-300 text-sm cursor-pointer copyable" data-copy="+92-21-99232269">+92-21-99232269</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-envelope text-kinpoe-gold"></i>
                        <p class="text-gray-300 text-sm cursor-pointer copyable" data-copy="info@kinpoe.edu.pk">info@kinpoe.edu.pk</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-600 mt-4 pt-4 flex flex-col md:flex-row md:justify-between items-center">
            <p class="text-gray-300 text-sm">
                © 2025 Karachi Institute of Power Engineering (KINPOE). All rights reserved. |
                <a href="#" class="hover:text-white transition-colors duration-200">Privacy Policy</a> |
                <a href="#" class="hover:text-white transition-colors duration-200">Terms of Service</a>
            </p>
            <p class="text-sm font-semibold text-gray-400 md:text-right text-center">
                Developed by
                <a href="https://github.com/sameermurtaza11" target="_blank" rel="noopener"
                    class="hover:text-kinpoe-gold underline">Sameer Murtaza</a>
            </p>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.copyable').forEach(function(el) {
                el.addEventListener('click', function() {
                    const text = el.getAttribute('data-copy');
                    navigator.clipboard.writeText(text);
                    el.classList.add('text-kinpoe-gold');
                    setTimeout(() => el.classList.remove('text-kinpoe-gold'), 800);
                });
            });
        });
    </script>
</footer>