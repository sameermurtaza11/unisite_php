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
                ["src" => "static/media/convocation/0001.jpg", "alt" => "0001"],
                ["src" => "static/media/convocation/0002.jpg", "alt" => "0002"],
                ["src" => "static/media/convocation/0003.jpg", "alt" => "0003"],
                ["src" => "static/media/convocation/0004.jpg", "alt" => "0004"],
                ["src" => "static/media/convocation/0005.jpg", "alt" => "0005"],
                ["src" => "static/media/convocation/0006.jpg", "alt" => "0006"],
                ["src" => "static/media/convocation/0007.jpg", "alt" => "0007"],
                ["src" => "static/media/convocation/0008.jpg", "alt" => "0008"],
                ["src" => "static/media/convocation/0009.jpg", "alt" => "0009"],
                ["src" => "static/media/convocation/0010.jpg", "alt" => "0010"],
                ["src" => "static/media/convocation/0011.jpg", "alt" => "0011"],
                ["src" => "static/media/convocation/0012.jpg", "alt" => "0012"],
                ["src" => "static/media/Smart Classroom/IMG_20230420_120151.jpg", "alt" => "Gallery Picture"],
                ["src" => "static/media/Smart Classroom/IMG_20230420_120351.jpg", "alt" => "Gallery Picture"],
                ["src" => "static/media/Smart Classroom/IMG_20230420_120425.jpg", "alt" => "Gallery Picture"],
                ["src" => "static/media/DEAR Lab/IMG_20230502_120638.jpg", "alt" => "Gallery Picture"],
                ["src" => "static/media/DEAR Lab/IMG_20230502_120901.jpg", "alt" => "Gallery Picture"],
                ["src" => "static/media/SKDL/IMG_20230420_122310.jpg", "alt" => "Gallery Picture"],
                ["src" => "static/media/NI Lab/20230720_112720.jpg", "alt" => "Gallery Picture"],
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
