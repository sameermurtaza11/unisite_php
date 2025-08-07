<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-r from-kinpoe-blue to-kinpoe-light-blue text-white">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6">Gallery</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Karachi Institute of Power Engineering - Excellence in Engineering Education and Research
            </p>
        </div>
    </div>
</section>

<section class="relative py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php
            $gallery_images = [
                ["src" => "static/media/kinpoe_building.jpg", "alt" => "KINPOE Building"],
                ["src" => "static/media/research_lab.jpg", "alt" => "Research Lab"],
                ["src" => "static/media/graduation.jpg", "alt" => "Graduation"],
                ["src" => "static/media/engineering_facility.jpg", "alt" => "Engineering Facility"],
                ["src" => "static/media/paec_logo.png", "alt" => "PAEC Logo"],
                ["src" => "static/media/piaes_logo.png", "alt" => "PIAES Logo"],
                ["src" => "static/media/knpgs_aerial.jpg", "alt" => "KNPGS Aerial"],
                ["src" => "static/media/cnpgs_aerial.jpg", "alt" => "CNPGS Aerial"],
                ["src" => "static/media/At 1024px.png", "alt" => "At 1024px"],
                ["src" => "static/media/At 1440px.png", "alt" => "At 1440px"],
                ["src" => "static/media/director msg.jpg", "alt" => "Director Message"],
                ["src" => "static/media/CSR Obj.png", "alt" => "CSR Objective"],
                ["src" => "static/media/problem.png", "alt" => "Problem"],
                ["src" => "static/media/kinpoe_logo_new.png", "alt" => "KINPOE Logo New"],
                ["src" => "static/media/kinpoe_logo.png", "alt" => "KINPOE Logo"],
                ["src" => "static/media/sample1.pdf", "alt" => "Sample PDF 1"],
                ["src" => "static/media/sample2.pdf", "alt" => "Sample PDF 2"],
                ["src" => "static/media/sample3.pdf", "alt" => "Sample PDF 3"],
                ["src" => "static/media/sample4.pdf", "alt" => "Sample PDF 4"],
                ["src" => "static/media/sample5.pdf", "alt" => "Sample PDF 5"],
            ];
            foreach ($gallery_images as $idx => $img) {
            ?>
            <div class="rounded-lg overflow-hidden shadow-lg cursor-pointer group" onclick="openModal(<?php echo $idx; ?>)">
                <img src="<?php echo $img['src']; ?>" alt="<?php echo $img['alt']; ?>" class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-300">
            </div>
            <?php } ?>
        </div>
        <!-- Modal/Lightbox -->
        <div id="galleryModal" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden">
            <div class="relative max-w-3xl w-full">
                <button onclick="closeModal()" class="absolute top-2 right-2 text-white text-3xl font-bold">&times;</button>
                <img id="modalImg" src="" alt="Gallery Image" class="w-full max-h-[80vh] object-contain rounded-lg shadow-lg">
            </div>
        </div>
        <script>
        const galleryImages = <?php echo json_encode($gallery_images); ?>;
        function openModal(idx) {
            document.getElementById('galleryModal').classList.remove('hidden');
            document.getElementById('modalImg').src = galleryImages[idx].src;
            document.getElementById('modalImg').alt = galleryImages[idx].alt;
        }
        function closeModal() {
            document.getElementById('galleryModal').classList.add('hidden');
        }
        // Close modal on ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeModal();
        });
        // Close modal on click outside image
        document.getElementById('galleryModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });
        </script>
    </div>
</section>
