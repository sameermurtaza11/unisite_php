<!-- Gallery Preview Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-kinpoe-blue mb-4">Campus Life</h2>
            <p class="text-xl text-gray-600">Get a glimpse of our vibrant campus and academic environment</p>
        </div>

        <?php
        // Dynamically fetch 6 random images from the Gallery folder
        $galleryDir = __DIR__ . '/../static/media/Photos/Gallery/';
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        $images = [];
        if (is_dir($galleryDir)) {
            foreach (scandir($galleryDir) as $file) {
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (in_array($ext, $allowedExtensions)) {
                    $images[] = $file;
                }
            }
        }
        if (count($images) > 6) {
            shuffle($images);
            $images = array_slice($images, 0, 6);
        }
        ?>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <?php foreach ($images as $img): ?>
                <div class="aspect-square bg-cover bg-center rounded-lg hover:scale-105 transition-transform duration-300 cursor-pointer"
                    style="background-image: url('static/media/Photos/Gallery/<?= htmlspecialchars($img) ?>')"></div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-8">
            <a href="index.php?content_file=pages/gallery.php"
                class="inline-block bg-kinpoe-blue hover:bg-kinpoe-dark-blue text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105">
                View Full Gallery
            </a>
        </div>
    </div>
</section>